<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\portal;
use Session;

class portalController extends Controller
{

    public function login()
    {
    	return view('portal.login');
    }

    public function register()
    {
    	return view('portal.register');
    }

    public function registered(Request $res)
    {
    	$data=new portal;
    	$data->name=$res->name;
    	$data->email=$res->email;
    	$data->mobile=$res->mobile;
        $data->password=$res->password;
        $data->status=1;
    	$data->save();
    	if ($data)
    	{
    	  return redirect('student/login')->with('register','Your registeration in Successfully');
    	}

    }

    public function slogin(Request $res)
    {
    	$data=portal::where('email',$res->email)->where('password',$res->password)->get()->toarray();
        // print_r($data);

        if ($data) 
        {
        	if ($data[0]['status']==1) 
        	{
        	   $res->session()->put('student_session',$data[0]['id']);
        	   return redirect('portal/dashboard')->with('login','Login Successfully');

        	}
        	else
        	{
        		return redirect('student/login')->with('deactive','Your Account is Deactive');
        	}
        }
        else
        {
        	return redirect('student/login')->with('srr','Your registeration is Not Completed');
        }
    }
    

}
