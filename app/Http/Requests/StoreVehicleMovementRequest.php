<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleMovementRequest extends FormRequest
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
            'party_id' => 'required|integer',
            'supplier_id' => 'sometimes|nullable|integer',
            'cargo_id' => 'required|integer',
            'godown_id' => 'sometimes|nullable|integer',
            'type' => 'required|string',
            'movement_type' => 'required|string',
            'movement_at' => 'required|date_format:Y-m-d H:i:s',
            'net_weight' => 'sometimes|nullable|numeric',
            'gross_weight' => 'sometimes|nullable|numeric',
            'tare_weight' => 'sometimes|nullable|numeric',
            'vehicle_no' => 'sometimes|nullable|string',
            'driver_name' => 'sometimes|nullable|string',
            'driver_no' => 'sometimes|nullable|string',
            'driver_lic_no' => 'sometimes|nullable|string',
            'lr_no' => 'sometimes|nullable|string',
            'lr_date' => 'sometimes|nullable|date',
            'rr_number' => 'sometimes|nullable|string',
            'rr_date' => 'sometimes|nullable|date',
            'is_direct' => 'sometimes|nullable|boolean',
            'is_inspection' => 'sometimes|nullable|boolean',
            'receipt_no' => 'sometimes|nullable|string',
            'receipt_date' => 'sometimes|nullable|date'
        ];
    }
}
