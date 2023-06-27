<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Customer;
use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderby('id', 'DESC')->where('status', '1')->get();
        $collection = Collection::orderby('id', 'DESC')->where('status', '1')->get();
        $customers = Customer::where('id', '=', Session::get('loginId'))->first();
        $carts = Cart::orderBy('id', 'ASC')->where('customer_id', '=', Session::get('loginId'))->get();
        $cartCount = count($carts);
        return view('pages.cart')->with(compact('category', 'collection', 'customers', 'carts', 'cartCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
                'name' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'product_id' => 'required',
                'customer_id' => 'required',
                'collection_id' => 'required',
                'category_id' => 'required'
            ],
            // [
            //     'title.unique'=>'Danh mục tồn tại, nhập tên danh mục khác !!!',
            //     'title.required'=>'Danh mục không được để trống',
            //     'description.required'=> 'Mô tả không được để trống',
            //     'image.required' => 'Hình ảnh không được để trống',
            // ]
        );
        $cart = new Cart();
        $cart->name = $data['name'];
        $cart->price = $data['price'];
        $cart->quantity = $data['quantity'];
        $cart->product_id = $data['product_id'];
        $cart->customer_id = $data['customer_id'];
        $cart->collection_id = $data['collection_id'];
        $cart->category_id = $data['category_id'];

        $cart->save();
        $category = Category::orderby('id', 'DESC')->where('status', '1')->get();
        $collection = Collection::orderby('id', 'DESC')->where('status', '1')->get();
        $customers = Customer::where('id', '=', Session::get('loginId'))->first();
        $carts = Cart::orderBy('id', 'ASC')->where('customer_id', '=', Session::get('loginId'))->get();
        
        $cartCount = count($carts);
        if (Session::has('loginId'))
            return view('pages.cart')->with(compact('category', 'collection', 'customers', 'carts', 'cartCount'));
        else
            return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $cart = Cart::find($id);

        $cart_id = $request->input('cart_id');
        $cart = Cart::find($cart_id);
        $cart->delete();
        return redirect()->back();
    }

}
