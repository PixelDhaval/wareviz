<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCargoRequest extends FormRequest
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
            "cargo_name" => "required|string",
            "description" => "sometimes|string",
            "rate" => "sometimes|numeric",
            "hsn" => "sometimes|string",
            "unit" => "sometimes|string",
            "brand_name" => "sometimes|string",
        ];
    }
}
