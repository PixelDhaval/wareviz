<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeighReceiptRequest extends FormRequest
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
            "weigh_receipt_no" => "sometimes|nullable|string",
            "weigh_receipt_date" => "sometimes|nullable|date",
            "weigh_bridge" => "sometimes|nullable|string"
        ];
    }
}
