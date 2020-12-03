<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\exam_master;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.master');
    }

    public function catagery()
    {
        $data=Category::orderBy('id','desc')->get();
        return view('admin.catagery',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $res)
    {
       // echo "check";
       $data=new Category;
       $data->name=$res->name;
       $data->status=1;
       // print_r($data);
       // die();
       $data->save();

       if ($data) 
       {
          return redirect('admin/catagery')->with('addcat','Category Add Successfully');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $res)
    {
        $data=Category::find($res->id);
        $data->name=$res->name;
        $data->save();

       if ($data) 
       {
          return redirect('admin/catagery')->with('editcat','Category Edit Successfully');
       }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $res)
    {
        $data=Category::find($res->id);
        $data->delete();

        if ($data) 
        {
          return redirect('admin/catagery')->with('deletecat','Category Delete Successfully');
        }

    }

    

    public function manage_exam()
    {
        $catdata=Category::all();
        $data=exam_master::orderBy('id','desc')->get();
return view('admin.manage_exam')->with('catdata', $catdata)->with('data',$data);
    }

    public function examsaving(Request $res)
    {
        // echo "string";
        
        $data=new exam_master;
        $data->title=$res->title;
        $data->cat=$res->cat;
        $data->examdate=$res->examdate;
        $data->status=1;
        // print_r($data);
        $data->save();
        if ($data) 
        {
          return redirect('admin/manage_exam')->with('Added','Exam added Successfully');
        }

 
    }

    public function exam_edit(Request $res)
    {
        // echo "string";
        
        $data=exam_master::find($res->id);
        $data->title=$res->title;
        $data->cat=$res->cat;
        $data->examdate=$res->examdate;
        // print_r($data);
        $data->save();
        if ($data) 
        {
          return redirect('admin/manage_exam')->with('Edit','Exam edited Successfully');
        }

 
    }

    public function exam_delete(Request $res)
    {
        // echo "string";
        
        $data=exam_master::find($res->id);
        $data->save();
        $data->delete();

        if ($data) 
        {
          return redirect('admin/manage_exam')->with('Delete','Exam Deleted Successfully');
        }
 
    }


    public function manage_student()
    {
        // echo "string";
    return view('admin.manage_student');
    }

    public function portal()
    {   
        //echo "string";
    return view('admin.portal');

    }









}
