<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\UploadImage;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
        return  view('admin.dashboard.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.dashboard.brands.create');
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
            $image = UploadImage::uploadOne($request->image, 'brands');
            $input['image']=$image;
        }
        $brands = Brand::create($input);

        return redirect()->route('brands.index')
            ->with('success','Category added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brands = Brand::find($id);
        return  view('admin.dashboard.brands.show',compact('brands'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
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
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required',
            'name' => 'required|unique:categories,name,'.$id,',id' ,
        ]);
        $input = $request->except('image');
        $brand = Brand::find($id);
        if($request->hasFile('image')){
            $image = UploadImage::uploadOne($request->image, 'brands');
            $input['image']=$image;
            UploadImage::deleteOne('brands/'.$brand->image);
        }


        $category->update($input);
        return redirect()->route('brands.index')
            ->with('success','Brand data modified successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        UploadImage::deleteOne('brands/'.$brand->image);
        Category::destroy($id);
        return redirect()->route('brands.index')
            ->with('success','Brand deleted successfully!');
    }
}
