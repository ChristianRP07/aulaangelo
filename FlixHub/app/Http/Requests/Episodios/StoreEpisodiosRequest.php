<?php

namespace App\Http\Requests\Episodios;

use Illuminate\Foundation\Http\FormRequest;

class StoreEpisodiosRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quant_ep' => 'min:1|integer'
        ];
    }
}
