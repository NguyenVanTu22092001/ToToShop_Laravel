@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chỉnh sửa danh mục</div>
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
                    <a href="{{route('category.index')}}" class="btn btn-success">Danh sách danh mục</a>
                    <a href="{{route('category.create')}}" class="btn btn-success">Thêm danh mục</a>
                    <form action="{{route('category.update',  $category->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" id="slug" aria-describedby="" name="title" onkeyup="ChangeToSlug();" value="{{$category->title}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="convert_slug" aria-describedby="" name="slug" value="{{$category->slug}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="description" value="{{$category->description}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" class="form-control" id="" aria-describedby="" name="image" value="{{$category->image}}">
                            <img src="{{asset('public/uploads/category/'.$category->image)}}" height="100px" width="150px">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>
                            <select class="form-select" aria-label="" name="status">
                                @if($category->status==1)
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