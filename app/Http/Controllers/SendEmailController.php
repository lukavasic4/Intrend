<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Validation\ValidationException;
use \Illuminate\Support\Facades\Mail;
use App\Mail\SendMail as Email;

class SendEmailController extends FrontController
{
    public function index(){
        return view('pages.contact',$this->data);
    }
    public function send(Request $request){
    $this->validate($request,[
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    ]);
    $podaci = array([
        'name' => $request->get('name'),
        'message' => $request->get('message')
    ]);
    Email::buildViewDataUsing($podaci);
}

}
