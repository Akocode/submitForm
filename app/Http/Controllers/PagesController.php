<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apply;
use App\Mail\ApplyMail;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('/apply');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {

        var_dump($request->all());
       $data = [
           'file'=>$request->file('resumefile'),
           'firstname'=>$request->get('FirstName'),
           'lastname'=>$request->get('LastName'),
           'email'=>$request->get('UserName'),
           'number'=>$request->get('PhoneNumber'),
           'addition'=>$request->get('JobOrder_AdditionalInformation'),
       ];
       $to_email ='adenitiree@gmail.com';
        Mail::to($to_email)->send(new ApplyMail($data));

        return redirect('/index');
    }

    // private function validateRequest(){
    //     return request()->validate([
    //         'FirstName' => 'required',
    //         'LastName' => 'required',
    //         'UserName' => 'required',
    //         'PhoneNumber' => 'required|numeric',
    //         'resumefile' => 'required|File',
    //         'JobOrder_AdditionalInformation' => 'required',
    //     ]);
    // }
}
