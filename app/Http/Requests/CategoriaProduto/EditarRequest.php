<?php

namespace App\Http\Requests\CategoriaProduto;

use Illuminate\Foundation\Http\FormRequest;

class EditarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => ['required', 'max:64'],
        ];
    }
}
