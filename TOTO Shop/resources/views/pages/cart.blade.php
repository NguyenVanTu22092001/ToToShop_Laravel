@extends('../layout')
@section('content')
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ Hàng</h1>

    </div>
</div>

<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">

            <form action="" method="POST">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-primary text-dark">
                        <tr>
                            <th>Thứ tự </th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Tổng tiền </th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php
                        $i=0;
                        $total=0;
                        @endphp
                        @if($cartCount != 0)
                        @foreach($carts as $key => $cart)
                
                        <tr>
                            <form action="{{route('cart-user.destroy', $cart->id)}}" method="POST">   
                                @csrf
                                {{method_field('DELETE')}}
                                <input type="hidden" name="cart_id" value="{{$cart->id}}">
                                @php 
                                $i++
                                @endphp
                                <td class="align-middle">{{$i}}</td>
                                <td class="align-middle"><img src="" alt="" style="width: 50px;">{{$cart->name}}</td>

                                <td class="align-middle">{{number_format($cart->price)}}</td>
                                <td class="align-middle">
                                    <input style="width:50%;text-align:center;border:none" type="number" name="" value="{{$cart->quantity}}">
                                    <!-- <input style="width:50%;text-align:center;border:none"type="hidden" name="" value=""> -->
                                </td>
                                <td class="align-middle">{{number_format(($cart->quantity)*($cart->price))}}</td>
                                <td class="align-middle">
                                    <button type="submit" onclick="return confirm('Bạn muốn xóa sản phẩm này ?')" style="border:none;background-color:white"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </form>
                            <!--Button xóa sản phẩm-->
                        </tr>
                        @continue($total+=($cart->quantity)*($cart->price))
                        @endforeach
                        @else
                            <p>Không có sản phẩm </p>
                        @endif
                    </tbody>
                    <tbody class="align-middle">

                        <tr>
                            <td class="align-middle" colspan="4">Tổng tiền</td>
                            <td class="align-middle">{{number_format($total)}}</td>
                            <!--Giá tiền-->
                            <td class="align-middle"><input class="btn btn-sm btn-primary" type="submit" value="Cập nhật" name=""></td>
                            <!--Button xóa sản phẩm-->
                        </tr>

                    </tbody>
                </table>
            </form>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Mã Giảm Giá">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Nhập</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Tổng</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Thành Tiền</h6>
                        <h6 class="font-weight-medium">
                            </td>
                        </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium"></h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng tiền</h5>
                        <h5 class="font-weight-bold"></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh Toán</h1>
    </div>
</div>


<div class="container-fluid pt-5">
    <form action="" method="POST">
        <div class="row px-xl-5">

            <div class="col-lg-8">

                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin khách hàng</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Họ và tên:</label>
                            <input class="form-control" type="text" placeholder="" required="" name="hovaten">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com" name="gmail">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Password</label>
                            <input class="form-control" type="text" placeholder="password" name="password">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>SĐT</label>
                            <input class="form-control" type="text" placeholder="" required="" name="sodienthoai">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Địa Chỉ</label>
                            <input class="form-control" type="text" placeholder="" required="" name="diachi">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Hình thức thanh toán</nav></label>
                            <select class="custom-select" name="hinhthucgiaohang" required="">
                                <option selected>--Chọn hình thức--</option>
                                <option value="1">Thanh toán trực tuyến</option>
                                <option value="0">Thanh toán tại nhà</option>
                            </select>

                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control" rows="6" id="message" placeholder="" required="required" data-validation-required-message="Không Được Bỏ Trống" name="ghichu"></textarea>
                        </div>
                    </div>

                </div>

                <input style="width:50%;text-align:center;border:none" type="hidden" name="thanhtoan_soluong[]" value="">
                <input style="width:50%;text-align:center;border:none" type="hidden" name="thanhtoan_product_id[]" value="">

                <div class="card border-secondary mb-5">
                    <div class="card-footer border-secondary bg-transparent">
                        <input type="submit" name="thanhtoan" class="btn btn-lg btn-block btn-primary " value="Hoàn thành">
                    </div>
                </div>
    </form>
</div>
</div>
</form>
</div>
@endsection