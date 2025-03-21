<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}
class TestController extends Controller{
    public function testAction(){
        return "Funguje to?";
    }
    public function viewForm(){
        return view('form');
    }
}
