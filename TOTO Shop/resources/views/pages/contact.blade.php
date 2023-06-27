@extends('../layout')
@section('content')
<!-- Page Header Start -->
<div class="container">
        <div class="row border-none " style="font-size: 18px;">
            @if(Session::has('successContact'))
            <div class="alert">{{Session::get('successContact')}}</div>
            @else
           
            @endif
        </div>
    </div>
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Liên Hệ </span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form">
                <div id="success"></div>
                <form action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" placeholder="Tên" name="name" required="required" data-validation-required-message="Không Được Bỏ Trống" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="required" data-validation-required-message="Không Được Bỏ Trống" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="number" class="form-control" id="phone" placeholder="Số điện thoại" name="phone" required="required" data-validation-required-message="Không Được Bỏ Trống" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="subject" placeholder="Chủ Đề" name="subject" required="required" data-validation-required-message="Không Được Bỏ Trống" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" rows="6" id="message" placeholder="Tin nhắn" name="message" required="required" data-validation-required-message="Không Được Bỏ Trống"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="hidden" class="form-control" id="" name="customer_id" required="required" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <input class="btn btn-primary py-2 px-4" type="submit" name="contact" value="Gửi">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-5 mb-5">
            <div class="d-flex flex-column mb-3">
                <h5 class="font-weight-semi-bold mb-3">Store</h5>

                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Địa chỉ: 123 Nguyễn Trãi</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>Gmail: tu763@gmail.com</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>Điện thoại: 087654567</p>

            </div>

        </div>
    </div>
</div>

@endsection