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
                                <th scope="col">Gender</th>
                                <th scope="col">Birthday</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Password</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $countCustomers =0;
                            @endphp
                            @foreach($customer as $key =>$customers)
                            @php
                            $countCustomers++;
                            @endphp
                            <tr>
                                <th scope="row">{{$countCustomers}}</th>
                                <td>{{$customers->name}}</td>
                                <td>
                                    @if($customers->gender==1)
                                    Female
                                    @elseif($customers->gender==2)
                                    Male
                                    @elseif($customers->gender==3)
                                    Other
                                    @else
                                    Unidentified
                                    @endif
                                </td>
                                <td>{{$customers->birthday}}</td>

                                <td>
                                {{$customers->email}}
                                </td>
                                <td>{{$customers->phone}}</td>
                                <td>{{$customers->address}}</td>
                                <td>{{$customers->password}}</td>
                                <td>
                                    <form action="{{route('customer.destroy', $customers->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn muốn xóa danh mục này ?')" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{route('customer.edit', $customers->id)}}" class="btn btn-warning">Update</a>
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