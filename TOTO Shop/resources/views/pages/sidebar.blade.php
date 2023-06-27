<div class="col-lg-3 col-md-12">
    <!-- Price Start -->
    <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Lọc Theo Giá</h5>
        <form action="" method="">
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="price-1">
                <label class="custom-control-label" for="price-1">0 - 100.000</label>
                <span class=" font-weight-normal">150</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="price-2">
                <label class="custom-control-label" for="price-2">200.000 - 500.000</label>
                <span class="  font-weight-normal">295</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="price-3">
                <label class="custom-control-label" for="price-3">500.000 - 700.000</label>
                <span class=" font-weight-normal">246</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="price-4">
                <label class="custom-control-label" for="price-4">700.000 - 1.000.000</label>
                <span class="font-weight-normal">145</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="price-5">
                <label class="custom-control-label" for="price-5">Trên 1.000.000</label>
                <span class="font-weight-normal">168</span>
            </div>
        </form>
    </div>
    <!-- Price End -->
    <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Lọc Theo Danh mục</h5>
        <form>
            @foreach ($category as $key => $cate)
                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                    <input type="checkbox" class="custom-control-input" id="{{ $cate->id }}">
                    <label class="custom-control-label" for="{{ $cate->id }}">{{ $cate->title }}</label>
                    <span class=" font-weight-normal">150</span>
                </div>
            @endforeach
        </form>
    </div>

    <!-- Color Start -->
    {{-- <div class="border-bottom mb-4 pb-4">
        <h5 class="font-weight-semi-bold mb-4">Lọc Theo Màu Sắc</h5>
        <form>

            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-1">
                <label class="custom-control-label" for="color-1">Đen</label>
                <span class="badge border font-weight-normal">150</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-2">
                <label class="custom-control-label" for="color-2">Trắng</label>
                <span class="badge border font-weight-normal">295</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-3">
                <label class="custom-control-label" for="color-3">Đỏ</label>
                <span class="badge border font-weight-normal">246</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="color-4">
                <label class="custom-control-label" for="color-4">Xanh Biển</label>
                <span class="badge border font-weight-normal">145</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                <input type="checkbox" class="custom-control-input" id="color-5">
                <label class="custom-control-label" for="color-5">Xanh Lá</label>
                <span class="badge border font-weight-normal">168</span>
            </div>
        </form>
    </div> --}}
    <!-- Color End -->

    <!-- Size Start -->
    {{-- <div class="mb-5">
        <h5 class="font-weight-semi-bold mb-4">Lọc Theo Cỡ</h5>
        <form>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" checked id="size-all">
                <label class="custom-control-label" for="size-all">Tất cả</label>
                <span class="badge border font-weight-normal">1000</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-1">
                <label class="custom-control-label" for="size-1">XS</label>
                <span class="badge border font-weight-normal">150</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-2">
                <label class="custom-control-label" for="size-2">S</label>
                <span class="badge border font-weight-normal">295</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-3">
                <label class="custom-control-label" for="size-3">M</label>
                <span class="badge border font-weight-normal">246</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                <input type="checkbox" class="custom-control-input" id="size-4">
                <label class="custom-control-label" for="size-4">L</label>
                <span class="badge border font-weight-normal">145</span>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                <input type="checkbox" class="custom-control-input" id="size-5">
                <label class="custom-control-label" for="size-5">XL</label>
                <span class="badge border font-weight-normal">168</span>
            </div>
        </form>
    </div> --}}
    <!-- Size End -->
</div>
