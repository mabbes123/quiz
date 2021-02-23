<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**

     * @return array
     */
    public function rules()
    {
        return [
            'topic' => 'required|exists:topics,id',
            'question' => 'required',
            'options' => 'required',
            'correct' => 'required',
        ];
    }
}
