<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteDomainIdRequest extends JSONRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'domain_id' => 'required|string|max:50|',
        ];
    }
    
    public function messages()
    {
        return [
        ];
    }
}
