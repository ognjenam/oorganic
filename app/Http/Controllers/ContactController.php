<?php

namespace App\Http\Controllers;

require_once app_path('Models\phpmailer\contactMailer.php');
use Illuminate\Http\Request;

use Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/main/contact');
    }
    public function contactForm(Request $request)
    {
      $validator = Validator::make($request -> all(), [
        'name' => 'required|regex:/^[A-z]{3,10}(\s[A-z]{3,10})*$/',
        'message' => 'required|regex:/([A-z]\d*\W*){5,200}/',
        'email' => 'required|email|min:10|max:30'


      ]);

      if($validator -> fails())
      {
        $name_error = '';
        $message_error = '';
        $email_error = '';

        if($validator -> errors() -> any('name'))
        {
          $name_error = $validator -> errors() -> first('name');
        }
        if($validator -> errors() -> any('message'))
        {
          $message_error = $validator -> errors() -> first('message');
        }
        if($validator -> errors() -> any('email'))
        {
          $email_error = $validator -> errors() -> first('email');
        }

        return response([
          'name_error' => $name_error,
          'message_error' => $message_error,
          'email_error' => $email_error
        ]);
      }

      else {
        $sent = sendContactMail($request -> email, $request -> message, $request -> name);
        $result = '';

        $result = $sent ? 'Message has been sent!' : 'Sorry, message has not been sent!';
        return response(['mailer' => $result]);

      }
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
