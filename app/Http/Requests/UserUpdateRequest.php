<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email'=>'required|email',
            'password' => 'required|min:8',
            'entreprise_name'=>'required',
            'ice'=>'required',
            'telephone'=>'required',
            'pack'=>'',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'L\'adresse e-mail est obligatoire',
            'email.email' => 'L\'adresse e-mail est invalide',
            'password.required'=>"Le mot de passe est requis",
            "password.min"=>'Le mot de passe doit contenir au moins 8 caractaire',
            "entreprise_name.required"=>"Veuillez entrer le nom d'entreprise",
            "ice.required"=>"Veuillez entrer l'ICE (Numéro d'Identifiant Commun Entreprise)",
            "telephone.required"=>"Veuillez entrer un numéro de téléphone",
        ];
    }
}
