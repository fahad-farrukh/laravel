<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date'
            //'published_at' => ['required','date'] // Alternative syntax
        ];
        
        /*
         * Incase there is some difference in the rules for create and update,
         * following mechanism can be used to accommodate that
         * 
         * $rules = [
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date'
            //'published_at' => ['required','date'] // Alternative syntax
        ];
        
        if ($someCondition){
            $rules['something_else'] = 'required';
        }
        
        return $rules;*/
    }
}
