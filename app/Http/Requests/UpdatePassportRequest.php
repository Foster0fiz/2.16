<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Или добавьте логику проверки прав
    }

    public function rules(): array
{
    return [
        'passport_number' => 'required|string|regex:/^[A-Z]{2}\d{7}$/|unique:passports,passport_number,' . $this->route('id'),
        'issue_date' => 'required|date',
        'expiry_date' => 'required|date|after:issue_date',
    ];
}



public function messages()
{
    return [
        'passport_number.regex' => 'Passport raqami faqat 2 harf va 7 raqamdan iborat bo\'lishi kerak! (Masalan: AB1234567)',
        'passport_number.unique' => 'Bu passport raqami allaqachon ro\'yxatdan o\'tgan.',
    ];
}

}

