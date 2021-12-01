<?php

namespace App\Http\Requests\Series;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSerieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'min:5|string',
            'categoria' => 'required|string',
            'streaming' => 'required|string',
            'status' => 'in:assistido,não-assistido'
        ];
    }
}