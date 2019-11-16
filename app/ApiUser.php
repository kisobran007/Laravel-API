<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class ApiUser extends Model
{
    protected $fillable = [];
    protected $hidden = [
        'username', 'password', 'token',
    ];
    public function authenticate($username, $password, $token){
        $user = ApiUser::where('username', '=', 'zschiller')->first();
        if($user->username == $username && $user->password == $password && $user->token == $token){
            return true;
        }
        return false;
    }
}
