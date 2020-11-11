<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\UploadImage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return  view('admin.dashboard.categories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.dashboard.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'image' => 'required',
            'name' => 'required|unique:categories' ,
        ]);

        $input = $request->except('image');

        if($request->hasFile('image')){
            $image = UploadImage::uploadOne($request->image, 'categories');
            $input['image']=$image;
        }
        $category = Category::create($input);

        return redirect()->route('categories.index')
            ->with('success','Category added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return  view('admin.dashboard.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $targetCategory = Category::find($id);

        return  view('admin.dashboard.categories.edit',compact('targetCategory'));
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
        $this->validate($request, [
            'description' => 'required',
            'name' => 'required|unique:categories,name,'.$id,',id' ,
        ]);
        $input = $request->except('image');
        $category = Category::find($id);
        if($request->hasFile('image')){
            $image = UploadImage::uploadOne($request->image, 'categories');
            $input['image']=$image;
            UploadImage::deleteOne('categories/'.$category->image);
        }


        $category->update($input);
        return redirect()->route('categories.index')
            ->with('success','Category data modified successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        UploadImage::deleteOne('categories/'.$category->image);
        Category::destroy($id);
        return redirect()->route('categories.index')
            ->with('success','Category deleted successfully!');
    }
}
