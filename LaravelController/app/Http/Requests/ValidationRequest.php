<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zA-Z\s]/',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter name.',
            'name.string'    => 'Name must be a valid string.',
            'email.required' => 'Please enter email.',
            'email.email'    => 'Please enter a valid email address.',
            'phone.required' => 'Please enter phone number.',
            'phone.digits'   => 'Phone number must be exactly 10 digits.',
        ];
    }
}
