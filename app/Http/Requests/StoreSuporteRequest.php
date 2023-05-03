<?php

namespace App\Http\Requests;

use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSuporteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //aguadando validação ACL
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'assunto' => [
                'required',
                'min:4', 
                'max:100', 
                'unique:suportes'              

            ],

            'conteudo' => [
                'required',
                'min:10',
                'max:1000'
            ],
        ];

        if($this->method() === 'PUT'){
            $rules['assunto'] = [
                'required',
                'min:4',
                'max:100',
              //  "unique:suportes,assunto,{$this->id},id"
              Rule::unique('suportes')->ignore($this->id),
            ];
        }


        return $rules;
    }
}
