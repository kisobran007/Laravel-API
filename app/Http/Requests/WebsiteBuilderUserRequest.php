<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteBuilderUserRequest extends WebsiteBuilderUsersJSONAbstractRequest
{
    public function rules()
    {
        return [
            'username' => 'required|string|max:50|',
            'password' => [
                'required',
                'string',
                'min:6',             // must be at least 6 characters in length
//                'regex:/[a-z]/',      // must contain at least one lowercase letter
//                'regex:/[A-Z]/',      // must contain at least one uppercase letter
//                'regex:/[0-9]/',      // must contain at least one digit
//                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ];
    }
}
