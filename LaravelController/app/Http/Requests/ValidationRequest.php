<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\dateRule;

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
        $id = $this->route('id') ?? $this->id; 
        $role = $this->input('radioBtn');
        $rules = [
            'first_name' => 'required|regex:/^[a-zA-Z\s]/',
            'last_name' => 'required|regex:/^[a-zA-Z\s]/',
            'email' => 'required|email|unique:userdetails,email,'.$id,
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
            'confirm_password' => 'required|same:password',
            'phone' => 'required|numeric|regex:/^[0-9+]{10,13}$/',
            'address' => 'required',
            'dob' => ['date', new dateRule],
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'permissions' => 'required',
            'department' => 'required',
        ];
        if ($role == 'admin') {
        $rules['user_code'] = [
            'required','regex:/^ADM\-\d{3}$/','unique:user_codes,userdetail_id,'. $id, 
        ];
        }elseif ($role == 'user') {
            $rules['user_code'] = [
            'required','regex:/^USR\-\d{3}$/','unique:user_codes,userdetail_id,'. $id,  
        ];
        }elseif ($role == 'manager') {
            $rules['user_code'] = [
            'required','regex:/^MNG\-\d{3}$/','unique:user_codes,userdetail_id,'. $id,  
        ];
        }elseif ($role == 'support') {
            $rules['user_code'] = [
            'required','regex:/^SPT\-\d{3}$/','unique:user_codes,userdetail_id,'. $id,  
        ];
        }
        return $rules;

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
            'dob.date' => 'Please enter valid date',
            'address.required' =>"Please enter address.",
            'permissions.required' =>"Please checked permission.",
            'user_code.regex' => "User code doesn't match with role",
            'department.required' => 'Please select department',
        ];
    }
}
