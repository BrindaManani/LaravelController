<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailSettingsRequest extends FormRequest
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
            'smtp_host' => 'nullable',
            'smtp_port' => 'nullable',
            'encryption' => 'nullable',
            'sender_name' => 'nullable|regex:/^[a-zA-Z\s]/',
            'sender_email' => 'nullable|email',
            'username' => 'nullable|email',
            'password' => 'nullable|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
        ];
    }
}
