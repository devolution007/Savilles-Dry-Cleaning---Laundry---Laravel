<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules =  [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:8|max:255'
        ];

        if($this->isMethod('PUT')){
         $rules['email'] = 'required|email|max:255|unique:users,email,'.$this->user->id;
         $rules['password'] = 'nullable|min:8|max:255';
        }
       return $rules;
    }
}
