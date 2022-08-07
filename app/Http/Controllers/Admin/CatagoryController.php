<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catagory;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryStoreRequest;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = catagory::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $image = $request->file('image')->store('public/category');

        catagory::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);

        return to_route('admin.categories.index')->with('success', 'Category created successfully.');
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
    public function edit(catagory $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, catagory $category )
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);
        $image = $category->image;
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image= $request->file('image')->store('public/category');
        }

        $category->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$image
        ]);
        return to_route('admin.categories.index')->with('success', 'Category Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(catagory $category )
    {
        Storage::delete($category->image);
        $category->delete();

        return to_route('admin.categories.index');

    }
}
