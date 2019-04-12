<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use UtilHelper;

use App\User;

class LoginController extends Controller
{
    
    private $authorizedRoute = 'blank';
    private $unauthorizedRoute = 'login';
    private $loginView = 'cms.login';

    public function index()
    {
        if (Auth::check()) 
        {
            return $this->authorized();
        }
        return view($this->loginView);
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $user = User::where('username', $username)->first();
        
        if($user === null) 
        {
            UtilHelper::setErrorNotification('incorrect_username');
            return $this->unauthorized();
        }

        if($user->is_active != 1) 
        {
            UtilHelper::setWarningNotification('inactive_user');
            return $this->unauthorized();
        }

        $password = $request->password;
        $hashedPassword = $user->password;
        if (!Hash::check($password, $hashedPassword)) 
        {
            UtilHelper::setErrorNotification('incorrect_password');
            return $this->unauthorized();
        }
        
        Auth::login($user, true);
        UtilHelper::setSuccessNotification('login success', true);
        return $this->authorized();
    }

    public function logout()
    {
        Auth::logout();
        UtilHelper::setSuccessNotification('logout success', true);
        return $this->unauthorized();
    }

    private function unauthorized() 
    {
        return redirect()->route($this->unauthorizedRoute);
    }

    private function authorized() 
    {
        return redirect()->route($this->authorizedRoute);
    }

}
