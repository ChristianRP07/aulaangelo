<?php

namespace App\Http\Requests\Temporadas;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTemporadaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quant_temp' => 'min:1|integer',
            
        ];
    }
}
