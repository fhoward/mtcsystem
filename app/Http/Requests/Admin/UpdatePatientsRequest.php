<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientsRequest extends FormRequest
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
            
            'assigned_therapist' => 'required',
            'assigned_therapist.*' => 'exists:users,id',
            'name' => 'required',
            'birthday' => 'nullable|date_format:'.config('app.date_format'),
            'guardians_name' => 'required',
            'contact_number' => 'min:11|max:11',
            'address' => 'required',
        ];
    }
}
