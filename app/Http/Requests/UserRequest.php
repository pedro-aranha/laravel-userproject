<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
        $userId = $this->route('user');
        return [
            'name' => 'required',
            'email' =>'required|email|unique:users,email,' . ($userId ? $userId->id : null),
            'password' => 'required|min:6'    
        ];
    }

    public function messages(): array{

        return [
            'name.required' =>"Name Field required",
            'email.required' =>"Email Field required",
            'email.email' =>"Email is not following the correct structure (ex: john@doe.com)",
            'email.unique' =>"Email is not unique",
            'password.required' => "Password Field required",
            'password.min' => "Password lenght must be equal or greater than :min"
        
        ];
    }

    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status' => false,
            'error' => $validator->errors(),
        ],422));
    }
}
