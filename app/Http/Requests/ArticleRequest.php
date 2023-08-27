<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'description'=>'required',
            'price'=>'required',
            'tva'=>'required',
            'quantite'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'description.required' => 'La description est obligatoire',
            'price.required' => 'Le prix d\'article est obligatoire',
            "tva.required"=>"Veuillez entrer le tva",
            "quantite.required"=>"Veuillez entrer la quantite ",
        ];
    }
    
}
