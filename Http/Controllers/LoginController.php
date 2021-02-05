<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{
    // To obtain an instance of the current HTTP request from a post
    public function index(Request $request)
    {
        // Create a userModel w/ username and password
        $credentials = new UserModel(request()->get('user_name'), request()->get('password'));
        
        // Instantiate the Business Logic Layer
        $serviceLogin = new SecurityService();
        // Pass the credentials to the Business Layer
        $isValid = $serviceLogin->login($credentials);
        
        // Determine which view to display
        if ($isValid)
        {
            return view('loginPassed');
        }
        else 
        {
            return view('loginFailed');
        }
        
        
        // Put all the form values in an array called 'formValues'
        //$formValues = $request->all();
        
        // Get just the username from the form
        //$userName = request()->get('user_name');
        
        // The get can be replaced by the input
        // $userName = request()->input('user_name');
        //return $request->all();
    }
}
