<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TagRequest extends FormRequest
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
            'name'=>'required|string|min:1|max:255|unique:tags,name,'.$this->id
        ];
        if(request()->method =='PUT'){
            $rules['id']='exists:tags,id';
        }
        if(request()->method == 'DELETE'){
            return ['id'=>'exists:tags,id'];
        }
        return $rules;
    }
}
