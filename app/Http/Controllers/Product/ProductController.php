<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSizeStock;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at')->get();
        return view('layouts.admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->image;
        $validate = Validator::make($request->all(),[
            'category_id' => 'required|numeric',
            'brand_id'    => 'required|numeric',
            'sku'         => 'required|string|max:100|unique:products',
            'name'        => 'required|string|min:2|max:200',
            'image'        => 'required|image|mimes:jpeg,jpg,png',
            'cost_price'   => 'required|numeric',
            'retail_price' => 'required|numeric',
            'year'         => 'required|numeric',
            'description'  => 'required|max:200',
            'status'       => 'required|numeric',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validate->errors()
            ],\Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        //store product

        $product = new Product();
        $product->user_id      = Auth::user()->id;
        $product->cat_id       = $request->category_id;
        $product->brand_id     = $request->brand_id;
        $product->sku          = $request->sku;
        $product->name         = $request->name;
        $product->cost_price   = $request->cost_price;
        $product->retail_price = $request->retail_price;
        $product->year         = $request->year;
        $product->description  = $request->description;
        $product->status       = $request->status;

        //image
        if($request->hasFile('image')){
            $image = $request->image;
            $name  = Str::random(60) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/product_image',$name);
            $product->image = $name;
        }

        $product->save();

        //store items
        if($request->items){
            foreach(json_decode($request->items) as $item){
                $size_stock = new ProductSizeStock();
                $size_stock->product_id = $product->id;
                $size_stock->size_id = $item->size_id;
                $size_stock->location = $item->location;
                $size_stock->quantity = $item->quantity;
                $size_stock->save();
            }
        }
        if ($validate->fails()) {
            return response()->json([
                'success' => true,
            ],\Illuminate\Http\Response::HTTP_OK);
        }


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
    public function edit($id)
    {
        $products = Product::find($id);
        return view('layouts.admin.category.edit',compact('category'));

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

        $request->validate([
            'name' => 'required|unique:categories,name, ' .$id,
        ]);

        $category       = Product::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index')->with('success','Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category       = Product::find($id);
        $category->delete();
        return back()->with('success','Category deleted successfully!');
    }
}
