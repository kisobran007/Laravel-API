<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Website;
use App\ApiUser;
use App\WebsiteBuilderUser;
use App\Http\Requests\WebsiteCreateRequest;
use App\Http\Requests\WebsiteUpdateRequest;
use App\Http\Requests\WebsiteDomainIdRequest;
use App\Http\Requests\WebsiteBuilderUserRequest;

class WebsiteController extends Controller
{
    public $params;
    public $auth = false;

    public function __construct(Request $request)
    {
        $this->params = $request->all();
        if(!empty($this->params['credentials'])){
            $credentials = $this->params['credentials'];
            if(!empty($credentials['username']) && !empty($credentials['password']) && !empty($credentials['token'])){
                $apiUser = new ApiUser();
                $this->auth = $apiUser->authenticate($credentials['username'], $credentials['password'], $credentials['token']);
            }
        }
        
        if(!$this->auth){
            abort(response()->json(['message' => 'Unauthorized action'], 403));
        }
    }
    public function allwebsites()
    {
        if($this->auth){
            return Website::all();
        }
    }

    public function getwebsite($id)
    {
        if($this->auth){
            $website = Website::find($id);
            if($website){
                return $website;
            }
            return response()->json(['errors' => 'Website not found.']);
        }
    }

    public function addwebsite(WebsiteCreateRequest $request)
    {
        if($this->auth){
            if($request->validated()){
                $website = new Website;
                return $website->createWebsite($this->params['website']);
            }

        }
        
    }

    public function updatewebsite(WebsiteUpdateRequest $request, $id)
    {
        if($this->auth){
            if($request->validated()){
                $website = new Website;
                return $website->updateWebsite($this->params['website'], $id);
            }
        }
    }

    public function deletewebsite($id)
    {
        if($this->auth){
            $website = new Website;
            $message = $website->deleteWebsite($id);
            return $message;
        }
    }
    public function getwebsitebydomainid(WebsiteDomainIdRequest $request){
        if($this->auth){
            if($request->validated()){
                $domain_id = $request->all()['domain_id'];
                $website = Website::where('domain_id', '=',$domain_id)->first();
                if($website){
                    return $website;
                }
                return response()->json(['errors' => 'Website not found.']);
            }
        }
    }
    public function getUserByUsernameAndPassword(WebsiteBuilderUserRequest $request){
        if($this->auth){
            if($request->validated()){
                $data = $request->all();
                $user = WebsiteBuilderUser::where('username', '=', $data['username'])
                        ->where('password', '=', $data['password'])->first();
                if(!empty($user)){
                    return $user;
                }
                return response()->json(['errors' => ['credentials' => ['Wrong credentials.']]]);
            }
        }
    }
    public function getWebsiteBuilderUsers(){
        if($this->auth){
            return WebsiteBuilderUser::all();
        }
    }
}
