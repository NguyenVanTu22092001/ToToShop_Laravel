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
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count=0
                            @endphp
                            @foreach($contact as $key =>$value)
                            @php
                            $count++
                            @endphp
                            <tr>
                                <th scope="row">{{$count}}</th>
                                <td>{{$value->name}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->phone}}</td>
                                <td>
                                    {{$value->subject}}
                                </td>
                                <td>{{$value->subject}}</td>
                                <td>
                                    @foreach($customers as $key => $customer)
                                        @if($customer->id == $value->customer_id)
                                        {{$customer->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <form action="{{route('contact.destroy', $value->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn muốn xóa danh mục này ?')" class="btn btn-danger">Delete</button>
                                    </form>
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