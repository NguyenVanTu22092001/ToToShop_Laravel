@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chỉnh sửa khách hàng</div>
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
                    <a href="{{route('customer.index')}}" class="btn btn-success">Danh sách khách hàng</a>

                    <form action="{{route('customer.update',  $customer->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="name" onkeyup="" value="{{$customer->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>
                            <select class="form-select" aria-label="" name="gender">
                                @if($customer->gender==1)
                                <option value="1" sellected>Female</option>
                                <option value="2">Male</option>
                                <option value="3">Other</option>
                                @elseif($customer->gender==2)
                                <option value="2" selected>Male</option>
                                <option value="1">Female</option>
                                <option value="3">Other</option>
                                @else
                                <option value="3" selected>Other</option>
                                <option value="1">Female</option>
                                <option value="2">Male</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Birthday</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="birthday" onkeyup="" value="{{$customer->birthday}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" id="" aria-describedby="" name="email" value="{{$customer->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="phone" value="{{$customer->phone}}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="address" value="{{$customer->address}}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="text" class="form-control" id="" aria-describedby="" name="password" onkeyup="" value="{{$customer->password}}">
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