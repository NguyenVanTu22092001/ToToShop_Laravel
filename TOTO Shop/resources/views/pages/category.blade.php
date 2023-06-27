@extends('../layout')
@section('content')

<div class="container">
    <div class=" row align-items-center row px-xl-5 ">

        <!-- <h1 class="font-weight-semi-bold text-uppercase mb-3">Sản Phẩm</h1> -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-2"><a href="{{url('/')}}">Home</a></li>

                <li class="breadcrumb-item fs-2" aria-current="page">{{$category_name}}</li>
            </ol>
        </nav>

    </div>
</div>

<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
            @include('pages.sidebar')
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <!-- <form action="">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search_product" placeholder="Tìm kiếm sản phẩm">
                                <button class="input-group-text bg-transparent text-primary" name="search_button" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form> -->
                        <div class="nav-item dropdown ml-4">
                            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sắp Xếp Theo
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="#">Muộn Nhất</a>
                                <a class="dropdown-item" href="#">Bán Chạy Nhất</a>

                            </div>
                        </div>
                    </div>
                </div>
                @foreach($product as $key => $prod)
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <a href="{{url('product/'.$prod->slug)}}"><img class="img-fluid w-100" src="{{asset('public/uploads/product/'.$prod->image)}}" alt=""></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{$prod->title}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>{{number_format($prod->saleoff)}}</h6>
                                    <h6 class="text-muted ml-2"><del>
                                            @if($prod->price != $prod->saleoff)
                                            {{number_format($prod->price)}}
                                            @else
                                            {{""}}
                                            @endif
                                        </del></del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{url('product/'.$prod->slug)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết</a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <!-- Shop Product End -->
    </div>
</div>
@endsection