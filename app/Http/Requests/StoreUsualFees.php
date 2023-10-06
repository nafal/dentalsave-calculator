<?php

namespace DentalCalculator\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsualFees extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'procedure_id' => 'required',
            'course_id' => 'required',
            'network_id' => 'required',
            'pincode_id' => 'required',
            'fees' => 'required|numeric',
          ];
    }
}
