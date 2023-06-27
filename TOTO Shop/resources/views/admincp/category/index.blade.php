@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Danh sách danh mục</div>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
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
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $key =>$cate)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$cate->title}}</td>
                                <td>{{$cate->slug}}</td>
                                <td>{{$cate->description}}</td>
                                <td><img src="{{asset('public/uploads/category/'.$cate->image)}}" height="200px" width="150px"></td>
                                <td>
                                    @if($cate->status==0)
                                    Không hiển thị
                                    @else
                                    Hiển thị
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('category.destroy', $cate->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn muốn xóa danh mục này ?')" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{route('category.edit', $cate->id)}}" class="btn btn-warning">Update</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection