<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AnimalFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:50|min:1',
            'idade'=> 'required|max:50|min:1',
            'sexo'=> 'required|max:50|min:1',
            'raca' => 'required|max:50|min:1',
            'descricao'=> 'required|max:50|min:1',
            'vacina'=> 'required|max:50|min:1',
            'castracao' => 'required|max:50|min:1',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            //nome
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O campo nome deve conter, no máximo, 50 caracteres',
            'nome.min' => 'O campo nome deve conter, no mínimo, 1 caracteres',

            //idade
            'idade.required' => 'O campo idade é obrigatório',
            'idade.max' => 'O campo idade deve conter, no máximo, 50 caracteres',
            'idade.min' => 'O campo idade deve conter, no mínimo, 1 caracteres',

            //sexo
            'sexo.required' => 'O campo sexo é obrigatório',
            'sexo.max' => 'O campo sexo deve conter, no máximo, 50 caracteres',
            'sexo.min' => 'O campo sexo deve conter, no mínimo, 1 caracteres',

            //raca
            'raca.required' => 'O campo raca é obrigatório',
            'raca.max' => 'O campo raca deve conter, no máximo, 50 caracteres',
            'raca.min' => 'O campo raca deve conter, no mínimo, 1 caracteres',

            //descricao
            'descricao.required' => 'O campo descricao é obrigatório',
            'descricao.max' => 'O campo descricao deve conter, no máximo, 50 caracteres',
            'descricao.min' => 'O campo descricao deve conter, no mínimo, 1 caracteres',

            //vacina
            'vacina.required' => 'O campo vacina é obrigatório',
            'vacina.max' => 'O campo vacina deve conter, no máximo, 50 caracteres',
            'vacina.min' => 'O campo vacina deve conter, no mínimo, 1 caracteres',

            //castracao
            'castracao.required' => 'O campo castracao é obrigatório',
            'castracao.max' => 'O campo castracao deve conter, no máximo, 50 caracteres',
            'castracao.min' => 'O campo castracao deve conter, no mínimo, 1 caracteres',

        ];
    }
}