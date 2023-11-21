<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PetCreateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"          => "required|string",
            "birthdate"     => "required",
            "sex"           => "required",
//            "training_level"  => "required",
//            "color"         => "required",
//            "is_sterilized" => "required",
//            "vaccine"       => "required",
            "breed_id"      => "required",
        ];
    }
}
