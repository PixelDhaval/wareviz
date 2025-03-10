<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCargoDetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "vehicle_movement_id" => "sometimes|integer",
            "is_bulk" => "sometimes|nullable|boolean",
            "bags_qty" => "sometimes|nullable|numeric",
            "bags_weight" => "sometimes|nullable|numeric",
            "total_weight" => "sometimes|nullable|numeric",
            "bags_type" => "sometimes|nullable|string",
        ];
    }
}
