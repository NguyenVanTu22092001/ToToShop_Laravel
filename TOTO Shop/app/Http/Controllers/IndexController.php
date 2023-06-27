<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Collection;
use App\Models\Customer;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function home(){
        $category= Category::orderby('id', 'DESC')->where('status', '1')->get();
        $collection= Collection::orderby('id', 'DESC')->where('status', '1')->get();
        $new_product=Product::orderby('id', 'DESC')->where('status', 1)->paginate(4);
        $slide= Slide::orderby('id', 'DESC')->where('status', '1')->get();
        $customers=Customer::where('id', '=', Session::get('loginId'))->first();
        return view('pages.home')->with(compact('category','collection', 'new_product', 'slide', 'customers'));
    }
    public function category($slug){
        $category= Category::orderby('id', 'DESC')->get();
        $collection= Collection::orderby('id', 'DESC')->where('status', '1')->get();
        $category_id=Category::where('slug', $slug)->first();
        $category_name=$category_id->title;
        $product=Product::orderby('id', 'DESC')->where('status', 1)->where('category_id', $category_id->id)->get();
        $customers=Customer::where('id', '=', Session::get('loginId'))->first();
        return view('pages.category')->with(compact('category','collection','product', 'category_name', 'customers'));
    }
    public function collection($slug){
        $category= Category::orderby('id', 'DESC')->where('status', '1')->get();
        $collection= Collection::orderby('id', 'DESC')->where('status', '1')->get();
        $collection_id=Collection::where('slug', $slug)->first();
        $collection_name=$collection_id->title;
        $product=Product::orderby('id', 'DESC')->where('status', 1)->where('collection_id', $collection_id->id)->get();
        $customers=Customer::where('id', '=', Session::get('loginId'))->first();
        return view('pages.collection')->with(compact('category','collection','product', 'collection_name', 'customers'));
    }
    public function detail($slug){
        $collection= Collection::orderby('id', 'DESC')->where('status', '1')->get();
        $category= Category::orderby('id', 'DESC')->where('status', '1')->get();
        $product_id=Product::with('category_product')->where('slug', $slug)->where('status', 1)->first();// cac thuoc tinh cua san pham

        $product=Product::with('category_product')->orderby('id', 'DESC')->where('status', 1)->where('id', $product_id->id)->get(); // lay san pham dua vao id
        $customers=Customer::where('id', '=', Session::get('loginId'))->first();
        $same_category=Product::with('category_product')->where('category_id', $product_id->category_product->id)->orderby('id', 'DESC')->where('status', 1)->whereNotIn('id', [$product_id->id])->paginate(4);// lay 4 san pham co cung danh muc sap xep theo id moi den cu nhat
        return view('pages.detail')->with(compact('category','collection', 'product','product_id', 'same_category', 'customers'));
    }
    public function all_products(){
        $category= Category::orderby('id', 'DESC')->get();
        $collection= Collection::orderby('id', 'DESC')->where('status', '1')->get();
        $product=Product::orderby('id', 'DESC')->where('status', 1)->get();
        $customers=Customer::where('id', '=', Session::get('loginId'))->first();
        return view('pages.all_products')->with(compact('category', 'collection', 'product', 'customers'));
    }
    public function search(){
        $collection= Collection::orderby('id', 'DESC')->where('status', '1')->get();
        $category= Category::orderby('id', 'DESC')->where('status', '1')->get();
        $search_text=$_GET['query'];
        $search_product=Product::where('status', '1')->where('title', 'LIKE', '%'.$search_text.'%')->get();
        $customers=Customer::where('id', '=', Session::get('loginId'))->first();
        return view('pages.search')->with( compact('category','collection', 'search_product', 'search_text', 'customers'));
    }
    public function contact(){
        $category= Category::orderby('id', 'DESC')->where('status', '1')->get();
        $collection= Collection::orderby('id', 'DESC')->where('status', '1')->get();
        $customers=Customer::where('id', '=', Session::get('loginId'))->first();
        return view('pages.contact')->with(compact('category','collection',  'customers'));
    }

    // public function search_ajax(Request $request){
    //     $data=$request->all();
    //     if($data['keywords']){
    //         $product= Product::where('status', 1)->where('title', 'LIKE', '%'.$data['keywords'].'%')->get();
    //         $output='
    //             <ul class="dropdown-menu" style="display:block;">'
    //         ;
    //         foreach($product as $key => $tr){
    //             $output .='<li class="li_search_ajax"><a href="#">'.$tr->title.'</a></li>';
    //         }
    //         $output.='</ul>';
    //         echo $output;
    //     }

    // }

}
