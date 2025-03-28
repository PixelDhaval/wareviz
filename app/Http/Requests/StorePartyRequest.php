<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartyRequest extends FormRequest
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
            "legal_name" => "required|string",
            "trade_name" => "required|string",
            "gst" => "sometimes|string",
            "pan" => "sometimes|string",
            "address_line_1" => "sometimes|string",
            "address_line_2" => "sometimes|string",
            "city" => "sometimes|string",
            "state_id" => "sometimes|int|exists:states,id",
            "group_id" => "sometimes|int|exists:groups,id",
            "pincode" => "sometimes|string",
            "phone" => "sometimes|string",
            "email" => "sometimes|string",
            "website" => "sometimes|string",
            "tax_type" => "sometimes|string",
            "is_tds_applicable" => "sometimes|boolean", 
            "tds_rate" => "sometimes|numeric",
            "opening_balance" => "sometimes|numeric"
        ];
    }
}
