<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catagory;

class WelcomeController extends Controller
{
    public function index(){

        $specials = catagory::where('name','specials')->first();

        return view('welcome',compact('specials'));
    }
    public function thankyou(){
        return view('thankyou');
    }
}
