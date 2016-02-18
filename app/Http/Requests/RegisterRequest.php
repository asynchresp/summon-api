<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Http\JsonResponse;

class RegisterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5',
            'name' => 'required|min:3',
        ];

        return $rules;
    }

    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
