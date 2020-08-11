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
    public function store()
    {
        $apply = Apply::create($this->validateRequest());

        Mail::to($apply->UserName)->send(new ApplyMail());

        return redirect('/index');
    }

    private function validateRequest(){
        return request()->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'UserName' => 'required',
            'PhoneNumber' => 'required|numeric',
            'resumefile' => 'required|File',
            'JobOrder_AdditionalInformation' => 'required',
        ]);
    }
}
