<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Tbl_User;
use App\Globals\Authenticator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;
use Crypt;
use Redirect;
use View;
use Input;
use File;
use Image;      
use Validator;

class LoginController extends Controller
{
    function index(Request $req)
    {
       
        return view('login');
    }

    function submit_login(Request $request)
    {
        $rules["username"]                  = array("required");
        $rules["password"]                  = array("required", "min:6");
        $validator                          = Validator::make($request->all(), $rules);

        /* VALIDATE LOGIN */
        if($validator->fails())
        {
            $errors = $validator->errors()->first();

            return redirect('/login')->with("error", $errors)->withInput();
        }
        else
        {
            /* AUTHENTICATE LOGIN */
            $username_email                 = $request->username;
            $check_member                   = Tbl_User::where("email", $username_email)->orWhere("username", $username_email)->first();
           
            if($check_member)
            {
                $member_password = Crypt::decryptString($check_member->password);
                if ($request->password == $member_password)
                { 
                    Authenticator::login($check_member->id, $member_password);
                    return redirect('/dashboard');
                }
                else
                {
                    $errors = "You entered an invalid account.";
                    return redirect('/login')->with("error", $errors)->withInput();
                }
            }
            else
            {
                $errors = "You entered an invalid account.";
                return redirect('/login')->with("error", $errors)->withInput();
            }
        }
    }

    function signout()
    {
        Session()->flush();
        return redirect('/');
    }
}


   

