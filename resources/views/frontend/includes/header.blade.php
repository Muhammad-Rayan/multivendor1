      <header class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Welcome to Wolmart Store </p>
                    </div>
                    <div class="header-right">
                        
                        <!-- End of DropDown Menu -->

                        <!-- End of Dropdown Menu -->
                        <span class="divider d-lg-show"></span>
        
                         @if(auth()->user() && auth()->user()->id)
                            <a href="{{route('user-dashboard')}}" class="d-lg-show">My Account</a>
                        
                        
                            @else
                            
                 <a href="{{route('Userlogin')}}" class=""><i class="w-icon-account"></i>Sign In</a>
                             
                       @endif
             </div>
                </div>
            </div>
            <!-- End of Header Top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left mr-md-4">
                        <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                        </a>
                        <a href="demo1.html" class="logo ml-lg-0">
                            <img src="https://portotheme.com/html/wolmart/assets/images/logo.png" alt="logo" width="144" height="45" />
                        </a>
                        <form method="get" action="#"
                            class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                            <div class="select-box">
                                <select id="category" name="category">
                                    <option value="">All Categories</option>
                                    <option value="4">Fashion</option>
                                    <option value="5">Furniture</option>
                                    <option value="6">Shoes</option>
                                    <option value="7">Sports</option>
                                    <option value="8">Games</option>
                                    <option value="9">Computers</option>
                                    <option value="10">Electronics</option>
                                    <option value="11">Kitchen</option>
                                    <option value="12">Clothing</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" name="search" id="search" placeholder="Search in..."
                                required />
                            <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="header-right ml-4">
                        <div class="header-call d-xs-show d-lg-flex align-items-center">
                            <a href="tel:#" class="w-icon-call"></a>
                            <div class="call-info d-lg-show">
                                <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                                    <a href="mailto:#" class="text-capitalize">Live Chat</a> or :</h4>
                                <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                            </div>
                        </div>
                      
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $products)
                        @php $total += $products['price'] * $products['quantity'] @endphp
                        @endforeach
                        <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                            <div class="cart-overlay"></div>
                            <a class="cart-toggle label-down link">
                                <i class="w-icon-cart">
                                    <span class="cart-count">{{ count((array) session('cart')) }}</span>
                                </i>
                                
                                <span class="cart-label">Cart</span>
                            </a>
                            <div class="dropdown-box">
                                <div class="cart-header">
                                    <span>Shopping Cart</span>
                                    <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                                
                                <div class="products">
                                @if(session('cart'))
                                  @foreach(session('cart') as $id => $products)
                                    <div class="product product-cart">
                                        <div class="product-detail">
                                            <a href="product-default.html" class="product-name">{{ $products['name'] }}</a>
                                            <div class="price-box">
                                                <span class="product-quantity">{{ $products['quantity'] }}</span>
                                                <span class="product-price">${{ $products['price'] }}</span>
                                            </div>
                                        </div>
                                        <figure class="product-media">
                                            <a href="product-default.html">
                                                <img src="{{asset('productgallery') }}/{{ $products['capture_image'] }}" alt="product" width="84"
                                                    height="94" />
                                            </a>
                                        </figure>
                                        <button class="btn btn-link btn-close" aria-label="button">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                   @endforeach
                                @endif
                                </div>
                                
                                <div class="cart-total">
                                    <label>Subtotal:</label>
                                    <span class="price">$ {{ $total }}</span>
                                </div>

                                <div class="cart-action">
                                    <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                                    <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
                                </div>
                            </div>
                            <!-- End of Dropdown Box -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Header Middle -->

            <div class="header-bottom sticky-content fix-top sticky-header fixed" style="margin-top: 0px;">
                <div class="container">
                    <div class="inner-wrap">
                        <div class="header-left">
                            <div class="dropdown category-dropdown has-border" data-visible="true">
                                <a href="#" class="category-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                                    <i class="w-icon-category"></i>
                                    <span>Browse Categories</span>
                                </a>

                                <div class="dropdown-box index">
                                    <ul class="menu vertical-menu category-menu">
                                    @foreach($cate_menu as $catemenus)
                                        <li class="has-submenu">
                                            <a href="/vuepro#/frontend_dashboard?cat={{ $catemenus->id }}">
                                                <i class=""></i>{{ $catemenus->name }}
                                            </a>
                                        </li>
                                        @endforeach   
                                      
                                    </ul>
                                </div>
                            </div>
                            <nav class="main-nav">
                                <ul class="menu active-underline">
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    <li>
                                        <a href="/vuepro#/frontend_dashboard">Shop</a>
                                    </li>
                                    <li>
                                        <a href="demo1.html">About Us</a>
                                    </li>
                                   
                                </ul>
                            </nav>
                        </div>
                        <div class="header-right">
                            <a href="{{route('track')}}" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                           
                        </div>
                    </div>
                </div>
            </div>
        </header>