@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Thêm danh mục</div>
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
                    <form action="{{route('slide.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" id="slug" aria-describedby="" onkeyup="ChangeToSlug();" name="title">
                        </div>
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="description">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" class="form-control" id="" aria-describedby="" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>
                            <select class="form-select" aria-label="" name="status">
                                <option value="1">Hiển thị</option>  
                                <option value="0">Không hiển thị </option>
                                                 
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection