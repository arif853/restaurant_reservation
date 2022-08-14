<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catagory;

class CategoryController extends Controller
{
    public function index(){

        $categories = Catagory::all();
        return view('categories.index',compact('categories'));
    }

    public function show(Catagory $category){
        return view('categories.show',compact('category'));
    }
}
