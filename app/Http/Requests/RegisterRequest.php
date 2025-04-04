<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
{
    return [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ];
}


    public function messages()
    {
        return [
            'password.confirmed' => 'Parollar mos kelmadi. Iltimos, bir xil parol kiriting.',
        ];
    }
}
