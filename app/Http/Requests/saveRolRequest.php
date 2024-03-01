<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class saveRolRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //true todos
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'name' => [
            'required',
            'max:100',
             Rule::unique('roles','name')->ignore($this->role),  // tiene que ser el mismo que el definido en update.
          ],
          'slug' => [
              'required',
              'max:100',
               Rule::unique('roles','slug')->ignore($this->role),  // tiene que ser el mismo que el definido en update.
            ],
          'description' => 'required|max:300',
      ];
    }
}
