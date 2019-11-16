<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class WebsiteBuilderUsersJSONAbstractRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function expectsJson()
    {
        return true;
    }
    
    //All normal laravel request/validation stuff until here
    //We want the JSON...
    //so we overload one critical function with SOMETHING LIKE this
    public function all($keys = null){
        if(array_key_exists('website_builder_users', parent::json()->all())){
            if(empty($keys)){
                return parent::json()->all()['website_builder_users'];
            }
            return collect(parent::json()->all()['website_builder_users']->only($keys)->toArray());
        }
        return [];
    }
    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}

