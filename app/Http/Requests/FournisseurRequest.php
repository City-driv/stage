<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FournisseurRequest extends FormRequest
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
            'code_fournisseur'=>'required',
            'type_fournisseur'=>'required',
            'nom_entreprise'=>'required',
            // 'adresse'=>'required',
            // 'email'=>'required',
            // 'telephone'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'code_fournisseur.required' => 'Le code de fournisseur est obligatoire',
            'type_fournisseur.required' => 'Le type de fournisseur est obligatoire',
            "nom_entreprise.required"=>"Veuillez entrer le nom d'entreprise",
            // "adresse.required"=>"Veuillez entrer l'adresse ",
            // "email.required"=>"Veuillez entrer un email",
            // "telephone.required"=>"Veuillez entrer un numéro de téléphone",
        ];
    }
}
