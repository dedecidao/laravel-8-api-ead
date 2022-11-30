<?php

namespace App\Http\Requests;

use App\Models\Support;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Support $support)
    {
        return [
            'lesson' => ['required', 'exists:lessons,id'], // Input de uma lesson que existe na tabela Lesson é obrigatoria
            //'status' => ['required', Rule::in(['A', 'P', 'C']) ] // Importando a Rule para validada de ENUM pertencente ao IN (params)
            // tbm pode ser pego direto do model
            'status' => [
                'required', 
                Rule::in(array_keys($support->statusOptions))
            ],
            'description' => ['required', 'min:3' , 'max:10000']
        ];
    }
}
