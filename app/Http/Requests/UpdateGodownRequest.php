<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGodownRequest extends FormRequest
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
            "godown_name" => "sometimes|string",
            "description" => "sometimes|string",
            "godown_no" => "sometimes|string",
            "location" => "sometimes|string",
            "latitude" => "sometimes|string",
            "longitude" => "sometimes|string",
            "capacity" => "sometimes|numeric"
        ];
    }
}
