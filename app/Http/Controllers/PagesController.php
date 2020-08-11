<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apply;

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
        $apply = Apply::create($this->validateRequest());

        return back();
    }

    private function validateRequest(){
        return request()->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'UserName' => 'required',
            'PhoneNumber' => 'required|numeric',
            'resumefile' => 'required|File',
            'JobOrder.AdditionalInformation' => 'required',
        ]);
    }
}
