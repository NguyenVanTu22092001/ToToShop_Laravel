@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Danh sách sản phẩm</div>
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
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Saleoff</th>
                                <th scope="col">Category</th>
                                <th scope="col">Collection</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=0
                            @endphp
                            @foreach($product as $key =>$prod)
                            @php
                            $i++
                            @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{$prod->title}}</td>
                                <td>{{$prod->slug}}</td>
                                <td>{!!$prod->description!!}</td>
                                <td>{{$prod->quantity}}</td>
                                <td>{{number_format($prod->price)}}</td>
                                <td>{{number_format($prod->saleoff)}}</td>
                                <td>
                                    {{$prod->category_product->title}}
                                </td>
                                <td>
                                    @foreach($collection as $key =>$collections)

                                    @if($prod->collection_id == $collections->id)
                                    {{$collections->title}}
                                    @break;
                                    @else
                                    @continue
                                    @endif

                                    @endforeach

                                </td>
                                <td><img src="{{asset('public/uploads/product/'.$prod->image)}}" height="200px" width="150px"></td>
                                <td>
                                    @if($prod->status==0)
                                    Không hiển thị
                                    @else
                                    Hiển thị
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('product.destroy', $prod->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn muốn xóa danh mục này ?')" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{route('product.edit', $prod->id)}}" class="btn btn-warning">Update</a>
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