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
            'first_name' => 'required|regex:/^[a-zA-Z\s]/',
            'last_name' => 'required|regex:/^[a-zA-Z\s]/',
            'email' => 'required|email',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
            'confirm_password' => 'required|same:password',
            'phone' => 'required|numeric|regex:/^[0-9+]/',
            'profile.dob' => 'required|date',
            'profile.avatar' => 'image|mimes:jpg,jpeg,png,webp',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter name.',
            'name.regex'    => 'Name must be a valid string.',
            'email.required' => 'Please enter email.',
            'email.email'    => 'Please enter a valid email address.',
            'phone.required' => 'Please enter phone number.',
            'phone.digits'   => 'Phone number must be exactly 10 digits.',
            'profile.dob.required' => 'date required',
            'profile.dob.date' => 'Please enter valid date',
            'address.pincode.required' =>"valid pin."
        ];
    }
}
