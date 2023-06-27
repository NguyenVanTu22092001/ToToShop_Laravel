<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Collection::orderby('id', 'DESC')->get();
        return view('admincp.collection.index')->with(compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admincp.collection.create');
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
                'title' => 'required|unique:collection|max:255',
                'slug' => 'required|unique:collection|max:255',
                'description' => 'required|max:255',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096|dimensions:min_width=100, min_height=100, max_width=2000, max_height=20000',
                'status' => 'required',
            ],
            // [
            //     'title.unique'=>'Danh mục tồn tại, nhập tên danh mục khác !!!',
            //     'title.required'=>'Danh mục không được để trống',
            //     'description.required'=> 'Mô tả không được để trống',
            //     'image.required' => 'Hình ảnh không được để trống',
            // ]
        );
        $collection = new Collection();
        $collection->title = $data['title'];
        $collection->slug = $data['slug'];
        $collection->description = $data['description'];

        $collection->status = $data['status'];

        $get_image = $request->image;
        $path = "public/uploads/collection/";
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99999) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $collection->image = $new_image;

        $collection->save();
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
        $collection = Collection::find($id);
        return view('admincp.collection.edit', compact('collection'));
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
                'description' => 'required|max:255',
                'status' => 'required',
            ],
            // [
            //     'title.unique'=>'Danh mục tồn tại, nhập tên danh mục khác !!!',
            //     'title.required'=>'Danh mục không được để trống',
            //     'description.required'=> 'Mô tả không được để trống',
            //     'image.required' => 'Hình ảnh không được để trống',
            // ]
        );
        $collection = Collection::find($id);
        $collection->title = $data['title'];
        $collection->slug = $data['slug'];
        $collection->description = $data['description'];

        $collection->status = $data['status'];

        $get_image = $request->image;
        if ($get_image) {
            $path_unlink = 'public/uploads/collection/' . $collection->image;
            if (file_exists($path_unlink)) {
                unlink($path_unlink);
            }
            $path = "public/uploads/collection/";
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $collection->image = $new_image;
        }
        $collection->save();
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
        $collection = Collection::find($id);
        $path_unlink = 'public/uploads/collection/' . $collection->image;
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $collection->delete();
        return redirect()->back();
    }
}
