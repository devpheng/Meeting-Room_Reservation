<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
            'number' => 'required|max:255',
            'model' => 'required|max:255',
            'driver_id' => 'required',
            'capacity' => 'required',
            'plat_number' => 'required',
            'working_time_from' => 'required',
            'working_time_to' => 'required',
            'rest_day' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
}
