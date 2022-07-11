<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:cars|max:255',
            'brand' => 'required|max:255',
            'driver_id' => 'required',
            'capacity' => 'required',
            'plat_number' => 'required',
            'monday_from' => 'required',
            'tuesday_from' => 'required',
            'wednesday_from' => 'required',
            'thursday_from' => 'required',
            'friday_from' => 'required',
            'monday_to' => 'required',
            'tuseday_to' => 'required',
            'wednesday_to' => 'required',
            'thursday_to' => 'required',
            'friday_to' => 'required',
        ];
    }
}
