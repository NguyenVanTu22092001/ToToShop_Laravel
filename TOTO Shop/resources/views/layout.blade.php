<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- datepicker-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-4/css/all.css" integrity="sha512-6U5KNsEE+CRbgf5YNMGPSEE6nZhyiDNx2BZHnQZhmOax53UVM3oleMs4O+56tVRLfeQB1ketGs5zIm+i1AyQrA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{url('/')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border-none px-3 mr-1">TOTO</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{url('/search')}}" method="GET">
                    @csrf

                    <div class="input-group">
                        <input type="search" class="form-control" name="query" placeholder="Tìm kiếm sản phẩm">
                        <!-- <div id="search_ajax"></div> -->
                        <button class="input-group-text bg-transparent text-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <div class="container-fluid">
        <div class="row border-none px-xl-5" style="font-size: 18px;">
            <div class="col-lg-2 d-none d-lg-block">
                <div class="dropdown">
                    <button class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 dropdown-toggle" style="font-size: 18px;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Loại sản phẩm
                    </button>
                    <ul class="w-100 overflow-hidden dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach($category as $key => $cate)
                        <li><a class="dropdown-item" href="{{url('category/'.$cate->slug)}}">{{$cate->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-10">
                <nav class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">TOTO</span>Shop</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{url('/')}}" class="nav-item nav-link active">Trang Chủ</a>
                            <div class="nav-item active">
                                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Bộ sưu tập</a>
                                <div class="dropdown-menu rounded-0 m-1 px-4">
                                    @foreach($collection as $key => $collections)
                                    <a href="{{url('collection/'.$collections->slug)}}" class="dropdown-item">{{$collections->title}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <a href="{{url('/all-products')}}" class="nav-item nav-link active">Sản Phẩm</a>
                            <a href="{{route('cart-user.index')}}" class="nav-item nav-link active">Giỏ Hàng-Thanh Toán</a>
                            <a href="{{url('/contact')}}" class="nav-item nav-link active">Liên hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            @if(Session::has('loginId'))
                            <a href="" data-bs-toggle="modal" data-bs-target="#nutdangnhap" class="nav-item nav-link">
                                {{$customers->name}}
                            </a>
                            @else
                            <a href="" data-bs-toggle="modal" data-bs-target="#nutdangnhap" class="nav-item nav-link">Đăng nhập</a>
                            @endif

                            @if(Session::has('loginId'))
                            <a href="logout" class="nav-item nav-link">Đăng xuất</a>

                            @else
                            <a href="" data-bs-toggle="modal" data-bs-target="#nutdangki" class="nav-item nav-link">Đăng Kí</a>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="modal fade" id="nutdangnhap" tabindex="-1" role="dialog" arai-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Đăng nhập</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form action="{{url('/login/user')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="text" class="form-control" placeholder="Nhập Email" name="email" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập Password" name="password" required="">
                        </div>

                        <div class="right-w3l">
                            <input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập">
                        </div>

                        <p class="text-center dont-do mt-3">Chưa có tài khoản?
                            <a href="" data-bs-toggle="modal" data-bs-target="#nutdangki">Đăng kí ngay</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row border-none " style="font-size: 18px;">
            @if(Session::has('successRegister'))
            <div class="alert">{{Session::get('successRegister')}}</div>
            @elseif(Session::has('failRegister'))
            <div class="alert">{{Session::get('failRegister')}}</div>
            @elseif(Session::has('failLogin'))
            <div class="alert">{{Session::get('failLogin')}}</div>
            @else
           
            @endif
        </div>
    </div>
    <div class="modal fade" id="nutdangki" tabindex="-1" role="dialog" arai-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Đăng kí</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/login/create')}}" method="POST">

                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Họ và tên</label>
                            <input type="text" class="form-control" placeholder="Nhập tên" name="name" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Giới tính</label>
                            <select class="form-select" name="gender">
                                <option value="0" selected>Gender</option>
                                <option value="1">Female</option>
                                <option value="2">Male</option>
                                <option value="3">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-form-label">Ngày sinh</label>
                            <div class="input-group date" id="datetimepicker">
                                <input type="text" class="form-control" placeholder="YYYY-MM-DD" name="birthday" required="">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="text" class="form-control" placeholder="Nhập email" name="email" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Địa chỉ" name="address" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập password" name="password" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" value="Đăng kí" name="dangki">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @yield('slide')

    @yield('content')

    <div class="container-fluid text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">TOTO</span>SHOP</h1>
                </a>
                <p>Mô tả shop</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> Địa chỉ: 123 Nguyễn Trãi</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i> Gmail: tu123@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i> Phone number: 098765</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Truy cập Nhanh</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="{{url('/')}}"><i class="fa fa-angle-right mr-2"></i>Trang Chủ</a>
                            <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Sản Phẩm</a>
                            <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Giới Thiệu</a>
                            <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Giỏ Hàng</a>
                            <a class="text-dark" href="lienhe.php"><i class="fa fa-angle-right mr-2"></i>Liên Hệ</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Truy Cập Nhanh </h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Chính sách</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Truy Cập Nhanh </h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Chính sách</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-0">
            <div class="col-lg-12 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="https://www.facebook.com/Totoshop.com.vn/">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="https://www.instagram.com/totoshopvn/">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark px-2" href="https://www.youtube.com/channel/UCNlOKoeutijiatYxUkDXGnA">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <a href="" class="btn btn-primary back-to-top "><i class="fa fa-angle-double-up"></i></a>

</body>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<!-- //data table -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css'></script>
<script src='https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js'></script>
<!-- <script type="text/javascript">
    $('#keyboard').keyup(function(){
        var keywords=$(this).val();
        if(keywords!=''){
            var _token= $('input[name="_token"]').val();

            $.ajax({
                url:"{{url('/search-ajax')}}",
                method:"POST",
                data:{query:keywords, _token:_token},
                success:function(data){
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                }
            });

        }else{
            $('#search_ajax').fadeOut();
        }
    });
    $(document).on('click', '.li_search_ajax', function(){
        $('#keywords').val($(this).text());
        $('#search_ajax').fadeOut();
    });
</script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#datetimepicker').datetimepicker();
    });
</script> -->
<script>
// function wcqib_refresh_quantity_increments() {
//     jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
//         var c = jQuery(b);
//         c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
//     })
// }
String.prototype.getDecimals || (String.prototype.getDecimals = function() {
    var a = this,
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).ready(function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("updated_wc_div", function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("click", ".plus, .minus", function() {
    var a = jQuery(this).closest(".quantity").find(".qty"),
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
    b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
});
</script>

</html>