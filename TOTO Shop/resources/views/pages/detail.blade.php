@extends('../layout')
@section('content')
@foreach($product as $key => $prod)
<Style>
    .quantity {
        display: inline-block;
    }

    .quantity .input-text.qty {
        width: 35px;
        height: 39px;
        padding: 0 5px;
        text-align: center;
        background-color: transparent;
        border: 1px solid #efefef;
    }

    .quantity.buttons_added {
        text-align: left;
        position: relative;
        white-space: nowrap;
        vertical-align: top;
    }

    .quantity.buttons_added input {
        display: inline-block;
        margin: 0;
        vertical-align: top;
        box-shadow: none;
    }

    .quantity.buttons_added .minus,
    .quantity.buttons_added .plus {
        padding: 7px 10px 8px;
        height: 41px;
        background-color: #ffffff;
        border: 1px solid #efefef;
        cursor: pointer;
    }

    .quantity.buttons_added .minus {
        border-right: 0;
    }

    .quantity.buttons_added .plus {
        border-left: 0;
    }

    .quantity.buttons_added .minus:hover,
    .quantity.buttons_added .plus:hover {
        background: #eeeeee;
    }

    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        margin: 0;
    }

    .quantity.buttons_added .minus:focus,
    .quantity.buttons_added .plus:focus {
        outline: none;
    }
</style>
<div class="container">
    <div class=" row align-items-center row px-xl-5 " style="min-height: 50px">

        <!-- <h1 class="font-weight-semi-bold text-uppercase mb-3">Sản Phẩm</h1> -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item fs-2"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item fs-2"><a href="{{url('/category/'.$product_id->category_product->slug)}}">{{$product_id->category_product->title}}</a></li>

                <li class="breadcrumb-item fs-2" aria-current="page">{{$prod->title}}</li>
            </ol>
        </nav>

    </div>
</div>
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{asset('public/uploads/product/'.$prod->image)}}" alt="Image">
                    </div>

                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{$prod->title}}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">Giá: {{number_format($prod->saleoff)}}</h3>

            <div class="d-flex mb-3">
                <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                <form>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-1" name="size">
                        <label class="custom-control-label" for="size-1">XS</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-2" name="size">
                        <label class="custom-control-label" for="size-2">S</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-3" name="size">
                        <label class="custom-control-label" for="size-3">M</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-4" name="size">
                        <label class="custom-control-label" for="size-4">L</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="size-5" name="size">
                        <label class="custom-control-label" for="size-5">XL</label>
                    </div>
                </form>
            </div>
            <div class="d-flex mb-4">
                <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                <form>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-1" name="color">
                        <label class="custom-control-label" for="color-1">Black</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-2" name="color">
                        <label class="custom-control-label" for="color-2">White</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-3" name="color">
                        <label class="custom-control-label" for="color-3">Red</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-4" name="color">
                        <label class="custom-control-label" for="color-4">Blue</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="color-5" name="color">
                        <label class="custom-control-label" for="color-5">Green</label>
                    </div>
                </form>
            </div>
            <div class="d-flex mb-4">
                <div class="input-group quantity mr-3" style="width: 130px;">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Số lượng:</p>

                    <form action="{{route('cart-user.store')}}" method="POST"> 
                        @csrf
                        <!-- <input type="text" name="sanpham_soluong" class="form-control bg-secondary text-center" value="1"> -->

                        <input type="hidden" name="product_id" value="{{$prod->id}}">
                        <input type="hidden" name="name" value="{{$prod->title}}">
                        <input type="hidden" name="price" value="{{$prod->saleoff}}">
                        <input type="hidden" name="collection_id" value="{{$prod->collection_id}}">
                        <input type="hidden" name="category_id" value="{{$prod->category_id}}">
                        @if(Session::has('loginId'))
                        <input type="hidden" name="customer_id" value="{{Session::get('loginId')}}">
                        @else
                        <input type="hidden" name="customer_id" value="0">
                        @endif
                        <!-- <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <div class="btn btn-minus">
                                    <a class="ddd" href="#" data-bs-multi="-1">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="text" class="form-control text-center " value="1" style="border:none">
                            <div class="input-group-btn">
                                <div class="btn btn-plus">
                                    <a class="ddd" href="#" data-bs-multi="-1">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                        <div class="quantity buttons_added">
                            <input type="button" value="-" class="minus">
                            <input type="number" step="1" min="1" max="" name="quantity" value="1" class="input-text qty text">
                            <input type="button" value="+" class="plus">
                        </div>
                        <br>
                        <br>
                        <button name="" class="btn btn-primary px-3" style="width: 200px;"><i class="fa fa-shopping-cart mr-1"></i>Thêm vào giỏ hàng</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-bs-toggle="tab" href="#tab-pane-1">Description</a>
                <a class="nav-item nav-link" data-bs-toggle="tab" href="#tab-pane-2">Information</a>
                <a class="nav-item nav-link" data-bs-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">{!!$prod->description!!}</h4>

                </div>
                <div class="tab-pane fade" id="tab-pane-2">
                    <h4 class="mb-3">Additional Information</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">

                                </li>
                                <li class="list-group-item px-0">

                                </li>
                                <li class="list-group-item px-0">

                                </li>
                                <li class="list-group-item px-0">
                                    .
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">

                                </li>
                                <li class="list-group-item px-0">

                                </li>
                                <li class="list-group-item px-0">

                                </li>
                                <li class="list-group-item px-0">

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">1 review</h4>
                            <div class="media mb-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6> Ha<small> - <i>01 Jan 2045</i></small></h6>
                                    <div class="text-primary mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>

                            <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="message">Your Review *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <br>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class=""><span class="px-2">Sản phẩm tương tự </span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach($same_category as $key => $same_cate)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-text mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <a href="{{url('productdetail/'.$same_cate->slug)}}" target="_blank">
                        <img class="img-fluid w-100" src="{{asset('public/uploads/product/'.$same_cate->image)}}" target="_blank">
                    </a>
                </div>

                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3" style="font-size:20px">{{$same_cate->title}}</h6>
                    <div class="d-flex justify-content-center">
                        <h6> {{$same_cate->title}}&emsp;&emsp;</h6>
                        <h6 class="text-muted ml-2"><del><?php echo number_format(1000000) ?></del></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a target="_blank" href="{{url('productdetail/'.$prod->slug)}}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i> Xem Chi Tiết</a>
                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>

@endforeach


@endsection