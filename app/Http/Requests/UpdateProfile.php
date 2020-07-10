<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
             'first_name' => 'required|string|min:3|max:10',
              'last_name'=> 'required|string|min:3|max:10',
               'mobile'=> 'required|regex:/^0[0-9]{10}/m',
               'country'=>'required|string|min:3|max:20',
               'birth_date'=>'required|date|before:today',
               'gender'=>['required',Rule::in(['male', 'female'])],
               'occupation'=> 'required|string|min:3|max:20',
               'painType_id'=>'required|exists:pain_types,id',
               'email' => 'email|required'
        ];
    }
}
