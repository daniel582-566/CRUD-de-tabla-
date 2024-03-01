<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class saveUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //true - todos
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'name' => 'required|max:100',     //no null
      //  'email' => 'required|email|unique:users,email,'.$this->users.'|max:100',
        //  'email' => 'required|email|unique:users,email,'.$this->route('id'),
      'email' => [
          'required',
          'email',
          'max:100',
           Rule::unique('users','email')->ignore($this->user),  // tiene que ser el mismo que el definido en update.
        ],

        'edad' => 'required|numeric|max:120',

      ];
    }

    public function messages()  //mensajes especificos
    {
        return [
          'name.required' => 'Introduzca el Nombre',
        ];
    }
}
