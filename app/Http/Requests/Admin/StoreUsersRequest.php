<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'emp_id' => 'required|unique:users,emp_id,'.$this->route('user'),
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required',
            'rfid_no' => 'min:10|max:10|required|unique:users,rfid_no,'.$this->route('user'),
            'role_id' => 'required',
            'contact_no' => 'min:11|max:11',
            'guardian_contact_no' => 'min:11|max:11',
        ];
    }
}
