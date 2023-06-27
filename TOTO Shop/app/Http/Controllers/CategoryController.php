<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderby('id', 'DESC')->get();
        return view('admincp.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.category.create');
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
                'title' => 'required|unique:category|max:255',
                'slug'=> 'required|unique:category|max:255',
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
        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];

        $category->status = $data['status'];

        $get_image = $request->image;
        $path = "public/uploads/category/";
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99999) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $category->image = $new_image;

        $category->save();
        return redirect()->back()->with('status', 'Success');
        // return redirect()->route('category.index')->with('status','Success');
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
        $category= Category::find($id);
        return view('admincp.category.edit', compact('category'));
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
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];

        $category->status = $data['status'];

        $get_image = $request->image;
        if ($get_image) {
            $path_unlink = 'public/uploads/category/' . $category->image;
            if (file_exists($path_unlink)) {
                unlink($path_unlink);
            }
            $path = "public/uploads/category/";
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $category->image = $new_image;
        }
        $category->save();
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
        $category = Category::find($id);
        $path_unlink = 'public/uploads/category/' . $category->image;
        if (file_exists($path_unlink)) {
            unlink($path_unlink);
        }
        $category->delete();
        return redirect()->back();
    }
}
