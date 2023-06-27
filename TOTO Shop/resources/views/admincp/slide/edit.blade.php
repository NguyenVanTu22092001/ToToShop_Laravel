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
                    <a href="{{route('slide.index')}}" class="btn btn-success">Danh sách slide</a>
                    <a href="{{route('slide.create')}}" class="btn btn-success">Thêm slide</a>
                    <form action="{{route('slide.update',  $slide->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" id="slug" aria-describedby="" name="title" onkeyup="ChangeToSlug();" value="{{$slide->title}}">
                        </div>
                      
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="description" value="{{$slide->description}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" class="form-control" id="" aria-describedby="" name="image" value="{{$slide->image}}">
                            <img src="{{asset('public/uploads/slide/'.$slide->image)}}" height="100px" width="150px">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>
                            <select class="form-select" aria-label="" name="status">
                                @if($slide->status==1)
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