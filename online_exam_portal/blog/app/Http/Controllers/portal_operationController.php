<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\exam_master;

class portal_operationController extends Controller
{
    public function dashboard()
    {
    	
    	//$session_data=Session::get('student_session');
    	if (!Session::get('student_session')) 
    	{
         return redirect(url('student/login'));
    	}

        $data=exam_master::where('status','1')->get();
        // echo "<pre>";
        // print_r($data);
        // exit();
    	return view('portal.dashboard',compact('data'));
    }
    
    public function form()
    {
        return view('portal.form');
    }

}


