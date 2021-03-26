<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use function PHPUnit\Framework\isEmpty;

class StoreRequest extends Request
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

        if(empty($this->request->get('ArticleCode'))){
            if(empty($this->request->all()[0]['ArticleCode'])){
                return ['date' => 'required'];
            }
            return [
                '*.ArticleCode' => 'required',
                '*.ArticleName' => 'required',
                '*.UnitPrice' => 'required',
                '*.Quantity' => 'required',
            ];
        }else{
            return [
                'ArticleCode' => 'required',
                'ArticleName' => 'required',
                'UnitPrice' => 'required',
                'Quantity' => 'required',
            ];
        }


    }

    public function messages()
    {
        return [
            'ArticleCode.required' => 'The list of products is required.',
            'ArticleName.required' => 'The list of products is required.',
            'UnitPrice.required' => 'The list of products is required.',
            'Quantity.required' => 'The list of products is required.',
            'date.required' => 'Records are not formatted correctly ',
            ];
    }


}
