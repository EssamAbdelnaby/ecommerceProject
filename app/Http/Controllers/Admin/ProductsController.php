<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\UploadImage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return  view('admin.dashboard.products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $brands=Brand::all();

        return  view('admin.dashboard.products.create',compact('categories','brands'));

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
            'name' => 'required|unique:products',
            'price' => 'required',
        ]);

        $input = $request->except('image');

        if($request->hasFile('image')){
            $image = UploadImage::uploadOne($request->image, 'products');
            $input['image']=$image;
        }


        $product = Product::create($input);

        $category= Category::find($request->category_id);
        $brand= Brand::find($request->brand_id);
        $category->brands()->attach($brand->id);

        return redirect()->route('products.index')
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
        $product = Product::find($id);
        return  view('admin.dashboard.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $targetProduct = Product::find($id);
        $categories=Category::all();
        $brands=Brand::all();

        return  view('admin.dashboard.products.edit',compact(['targetProduct','categories','brands']));
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
            'name' => 'required|unique:products,name,'.$id,',id' ,
            'price' => 'required',
        ]);
        $input = $request->except('image');
        $product = Product::find($id);
        if($request->hasFile('image')){
            $image = UploadImage::uploadOne($request->image, 'products');
            $input['image']=$image;
            UploadImage::deleteOne('products/'.$product->image);
        }


        $product->update($input);
        $brand= Brand::find($request->brand_id);
        $brand->categories()->attach($category->id);


        return redirect()->route('products.index')
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
        $products = Product::find($id);
        UploadImage::deleteOne('products/'.$products->image);
        Category::destroy($id);
        return redirect()->route('products.index')
            ->with('success','Category deleted successfully!');
    }
}
