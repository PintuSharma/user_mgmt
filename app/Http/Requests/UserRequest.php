<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');
        $userId = $this->route('user') ? $this->route('user')->id : null;


        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                $isUpdate ? 'unique:users,email,' . $userId : 'unique:users,email',
            ],
            'password' => $isUpdate ? 'nullable|string|min:8' : 'required|string|min:8',
        ];
    }
}
