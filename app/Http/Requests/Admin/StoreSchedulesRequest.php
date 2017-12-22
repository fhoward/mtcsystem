<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchedulesRequest extends FormRequest
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
            'staff_id' => 'required',
            'patient_id' => 'required',
            'date' => 'required|date_format:'.config('app.date_format'),
            'start' => 'required|date_format:H:i:s',
            'end' => 'nullable|date_format:H:i:s',
        ];
    }
}
