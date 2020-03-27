<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

use App\Helpers\LogActivity;

class PageController extends FrontController
{
    public function myTestAddToLog()
    {
        LogActivity::addToLog('My Testing Add To Log.');

    }
    public function home(){
        return view('pages.home',$this->data);
    }
    public function single(){
        return view('pages.single',$this->data);
    }
    public function about(){
        return view('pages.about',$this->data);
    }
    public function contact(){
        return view('pages.contact',$this->data);
    }
    public function login(){
        return view('pages.login',$this->data);
    }
    public function register(){
        return view('pages.register',$this->data);
    }
    public function gallery(){
        return view('pages.gallery',$this->data);
    }
    public function page404(){
        return view('pages.404',$this->data);
    }
}
