<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdvertiseRequest extends FormRequest
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
            'title'=>'required|string|min:2|max:255|unique:advertises,title,'.$this->id,
            'description'=>'required|string|min:5',
            'type'=>'required|in:free,paid',
            'category_id'=>'required|exists:advertises,id',
            'advertiser_id'=>'required|exists:advertises,id',
            'tags.*'=>'exists:tags,id'
        ];
        if(request()->method =='PUT'){
            $rules['id']='exists:advertises,id';
        }
        if(request()->method == 'DELETE'){
            return ['id'=>'exists:advertises,id'];
        }
        return $rules;
    }
}
