<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatusSerieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => 'in:assistido,não-assistido'
        ];
    }
}