<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">Navbar</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button> -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Admin</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('category.create')}}">Thêm danh mục</a></li>
                            <li><a class="dropdown-item" href="{{route('category.index')}}">Danh sách danh mục</a></li>
                            <!-- <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bộ sưu tập
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('collection.create')}}">Thêm bộ sưu tập </a></li>
                            <li><a class="dropdown-item" href="{{route('collection.index')}}">Danh sách bộ sưu tập</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sản phẩm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('product.create')}}">Thêm sản phẩm</a></li>
                            <li><a class="dropdown-item" href="{{route('product.index')}}">Danh sách sản phẩm</a></li>
                            <!-- <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Slide
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('slide.create')}}">Thêm slide</a></li>
                            <li><a class="dropdown-item" href="{{route('slide.index')}}">Danh sách slide</a></li>
                            <!-- <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link active" aria-current="page" href="{{route('customer.index')}}">Khách hàng</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active" aria-current="page" href="{{route('contact.index')}}">Liên hệ</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

</div>