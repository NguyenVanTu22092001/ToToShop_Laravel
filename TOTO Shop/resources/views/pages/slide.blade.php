<div class="container-fluid">
    <div class="row border-none px-xl-5" style="margin-left:15%;">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <!-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div> -->
            <div class="carousel-indicators">
                @foreach($slide as $key => $value)
                <button type="button" data-bs-target="#demo" data-bs-slide-to="{{$key}}" class="{{ $key == 0 ? 'active' : '' }}"></button>
                
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach($slide as $key => $value)
                <div class="{{ $key == 0 ? 'carousel-item active' : 'carousel-item' }}">
                    <img src="{{asset('public/uploads/slide/'.$value->image)}}" alt="Los Angeles" class="d-block w-100" style="padding-bottom:20px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="margin-left:-15%;margin-right:-15%">
                        <div class="p-3">
                            <h4 class="text-light text-uppercase font-weight-medium mb-3">{{$value->description}}</h4>
                            <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{$value->title}}</h3>
                            <a href="" class="btn btn-light py-2 px-3">Mua ngay</a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</div>