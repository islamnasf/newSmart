<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentEditRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'phone' => ['required',' integer', 'digits:8'],
            'password' => ['required'],
        ];
    }
    public function messages(): array
    {
        return [
            'phone.integer' => 'الرقم يجب ان لا يحتوي علي احرف',
            'phone.digits' => 'رقم الهاتف  يجب ان يكون 8 ارقام فقط   ',      
            'phone.required' => 'يجب ادخال الرقم ',
            'name.required' => 'يجب ادخال الاسم ',
            'password.required' => 'يجب ادخال الرقم السري ',
        ];
    }
}
