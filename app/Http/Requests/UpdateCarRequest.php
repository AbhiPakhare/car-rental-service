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
     * @return array
     */
    public function rules()
    {
        return [
            'vehicle_model' => ['required', 'string', 'max:100'],
            'vehicle_number' => ['required', 'string', 'max:15'],
            'seating_capacity' => ['required', 'integer', 'max:80'],
            'rent_per_day' => ['required', 'integer'],
        ];
    }
}
