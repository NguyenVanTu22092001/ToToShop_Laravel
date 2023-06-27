<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact= Contact::orderBy('id', 'DESC')->get();
        $customers= Customer::orderBy('id', 'DESC')->get();
        return  view('admincp.contact.index')->with(compact('contact',  'customers'));
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
    public function store(Request $request)
    {
        $data = $request->all();
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|min:5|max:15',
                'subject' =>'required|max:255',
                'message' => 'required',
                'customer_id',
            ],
            // [
            //     'title.unique'=>'Danh mục tồn tại, nhập tên danh mục khác !!!',
            //     'title.required'=>'Danh mục không được để trống',
            //     'description.required'=> 'Mô tả không được để trống',
            //     'image.required' => 'Hình ảnh không được để trống',
            // ]
        );
        $contact = new Contact();
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];

        $contact->subject = $data['subject'];
        $contact->message =  $data['message'];
        if(Session::has('loginId')){
            $customer_id=Session::get('loginId');
        }
        else{
            $customer_id=0;
        }
        $contact->customer_id = $customer_id;
        $contact->save();   
        return redirect()->back()->with('successContact', 'Thank you. We will contact you soon');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        
        $contact->delete();
        return redirect()->back();
    }
}
