@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chỉnh sửa sản phẩm</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="{{route('product.index')}}" class="btn btn-success">Danh sách sản phẩm</a>
                    <a href="{{route('product.create')}}" class="btn btn-success">Thêm sản phẩm</a>
                    <form action="{{route('product.update',  $product->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" id="slug" aria-describedby="" name="title" onkeyup="ChangeToSlug();" value="{{$product->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="convert_slug" aria-describedby="" name="slug" value="{{$product->slug}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea  class="form-control" id="description_product" aria-describedby="" name="description">{!!$product->description!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="" aria-describedby="" name="quantity" value="{{$product->quantity}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Price</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="price" value="{{$product->price}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Saleoff</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="saleoff" value="{{$product->saleoff}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>
                            <select class="form-select" aria-label="" name="categoryname">
                                @foreach($category as $key =>$cate)
                                <option {{$cate->id==$product->category_id ? 'selected':''}} value="{{$cate->id}}">{{$cate->title}}</option>  
                                @endforeach   
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Collection</label>
                            <select class="form-select" name="collectionname">
                                @foreach($collection as $key =>$collections)
                                <option {{$collections->id==$product->collection_id ? 'selected':''}} value="{{$collections->id}}">{{$collections->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" class="form-control" id="" aria-describedby="" name="image" value="{{$product->image}}">
                            <img src="{{asset('public/uploads/product/'.$product->image)}}" height="100px" width="150px">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>
                            <select class="form-select" aria-label="" name="status">
                                @if($product->status==1)
                                <option value="1" selected>Hiển thị</option>
                                <option value="0">Không hiển thị</option>
                                @else
                                <option value="0" selected>Không hiển thị</option>
                                <option value="1">Hiển thị</option>
                                @endif
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection