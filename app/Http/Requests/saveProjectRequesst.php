<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveProjectRequesst extends FormRequest
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
          'title' => 'required|max:100',     //no null
          'url' => 'required|url|max:300',
          'description' => 'required|max:300',
        ];
    }

    public function messages()
    {
        return [
          'title.required' => 'No titulo, mensaje modificado',
        ];
    }
}
