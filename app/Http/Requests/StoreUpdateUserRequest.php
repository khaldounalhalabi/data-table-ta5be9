<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'string|min:3|max:255',
            'last_name' => 'string|min:3|max:255',
            'password' => 'string',
            'email' => 'string|email|min:3',
            'house_id' => 'exists:houses,id',
            'friends' => 'array',
            'friends.*' => 'numeric',
            'image' => 'nullable',
            'age' => 'numeric',
            'date_time' => 'date',
            'date' => 'date_format:Y-m-d',
            'time' => 'date_format:H:i',
            'status' => 'required',
            'gender' => 'required',
            'text' => 'required',
        ];
    }
}
