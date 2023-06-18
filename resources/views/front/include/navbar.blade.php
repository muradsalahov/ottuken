<!-- header-area-start -->
        <header>
            <!-- header-top-start -->
            <div class="header-top">
                <div class="container">
                    <div class="row ptb-12 bb">
                        <div class="col-lg-6 col-md-6  col-6">
                            <div class="header-left-menu">
                                <ul>
                                    <li><a href="#">My account<i class="fa fa-angle-down"></i></a>
                                        <div class="submenu-top">
                                            <ul>
                                                
                                                @if (Route::has('login'))
                                                    @auth
                                                        <li><a href="{{ route('profile.show') }}">Profile</a></li>
                                                        <li><a href="wishlist.html">My wishlist</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a></li>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    @else
                                                        <li><a href="{{ route('login') }}">Log in</a></li>
                                                        @if (Route::has('register'))
                                                        <li><a href="{{ route('register') }}" >Register</a></li>
                                                        @endif
                                                    @endauth
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6  col-6">    
                            <div class="links-nav">
                                <ul>
                                    @if (Route::has('login'))
                                        @auth
                                            <li><a href="{{url('wishlist')}}">Wishlist <i class="fa fa-heart-o"></i></a></li>
                                        @else
                                        @endauth
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-top-end -->
            <!-- header-mid-area-start -->
            <div class="header-mid-area ptb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-12">
                            <div class="logo-area">
                                <a href="{{url('/')}}"><img src="{{asset('assets/img/logo/ottuken_logo.png')}}" alt="logo" /></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8  col-12">
                            <div class="search-area">
                                <form action="#">
                                    <input type="text" placeholder="Search entire store here ..." / style="border-radius: 30px!important;">
                                    <!-- <select id="sorter" class="header-option" data-role="sorter">
                                        <option value="Categories " selected="selected"> All Categories </option>
                                        <option value="headphones">headphones</option>
                                        <option value="Solo"> --Headphones Solo™2 </option>
                                    </select> -->
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-mid-area-end -->
            <!-- header-menu-area-start -->
            <div class="header-menu-area" id="header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-12 d-none d-lg-block">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li class="active"><a href="index.html">Home<i class="fa fa-angle-down"></i></a>
                                            <div class="sub-menu">
                                                <ul>
                                                    <li><a href="index.html">Home-1 <span><i class="fa fa-angle-right"></i></span></a>
                                                        <ul>
                                                            <li><a href="#">level 2</a></li>
                                                            <li><a href="#">level 2</a></li>
                                                            <li><a href="#">level 2</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="index-2.html">Home-2 <span><i class="fa fa-angle-right"></i></span></a>
                                                        <ul>
                                                            <li><a href="#">level 2</a></li>
                                                            <li><a href="#">level 2</a></li>
                                                            <li><a href="#">level 2</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="index-3.html">Home-3</a></li>
                                                    <li><a href="index-4.html">Home-4</a></li>
                                                    <li><a href="index-5.html">Home-5</a></li>
                                                    <li><a href="index-6.html">Home-6</a></li>
                                                    <li><a href="index-7.html">Home-7</a></li>
                                                    <li><a href="index-8.html">Home-8</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a href="shop.html">headphones<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu-area">
                                                <div class="mega-menu">
                                                    <span>
                                                        <a href="#" class="title">Headphones Solo™2</a>
                                                        <a href="shop.html">Headphones with Mic</a>
                                                        <a href="shop.html">Bluetooth/Wireless</a>
                                                        <a href="shop.html">Extra Bass</a>
                                                        <a href="shop.html">Noise Cancelling</a>
                                                    </span>
                                                    <span>
                                                        <a href="#" class="title">Studio wireless</a>
                                                        <a href="shop.html">Wireless Headphones</a>
                                                        <a href="shop.html">On Ear Headphones</a>
                                                        <a href="shop.html">Planar Magnetic</a>
                                                        <a href="shop.html">Bone Conduction</a>
                                                    </span>
                                                    <span>
                                                        <a href="#" class="title">Headphones Pro</a>
                                                        <a href="shop.html">Wire Managers</a>
                                                        <a href="shop.html">Hi-Res Music Players</a>
                                                        <a href="shop.html">Headphone Amplifiers</a>
                                                        <a href="shop.html">Headphone DACs</a>
                                                    </span>
                                                    <span>
                                                        <a href="#" class="title">Accessories</a>
                                                        <a href="shop.html">Earbud Tips</a>
                                                        <a href="shop.html">Headphone Amps</a>
                                                        <a href="shop.html">Headphone Cases</a>
                                                        <a href="shop.html">Headphone Splitters</a>
                                                    </span>
                                                </div>
                                                <div class="menu-static">
                                                    <span>
                                                        <a href="#"><img src="{{asset('assets/img/banner/7.jpg')}}" alt="banner" /></a>
                                                    </span>
                                                    <span>
                                                        <a href="#"><img src="{{asset('assets/img/banner/8.jpg')}}" alt="banner" /></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="#">Mobiles & Tablets<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu-area mega-menu-area-2">
                                                <div class="mega-menu">
                                                    <span>
                                                        <a href="#" class="title">Smartphones</a>
                                                        <a href="shop.html">Apple</a>
                                                        <a href="shop.html">Samsung</a>
                                                        <a href="shop.html">Motorola</a>
                                                        <a href="shop.html">Sony</a>
                                                    </span>
                                                    <span>
                                                        <a href="#" class="title">Tablets & E-Readers</a>
                                                        <a href="shop.html">Ipad</a>
                                                        <a href="shop.html">Tablets</a>
                                                        <a href="shop.html">Kids' Tablets</a>
                                                        <a href="shop.html">iPad & Tablet </a>
                                                    </span>
                                                    <span>
                                                        <a href="#" class="title">Accessories</a>
                                                        <a href="shop.html">Cables</a>
                                                        <a href="shop.html">Screen Protectors</a>
                                                        <a href="shop.html">Holders & Stands</a>
                                                        <a href="shop.html">Storage</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="#">Photo & Camera<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu-area mega-menu-area-3">
                                                <div class="mega-menu">
                                                    <span>
                                                        <a href="#" class="title">Cameras</a>
                                                        <a href="shop.html">Digital SLR</a>
                                                        <a href="shop.html">Instant Film</a>
                                                        <a href="shop.html">Mirrorless</a>
                                                        <a href="shop.html">Waterproof</a>
                                                    </span>
                                                    <span>
                                                        <a href="#" class="title">Camcorders</a>
                                                        <a href="shop.html">GoPro Cameras</a>
                                                        <a href="shop.html">Sports & Action</a>
                                                        <a href="shop.html">Traditional</a>
                                                        <a href="shop.html">Photo Accessories</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="shop.html">Pages<i class="fa fa-angle-down"></i></a>
                                            <div class="sub-menu">
                                                <ul>
                                                    <li><a href="shop.html">Shop</a></li>
                                                    <li><a href="product-details.html">product-details</a></li>
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="blog-details.html">blog-details</a></li>
                                                    <li><a href="login.html">login</a></li>
                                                    <li><a href="register.html">register</a></li>
                                                    <li><a href="contact.html">contact</a></li>
                                                    <li><a href="about.html">about</a></li>
                                                    <li><a href="cart.html">cart</a></li>
                                                    <li><a href="checkout.html">checkout</a></li>
                                                    <li><a href="wishlist.html">wishlist</a></li>
                                                    <li><a href="404.html">404</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a href="blog.html">Blog<i class="fa fa-angle-down"></i></a>
                                            <div class="sub-menu">
                                                <ul>
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="blog-details.html">blog-details</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-12">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-menu-area-end -->
            <!-- mobile-menu-area-start -->
            <div class="mobile-menu-area d-block d-lg-none">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul id="nav">
                                        <li><a href="index.html">Home</a>
                                            <ul>
                                                <li><a href="index.html">Home-1</a>
                                                    <ul>
                                                        <li><a href="#">level 2</a></li>
                                                        <li><a href="#">level 2</a></li>
                                                        <li><a href="#">level 2</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="index-2.html">Home-2</a>
                                                    <ul>
                                                        <li><a href="#">level 2</a></li>
                                                        <li><a href="#">level 2</a></li>
                                                        <li><a href="#">level 2</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="index-3.html">Home-3</a></li>
                                                <li><a href="index-4.html">Home-4</a></li>
                                                <li><a href="index-5.html">Home-5</a></li>
                                                <li><a href="index-6.html">Home-6</a></li>
                                                <li><a href="index-7.html">Home-7</a></li>
                                                <li><a href="index-8.html">Home-8</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">headphones</a>
                                            <ul>
                                                <li><a href="shop.html">Headphones with Mic</a></li>
                                                <li><a href="shop.html">Bluetooth/Wireless</a></li>
                                                <li><a href="shop.html">Extra Bass</a></li>
                                                <li><a href="shop.html">Noise Cancelling</a></li>
                                                <li><a href="shop.html">Wireless Headphones</a></li>
                                                <li><a href="shop.html">On Ear Headphones</a></li>
                                                <li><a href="shop.html">Planar Magnetic</a></li>
                                                <li><a href="shop.html">Bone Conduction</a></li>
                                                <li><a href="shop.html">Wire Managers</a></li>
                                                <li><a href="shop.html">Hi-Res Music Players</a></li>
                                                <li><a href="shop.html">Headphone Amplifiers</a></li>
                                                <li><a href="shop.html">Headphone DACs</a></li>
                                                <li><a href="shop.html">Earbud Tips</a></li>
                                                <li><a href="shop.html">Headphone Amps</a></li>
                                                <li><a href="shop.html">Headphone Cases</a></li>
                                                <li><a href="shop.html">Headphone Splitters</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Mobiles & Tablets</a>
                                            <ul>
                                                <li><a href="shop.html">Apple</a></li>
                                                <li><a href="shop.html">Samsung</a></li>
                                                <li><a href="shop.html">Motorola</a></li>
                                                <li><a href="shop.html">Sony</a></li>
                                                <li><a href="shop.html">Ipad</a></li>
                                                <li><a href="shop.html">Tablets</a></li>
                                                <li><a href="shop.html">Kids' Tablets</a></li>
                                                <li><a href="shop.html">iPad & Tablet</a></li>
                                                <li><a href="shop.html">Cables</a></li>
                                                <li><a href="shop.html">Screen Protectors</a></li>
                                                <li><a href="shop.html">Holders & Stands</a></li>
                                                <li><a href="shop.html">Storage</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Photo & Camera</a>
                                            <ul>
                                                <li><a href="shop.html">Digital SLR</a></li>
                                                <li><a href="shop.html">Instant Film</a></li>
                                                <li><a href="shop.html">Mirrorless</a></li>
                                                <li><a href="shop.html">Waterproof</a></li>
                                                <li><a href="shop.html">GoPro Cameras</a></li>
                                                <li><a href="shop.html">Sports & Action</a></li>
                                                <li><a href="shop.html">Traditional</a></li>
                                                <li><a href="shop.html">Photo Accessories</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Pages</a>
                                            <ul>
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="product-details.html">product-details</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">blog-details</a></li>
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="register.html">Register</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="404.html">404 Page</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">blog</a>
                                            <ul>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">blog-details</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area-end -->
        </header>
        <!-- header-area-end -->