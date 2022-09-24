<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest
{
    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(message(false, $validator->errors(), '', 422));
    }

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
        $rules =[
            'name'=>'required|string|min:2|max:255|unique:categories,name,'.$this->id,
            'description'=>'required|string|min:5'
        ];
        if(request()->method =='PUT'){
            $rules['id']='exists:categories,id';
        }
        if(request()->method == 'DELETE'){
            return ['id'=>'exists:categories,id'];
        }
        return $rules;
    }
}
