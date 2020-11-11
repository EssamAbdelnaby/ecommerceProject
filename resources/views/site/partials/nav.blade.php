<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link pl-0 text-white" href="{{route('site.home')}}"> <strong>All categories</strong></a>
                </li>
                @foreach(\App\Models\Category::all() as $category)
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('category.show',$category->slug)}}">{{$category->name}}</a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>



    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        <li class="nav-item">
            <a href="{{ route('cart.show')}}" class="nav-link">
                            <span class="fas fa-shopping-cart">
                                My Cart ( {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }})
                            </span>
            </a>
        </li>
    </ul>
{{--    <li class="nav-item dropdown">--}}
{{--        <a id="navbarDropdown" class="nav-link dropdown-toggle"--}}
{{--           href="#" role="button" data-toggle="dropdown"--}}
{{--           aria-haspopup="true" aria-expanded="false"--}}
{{--        >--}}
{{--                        <span class="badge badge-pill badge-dark">--}}
{{--                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}--}}
{{--                        </span>--}}
{{--        </a>--}}
{{--    </li>--}}
</nav>
