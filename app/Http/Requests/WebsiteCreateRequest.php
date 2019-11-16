<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteCreateRequest extends JSONRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50|',
            'URL' => 'required|regex:/^http:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$/',
            'domain_id' => 'required|string'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Website name is required!',
            'URL.regex' => 'URL is not valid.',
            'URL.required' => 'Website URL is required.',
        ];
    }
}
