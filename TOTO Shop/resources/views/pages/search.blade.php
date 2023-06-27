@extends('../layout')
@section('content')

<div class="container">
    <div class=" row align-items-center row px-xl-5 " style="min-height: 50px">

        <!-- <h1 class="font-weight-semi-bold text-uppercase mb-3">Sản Phẩm</h1> -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-2"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item fs-2" aria-current="page">Tìm kiếm</li>
                <li class="breadcrumb-item fs-2" aria-current="page">{{$search_text}}</li>
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
                                <input type="search" class="form-control" name="" placeholder="Tìm kiếm sản phẩm">
                                <button class="input-group-text bg-transparent text-primary" name="query" type="submit">
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
                @php
                $countProduct=count($search_product);
                @endphp
                @if($countProduct == 0)
                <p>Không tìm thấy sản phẩm cần tìm kiếm</p>
                @else
                @foreach($search_product as $key => $search_prod)
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <a href="{{url('product/'.$search_prod->slug)}}"><img class="img-fluid w-100" src="{{asset('public/uploads/product/'.$search_prod->image)}}" alt=""></a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">{{$search_prod->title}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6><?php echo number_format(1000000) ?>&emsp;&emsp;</h6>
                                    <h6 class="text-muted ml-2"><del><?php echo number_format(1200000) ?></del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{url('product/'.$search_prod->slug)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết</a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
@endsection