<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Tbl_User;
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

class RegisterController extends Controller
{
	public function index()
    {
        return view("register");
    }
    public function submit_register(Request $request)
    {
    	/* INITIALIZE RULES */
        $rules["first_name"]   = array("required", "string");
        $rules["email"]    = array("required", "email", "unique:users,email");
        $rules["password"]     = array("required", "confirmed", "min:6");
        $rules["last_name"]    = array("required", "string");
        $rules["phone_number"] = array("required", "string");
        $rules["username"]     = array("required", "string", "unique:users,username", "min:6");
    
        $validator = Validator::make($request->all(), $rules);
        
        /* VALIDATE REGISTRATION */
        if($validator->fails())
        {
        	$errors = $validator->errors()->all();
            return Redirect::back()->with("errors", $errors)->withInput();
        }
        else
        {
            /* INSERT ACCOUNT TO DATABASE */
        	$insert["first_name"]	        = $request->first_name;
        	$insert["last_name"]	        = $request->last_name;
            $insert["username"]             = $request->username;
        	$insert["email"] 				= $request->email;
            $insert["phone_number"]         = $request->phone_number;
        	$insert["password"] 			= Crypt::encryptString($request->password);
        	$insert["created_at"] 	        = Carbon::now();
        	$insert["create_ip_address"] 	= $_SERVER['REMOTE_ADDR'];
            $insert["email_token"]          = base64_encode($request->email_address);
            $insert["is_admin"]             = 0;
        	$member_id                      = Tbl_User::insertGetId($insert);

        	// return redirect("/signin")->with("error", "You have successfully registered to ALL BY ALL.");
            session("successful", "You have successfully registered to ALL BY ALL.");
        	return redirect("/login")->with("successful", "You have successfully registered to ALL BY ALL.");
        }
    }
    public function success()
    {
        $data["page"]   = "Registration Success";
        $id      = session()->get("id");

        if($id)
        {
            $member_info        = Tbl_User::where("id", $id)->first();
            $data["email"]      = $member_info->email;
            return view("front.success", $data);
        }
        else
        {
            return redirect("/login");
        }
    }
}

