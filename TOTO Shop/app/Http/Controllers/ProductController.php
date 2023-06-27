<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
   
        $product = Product::with('category_product')->orderBy('id', 'DESC')->get();
        $collection = Collection::with('product_collection')->orderBy('id', 'DESC')->get();
        // $product_collection = Collection::with('product_collection')->orderBy('id', 'DESC')->get();
        // dd($collection);
        return view('admincp.product.index', compact('product', 'collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection = Collection::orderby('id', 'DESC')->where('status', '1')->get();
        $category = Category::orderby('id', 'DESC')->get();
        return view('admincp.product.create', compact('category', 'collection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data = $request->validate(
            [
                'title' => 'required|unique:product|max:255',
                'categoryname'=> 'required',
                'collectionname'=> 'required',
                'slug' => 'required|unique:product|max:255',
                'description' => 'required',
                'quantity' => 'required|min:0',
                'price'=> 'required',
                'saleoff'=> 'required',
                // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096|dimensions:min_width=100, min_height=100, max_width=2000, max_height=20000',
                'image' => 'required|image',
                'status' => 'required',
                
            ],
            // [
            //     'title.unique'=>'Danh mục tồn tại, nhập tên danh mục khác !!!',
            //     'title.required'=>'Danh mục không được để trống',
            //     'description.required'=> 'Mô tả không được để trống',
            //     'image.required' => 'Hình ảnh không được để trống',
            // ]
        );
        $product = new product();
        $product->title = $data['title'];
        $product->slug = $data['slug'];
        $product->description = $data['description'];
        $product->quantity = $data['quantity'];
        $product->price = $data['price'];
        $product->saleoff = $data['saleoff'];
        $product->category_id =  $data['categoryname'];
        $product->collection_id =  $data['collectionname'];
        $product->status = $data['status'];

        $get_image = $request->image;
        $path = "public/uploads/product/";
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99999) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $product->image = $new_image;

        $product->save();
        return redirect()->back()->with('status', 'Success');
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
        $product = Product::find($id);
        $category = Category::orderby('id', 'DESC')->get();
        $collection = Collection::orderby('id', 'DESC')->where('status', '1')->get();
        return view('admincp.product.edit', compact('product','category', 'collection'));
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
        $data = $request->all();
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'slug' => 'required|max:255',
                'categoryname'=>'',
                'collectionname'=>'required',
                'description' => 'required',
                'status' => 'required',
                'quantity' =>'required|min:0',
                'price'=> 'required',
                'saleoff'=> 'required',
            ],
            // [
            //     'title.unique'=>'Danh mục tồn tại, nhập tên danh mục khác !!!',
            //     'title.required'=>'Danh mục không được để trống',
            //     'description.required'=> 'Mô tả không được để trống',
            //     'image.required' => 'Hình ảnh không được để trống',
            // ]
        );
        $product = Product::find($id);
        $product->title = $data['title'];
        $product->slug = $data['slug'];
        $product->description = $data['description'];
        $product->quantity = $data['quantity'];
        $product->price = $data['price'];
        $product->saleoff = $data['saleoff'];
        $product->category_id = $data['categoryname'];
        $product->collection_id =  $data['collectionname'];
        $product->status = $data['status'];

        $get_image = $request->image;
        if ($get_image) {
            $path_unlink = 'public/uploads/product/' . $product->image;
            if (file_exists($path_unlink)) {
                unlink($path_unlink);
            }
            $path = "public/uploads/product/";
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product->image = $new_image;
        }
        $product->save();
        return redirect()->back()->with('status', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $path_unlink = 'public/uploads/product/' . $product->image;
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $product->delete();
        return redirect()->back();
    }
    

}
