<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome_produto' => 'required|max:255|unique:produtos,nome,NULL,id,user_id,'.$this->user()->id,
            'valor' => 'required|numeric',
            'categoria' => 'required|exists:categoria_produto,id',
        ];
    }

    public function messages()
    {
        return [
            'nome_produto.required' => 'O campo nome é obrigatório.',
            'nome_produto.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'nome_produto.unique' => 'Este nome já está sendo usado em outro produto.',
            'valor.required' => 'O campo valor é obrigatório.',
            'valor.numeric' => 'O campo valor deve ser numérico.',
            'categoria.required' => 'O campo categoria é obrigatório.',
            'categoria.exists' => 'A categoria selecionada não existe.',
        ];
    }
}
