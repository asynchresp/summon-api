<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Http\JsonResponse;

class EditSummonRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'amount' => 'required',
            'location' => 'required',
            'due_date' => 'required',
        ];

        return $rules;
    }

    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
