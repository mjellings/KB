<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticle extends FormRequest
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
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required'
        ];
    }

         /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Article title is required!',
            'body.required' => 'Articles must have content.',
            'category.required' => 'Please select a category.',
            'tags.required' => 'Please select one of more tags.'
        ];
    }
}
