<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProduto;
use App\Models\Produtos;
use App\Http\Requests\CategoriaProduto\CadastroRequest;
use App\Http\Requests\CategoriaProduto\EditarRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CategoriaProdutoController extends Controller
{

    public function index()
    {
        $user = $this->getUser();
        
        $categorias = CategoriaProduto::all();

        return view('categoriaProdutos.index', [
            'admin' => $user->admin,
            'categorias' => $categorias
        ]);
    }

    public function create()
    {

        if(!$this->getUser()->admin){
            return redirect()->route('categoriaProdutos.index')->with('error', 'Acesso negado! Somente usuário admin pode realizar esta operação.');
        }
        return view('categoriaProdutos.cadastro');
    }

    public function store(CadastroRequest $request)
    {
        if(!$this->getUser()->admin){
            return redirect()->route('categoriaProdutos.index')->with('error', 'Acesso negado! Somente usuário admin pode realizar esta operação.');
        }

        $request->validate([
            'nome' => 'required|max:64',
        ]);

        $categoria = new CategoriaProduto();
        $categoria->nome = $request->input('nome');
        $categoria->save();

        return redirect()->route('categoriaProdutos.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        if(!$this->getUser()->admin){
            return redirect()->route('categoriaProdutos.index')->with('error', 'Acesso negado! Somente usuário admin pode realizar esta operação.');
        }

        $categoria = CategoriaProduto::findOrFail($id);
        return view('categoriaProdutos.editar', compact('categoria'));
    }

    public function update(EditarRequest $request, $id)
    {
        if(!$this->getUser()->admin){
            return redirect()->route('categoriaProdutos.index')->with('error', 'Acesso negado! Somente usuário admin pode realizar esta operação.');
        }

        $request->validate([
            'nome' => 'required|max:64',
        ]);

        $categoria = CategoriaProduto::findOrFail($id);
        $categoria->nome = $request->input('nome');
        $categoria->save();

        return redirect()->route('categoriaProdutos.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        if(!$this->getUser()->admin){
            return redirect()->route('categoriaProdutos.index')->with('error', 'Acesso negado! Somente usuário admin pode realizar esta operação.');
        }

        $categoria = CategoriaProduto::findOrFail($id);

        $confirmacao = request()->input('confirmacao', false);

        if(!$confirmacao){
            return view('categoriaProdutos.delete', compact('categoria'));
        }

        $senha = request()->input('senha');

        if(!Hash::check($senha, auth()->user()->password)){
            return back()->with('error', 'Senha incorreta!');
        }

        $categoria->delete();

        return redirect()->route('categoriaProdutos.index')->with('success', 'Categoria deletada com sucesso!');
    }

}
