<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Collection;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::orderby('id', 'DESC')->get();
        return view('admincp.customer.index')->with(compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // ham khach hang tao tai khoan
    public function store(Request $request)
    {
        $data = $request->all();
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'gender' => 'required',
                'birthday' => 'required',

                'email' => 'required|unique:customers|email',
                'phone' => 'required|min:10|max:15',
                'address' => 'required',

                'password' => 'required',

            ],
            // [
            //     'title.unique'=>'Danh mục tồn tại, nhập tên danh mục khác !!!',
            //     'title.required'=>'Danh mục không được để trống',
            //     'description.required'=> 'Mô tả không được để trống',
            //     'image.required' => 'Hình ảnh không được để trống',
            // ]
        );
        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->gender = $data['gender'];
        $customer->birthday = $data['birthday'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->address =  $data['address'];

        $customer->password = Hash::make($data['password']);


        $customer->save();
        $result = $customer->save();
        if ($result) {
            return redirect('/')->with('successRegister', 'You have registered successfully');
        } else {
            return redirect('/')->with('failRegister', 'You have registered successfully');
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
        $customer = Customer::find($id);
        return view('admincp.customer.edit', compact('customer'));
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
                'name' => 'required|max:255',
                'gender' => 'required',
                'birthday' => 'required',

                'email' => 'required|email',
                'phone' => 'required|max:15',
                'address' => 'required',

                'password' => 'required',

            ],
            // [
            //     'title.unique'=>'Danh mục tồn tại, nhập tên danh mục khác !!!',
            //     'title.required'=>'Danh mục không được để trống',
            //     'description.required'=> 'Mô tả không được để trống',
            //     'image.required' => 'Hình ảnh không được để trống',
            // ]
        );
        $customer = Customer::find($id);
        $customer->name = $data['name'];
        $customer->gender = $data['gender'];
        $customer->birthday = $data['birthday'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->address =  $data['address'];
        $customer->password =  Hash::make($data['password']);
        $customer->save();
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
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->back();
    }
    // ham dang nhap vao client
    public function loginUser(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
        );
        $customer = Customer::where('email', '=', $request->email)->first();

        if ($customer) {
            if (Hash::check($request->password, $customer->password)) {
                $request->session()->put('loginId', $customer->id);

                return redirect('/')->with('successLogin', 'Success');
            } else {
                return redirect('/')->with('failLogin', 'Incorrect email or password');
            }
        } else {
            return redirect('/')->with('failLogin', 'Incorrect email or password');
        }
    }
 
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
    }

}