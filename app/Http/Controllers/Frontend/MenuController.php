<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\catagory;

class MenuController extends Controller
{
    public function index(){

        $menus = Menu::all();
        $category = Catagory::all();

        return view('menus.index',compact('menus','category'));
    }
}
