<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactPropertyFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "firstname" => ["required", "string", "min:2"],
            "lastname" => ["required", "string", "min:2"],
            "message" => ["required", "string", "min:5"],
            "phone" => ["required", "integer", "min:9"],
            "email" => ["required", "string", "min:4"],
        ];
    }
}
