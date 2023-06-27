@extends('../layout')
@section('slide')
@include('pages.slide')

@endsection
@section('content')
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Chất lượng đảm bảo</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Ship</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hoàn trả 14 ngày </h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hoạt động 24/7</h5>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-10"><span class="px-2">Danh mục</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach($category as $key => $cate)
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px ;">
                <a href="{{url('category/'.$cate->slug)}}"  class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid w-100" src="{{asset('public/uploads/category/'.$cate->image)}}" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0 ">{{$cate->title}}</h5>
            </div>
        </div>
        @endforeach

    </div>
</div>
@include('pages.banner')
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class=""><span class="px-2">Hàng Mới </span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach($new_product as $key => $new_prod)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-text mb-4">

                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <a href="{{url('product/'.$new_prod->slug)}}" target="_blank">
                        <img class="img-fluid w-100" src="{{asset('public/uploads/product/'.$new_prod->image)}}" target="_blank">
                    </a>
                </div>
                
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3" style="font-size:20px">{{$new_prod->title}}</h6>
                    <div class="d-flex justify-content-center">
                        <h6> {{number_format($new_prod->saleoff)}}</h6>
                        
                        <h6 class="text-muted ml-2"><del>
           
                            @if($new_prod->price != $new_prod->saleoff)
                                {{number_format($new_prod->price)}}
                            @else
                                {{""}}
                            @endif

                        </del></h6>

                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a target="_blank" href="{{url('product/'.$new_prod->slug)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i> Xem Chi Tiết</a>
                </div>


            </div>

        </div>
        @endforeach

    </div>
</div>

@endsection
