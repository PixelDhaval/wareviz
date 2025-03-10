<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleInspectionRequest extends FormRequest
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
            "vehicle_movement_id" => "required|integer",
            "inspection_no" => "sometimes|nullable|string",
            "inspection_date" => "sometimes|nullable|date",
            "inspection_result" => "sometimes|nullable|string",
            "remarks" => "sometimes|nullable|string",
            "inspection_type" => "sometimes|nullable|in:SGS,3rd Party,Agency,Shipper,Consignee,Self",
            "inspection_by" => "sometimes|nullable|string"
        ];
    }
}
