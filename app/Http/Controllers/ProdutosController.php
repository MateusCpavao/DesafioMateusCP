<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\CategoriaProduto;
use App\Http\Requests\{CadastroProdutoRequest, EditarProdutoRequest};

class ProdutosController extends Controller
{

    public function __construct(
        private Produtos $produtos
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = $this->getUser();
        
        $produtos = $this->produtos->listaProdutosUser($user->id);

        return view('produtos.index', [
            'produtos' => $produtos
        ]);
    }

    public function all()
    {
        $produtos = $this->produtos->listaTodosProdutos();

        return response()->json($produtos);
    }

    /**
     * Carrega tela de cadastro de produtos - Todos usuarios tem acesso.
     */
    public function create()
    {
        $categorias = CategoriaProduto::all();
        return view('produtos.cadastroProduto', compact('categorias'));
    }

    /**
     * Realiza ação de salvar produto.
     */
    public function store(CadastroProdutoRequest $request)
    {
        $user = $this->getUser();

        $produto = new Produtos();
        $produto->nome = $request->input('nome_produto');
        $produto->valor = $request->input('valor');
        $produto->categoria_id = $request->input('categoria');
        $produto->user_id = $user->id;
        $produto->save();

        return redirect()->route('produtos.index')->with('success', 'Produto "'. $request->input('nome') . '" cadastrado com sucesso.');
    }

    public function show($id)
    {
        $produtos = $this->produtos->listaProdutosUser($id);
        return response()->json([
            'usuario' => $produtos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produtos $produtos,$id)
    {
        $user = $this->getUser();

        $produto = Produtos::findOrFail($id);

        if($produto->user_id != $user->id){
            session()->flash('error', 'Você só pode editar produtos que você cadastrou.');
            return redirect()->route('produtos.index');
        }

        $categorias = CategoriaProduto::pluck('nome', 'id');
        return view('produtos.editar', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditarProdutoRequest $request, $id)
    {
        // Verifica se o usuário tem permissão para editar o produto
        $user = $this->getUser();
        $produto = Produtos::findOrFail($id);
        if ($produto->user_id != $user->id) {
            return redirect()->route('produtos.index')->with('error', 'Você só pode editar produtos que você cadastrou.');
        }
            
        // Atualiza os dados do produto
        $produto->nome = $request->input('nome');
        $produto->valor = $request->input('valor');
        $produto->categoria_id = $request->input('categoria_id');
        $produto->save();
        
        return redirect()->route('produtos.index')->with('success', 'Produto "'. $request->input('nome') . '" atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Verifica se o usuário tem permissão para excluir o produto
        $user = $this->getUser();

        $produto = Produtos::findOrFail($id);
        if ($produto->user_id != $user->id && !$user->admin) {
           return redirect()->route('produtos.index')->with('error', 'Você só pode excluir produtos que você cadastrou ou se for um administrador.');
        }
    
        // Remove o produto do banco de dados
        $produto->delete();
    
        return redirect()->route('produtos.index')->with('success', 'Produto ' . $produto->nome . ' excluído com sucesso.');
    }
}
