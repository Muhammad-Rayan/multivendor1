@extends('frontend.layout.master')
@section('content')
<style>
    .my-account .tab-content {
  width: 100%; 
 
}
</style>
<main class="main">
   <section class="intro-section">
      <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
         data-swiper-options="{
         'slidesPerView': 1,
         'autoplay': {
         'delay': 8000,
         'disableOnInteraction': false
         }
         }">
         <div class="swiper-wrapper">
            <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
               style="background-image: url(https://portotheme.com/html/wolmart/assets/images/demos/demo1/sliders/slide-1.jpg); background-color: #ebeef2;">
               <div class="container">
                  <figure class="slide-image skrollable slide-animate">
                     <img src="https://portotheme.com/html/wolmart/assets/images/demos/demo1/sliders/shoes.png" alt="Banner"
                        data-bottom-top="transform: translateY(10vh);"
                        data-top-bottom="transform: translateY(-10vh);" width="474" height="397">
                  </figure>
                  <div class="banner-content y-50 text-right">
                     <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate"
                        data-animation-options="{
                        'name': 'fadeInRightShorter',
                        'duration': '1s',
                        'delay': '.2s'
                        }">
                        Custom <span class="p-relative d-inline-block">Men’s</span>
                     </h5>
                     <h3 class="banner-title font-weight-bolder ls-25 lh-1 slide-animate"
                        data-animation-options="{
                        'name': 'fadeInRightShorter',
                        'duration': '1s',
                        'delay': '.4s'
                        }">
                        RUNNING SHOES
                     </h3>
                     <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                        'name': 'fadeInRightShorter',
                        'duration': '1s',
                        'delay': '.6s'
                        }">
                        Sale up to <span class="font-weight-bolder text-secondary">30% OFF</span>
                     </p>
                     <a href="shop-list.html"
                        class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                        data-animation-options="{
                        'name': 'fadeInRightShorter',
                        'duration': '1s',
                        'delay': '.8s'
                        }">SHOP NOW<i class="w-icon-long-arrow-right"></i></a>
                  </div>
                  <!-- End of .banner-content -->
               </div>
               <!-- End of .container -->
            </div>
            <!-- End of .intro-slide1 -->
            <div class="swiper-slide banner banner-fixed intro-slide intro-slide2"
               style="background-image: url(https://portotheme.com/html/wolmart/assets/images/demos/demo1/sliders/slide-2.jpg); background-color: #ebeef2;">
               <div class="container">
                  <figure class="slide-image skrollable slide-animate" data-animation-options="{
                     'name': 'fadeInUpShorter',
                     'duration': '1s'
                     }">
                     <img src="https://portotheme.com/html/wolmart/assets/images/demos/demo1/sliders/men.png" alt="Banner"
                        data-bottom-top="transform: translateX(10vh);"
                        data-top-bottom="transform: translateX(-10vh);" width="480" height="633">
                  </figure>
                  <div class="banner-content d-inline-block y-50">
                     <h5 class="banner-subtitle font-weight-normal text-default ls-50 slide-animate"
                        data-animation-options="{
                        'name': 'fadeInUpShorter',
                        'duration': '1s',
                        'delay': '.2s'
                        }">
                        Mountain-<span class="text-secondary">Climbing</span>
                     </h5>
                     <h3 class="banner-title font-weight-bolder text-dark mb-0 ls-25 slide-animate"
                        data-animation-options="{
                        'name': 'fadeInUpShorter',
                        'duration': '1s',
                        'delay': '.4s'
                        }">
                        Hot & Packback
                     </h3>
                     <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                        'name': 'fadeInUpShorter',
                        'duration': '1s',
                        'delay': '.8s'
                        }">
                        Only until the end of this week.
                     </p>
                     <a href="shop-banner-sidebar.html"
                        class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                        data-animation-options="{
                        'name': 'fadeInUpShorter',
                        'duration': '1s',
                        'delay': '1s'
                        }">
                     SHOP NOW<i class="w-icon-long-arrow-right"></i>
                     </a>
                  </div>
                  <!-- End of .banner-content -->
               </div>
               <!-- End of .container -->
            </div>
            <!-- End of .intro-slide2 -->
            <div class="swiper-slide banner banner-fixed intro-slide intro-slide3"
               style="background-image: url(https://portotheme.com/html/wolmart/assets/images/demos/demo1/sliders/slide-3.jpg); background-color: #f0f1f2;">
               <div class="container">
                  <figure class="slide-image skrollable slide-animate" data-animation-options="{
                     'name': 'fadeInDownShorter',
                     'duration': '1s'
                     }">
                     <img src="https://portotheme.com/html/wolmart/assets/images/demos/demo1/sliders/skate.png" alt="Banner"
                        data-bottom-top="transform: translateY(10vh);"
                        data-top-bottom="transform: translateY(-10vh);" width="310" height="444">
                  </figure>
                  <div class="banner-content text-right y-50">
                     <p class="font-weight-normal text-default text-uppercase mb-0 slide-animate"
                        data-animation-options="{
                        'name': 'fadeInLeftShorter',
                        'duration': '1s',
                        'delay': '.6s'
                        }">
                        Top weekly Seller
                     </p>
                     <h5 class="banner-subtitle font-weight-normal text-default ls-25 slide-animate"
                        data-animation-options="{
                        'name': 'fadeInLeftShorter',
                        'duration': '1s',
                        'delay': '.4s'
                        }">
                        Trending Collection
                     </h5>
                     <h3 class="banner-title p-relative font-weight-bolder ls-50 slide-animate"
                        data-animation-options="{
                        'name': 'fadeInLeftShorter',
                        'duration': '1s',
                        'delay': '.2s'
                        }"><span class="text-white mr-4">Roller</span>-skate
                     </h3>
                     <div class="btn-group slide-animate" data-animation-options="{
                        'name': 'fadeInLeftShorter',
                        'duration': '1s',
                        'delay': '.8s'
                        }">
                        <a href="shop-list.html"
                           class="btn btn-dark btn-outline btn-rounded btn-icon-right">SHOP
                        NOW<i class="w-icon-long-arrow-right"></i></a>
                     </div>
                     <!-- End of .banner-content -->
                  </div>
                  <!-- End of .container -->
               </div>
            </div>
            <!-- End of .intro-slide3 -->
         </div>
         <div class="swiper-pagination"></div>
         <button class="swiper-button-next"></button>
         <button class="swiper-button-prev"></button>
      </div>
      <!-- End of .swiper-container -->
   </section>
   <!-- End of .intro-section -->
   <div class="container">
      <div class="swiper-container appear-animate icon-box-wrapper br-sm mt-6 mb-6" data-swiper-options="{
         'slidesPerView': 1,
         'loop': false,
         'breakpoints': {
         '576': {
         'slidesPerView': 2
         },
         '768': {
         'slidesPerView': 3
         },
         '1200': {
         'slidesPerView': 4
         }
         }
         }">
         <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
            <div class="swiper-slide icon-box icon-box-side icon-box-primary">
               <span class="icon-box-icon icon-shipping">
               <i class="w-icon-truck"></i>
               </span>
               <div class="icon-box-content">
                  <h4 class="icon-box-title font-weight-bold mb-1">Free Shipping & Returns</h4>
                  <p class="text-default">For all orders over $99</p>
               </div>
            </div>
            <div class="swiper-slide icon-box icon-box-side icon-box-primary">
               <span class="icon-box-icon icon-payment">
               <i class="w-icon-bag"></i>
               </span>
               <div class="icon-box-content">
                  <h4 class="icon-box-title font-weight-bold mb-1">Secure Payment</h4>
                  <p class="text-default">We ensure secure payment</p>
               </div>
            </div>
            <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-money">
               <span class="icon-box-icon icon-money">
               <i class="w-icon-money"></i>
               </span>
               <div class="icon-box-content">
                  <h4 class="icon-box-title font-weight-bold mb-1">Money Back Guarantee</h4>
                  <p class="text-default">Any back within 30 days</p>
               </div>
            </div>
            <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-chat">
               <span class="icon-box-icon icon-chat">
               <i class="w-icon-chat"></i>
               </span>
               <div class="icon-box-content">
                  <h4 class="icon-box-title font-weight-bold mb-1">Customer Support</h4>
                  <p class="text-default">Call or email us 24/7</p>
               </div>
            </div>
         </div>
      </div>
      <!-- End of Iocn Box Wrapper -->
      <div class="row category-banner-wrapper appear-animate pt-6 pb-8">
         <div class="col-md-6 mb-4">
            <div class="banner banner-fixed br-xs">
               <figure>
                  <img src="https://portotheme.com/html/wolmart/assets/images/demos/demo1/categories/1-1.jpg" alt="Category Banner"
                     width="610" height="160" style="background-color: #ecedec;" />
               </figure>
               <div class="banner-content y-50 mt-0">
                  <h5 class="banner-subtitle font-weight-normal text-dark">Get up to <span
                     class="text-secondary font-weight-bolder text-uppercase ls-25">20% Off</span>
                  </h5>
                  <h3 class="banner-title text-uppercase">Sports Outfits<br><span
                     class="font-weight-normal                       text-capitalize">Collection</span>
                  </h3>
                  <div class="banner-price-info font-weight-normal">Starting at <span
                     class="text-secondary                       font-weight-bolder">$170.00</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-4">
            <div class="banner banner-fixed br-xs">
               <figure>
                  <img src="https://portotheme.com/html/wolmart/assets/images/demos/demo1/categories/1-2.jpg" alt="Category Banner"
                     width="610" height="160" style="background-color: #636363;" />
               </figure>
               <div class="banner-content y-50 mt-0">
                  <h5 class="banner-subtitle font-weight-normal text-capitalize">New Arrivals</h5>
                  <h3 class="banner-title text-white text-uppercase">Accessories<br><span
                     class="font-weight-normal text-capitalize">Collection</span></h3>
                  <div class="banner-price-info text-white font-weight-normal text-capitalize">Only From
                     <span class="text-secondary font-weight-bolder">$90.00</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
      <div class="container pb-2">
         <h2 class="title justify-content-center pt-1 ls-normal mb-5">Top Categories Of The Month</h2>
         <div class="swiper">
            <div class="swiper-container swiper-theme pg-show" data-swiper-options="{
               'spaceBetween': 20,
               'slidesPerView': 2,
               'breakpoints': {
               '576': {
               'slidesPerView': 3
               },
               '768': {
               'slidesPerView': 5
               },
               '992': {
               'slidesPerView': 6
               }
               }
               }">
               <div class="swiper-wrapper row cols-lg-6 cols-md-5 cols-sm-3 cols-2">
                  @foreach($top_category as $topcatego) 
                  <div class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                     <a href="shop-banner-sidebar.html" class="category-media">
                     <img src="{{asset('product_category') }}/{{ $topcatego->image }}" alt="Category"
                        width="130" height="130">
                     </a>
                     <div class="category-content">
                        <h4 class="category-name">{{ $topcatego->name }}</h4>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- End of .category-section top-category -->
   <div class="container">
      <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate">Popular Departments
      </h2>
      <div class="tab tab-nav-boxed tab-nav-outline appear-animate">
         <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item mr-2 mb-2">
               <a class="nav-link active br-sm font-size-md ls-normal" href="#tab1-1">New arrivals</a>
            </li>
            <li class="nav-item mr-2 mb-2">
               <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-2">Best seller</a>
            </li>
            <li class="nav-item mr-2 mb-2">
               <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-3">most popular</a>
            </li>
            <li class="nav-item mr-0 mb-2">
               <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-4">Featured</a>
            </li>
         </ul>
      </div>
      <!-- End of Tab -->
      <div class="tab-content product-wrapper appear-animate">
         <div class="tab-pane active pt-4" id="tab1-1">
            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
               @foreach($new_seller as $newsell) 
               <div class="product-wrap">
                  <div class="product text-center">
                     <figure class="product-media">
                        <a href="product-default.html">
                        <img src="{{asset('productgallery') }}/{{ $newsell->capture_image }}" alt="Product"
                           style="width: 231px;height: 225px;" />
                        <img src="{{asset('meta_gallery') }}/{{ $newsell->gallery[0]->image }}" alt="Product"
                        style="width: 231px;height: 225px;" />
                        </a>
                        <div class="product-action-vertical">
                           <a href="{{ route('add.to.cart', $newsell->id) }}" class="btn-product-icon btn-cart w-icon-cart"
                              title="Add to cart"></a>
                           <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                              title="Add to wishlist"></a>
                           <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                              title="Quickview"></a>
                           <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                              title="Add to Compare"></a>
                        </div>
                     </figure>
                     <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">{{ $newsell->name }}</a></h4>
                        <div class="ratings-container">
                           <div class="ratings-full">
                              <span class="ratings" style="width: 60%;"></span>
                              <span class="tooltiptext tooltip-top"></span>
                           </div>
                           <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
                        </div>
                        <div class="product-price">
                           <ins class="new-price">{{ $newsell->price }}$</ins>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
         <!-- End of Tab Pane -->
         <div class="tab-pane pt-4" id="tab1-2">
            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
               @foreach($best_seller as $bestsell) 
               <div class="product-wrap">
                  <div class="product text-center">
                     <figure class="product-media">
                        <a href="product-default.html">
                        <img src="{{asset('productgallery') }}/{{ $bestsell->capture_image }}" alt="Product"
                           style="width: 231px;height: 225px;" />
                        <img src="{{asset('meta_gallery') }}/{{ $bestsell->gallery[0]->image }}" alt="Product"
                           style="width: 231px;height: 225px;" />
                        </a>
                        <div class="product-action-vertical">
                           <a href="{{ route('add.to.cart', $bestsell->id) }}" class="btn-product-icon btn-cart w-icon-cart"
                              title="Add to cart"></a>
                           <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                              title="Add to wishlist"></a>
                           <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                              title="Quickview"></a>
                           <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                              title="Add to Compare"></a>
                        </div>
                     </figure>
                     <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">{{ $bestsell->name }}</a></h4>
                        <div class="ratings-container">
                           <div class="ratings-full">
                              <span class="ratings" style="width: 60%;"></span>
                              <span class="tooltiptext tooltip-top"></span>
                           </div>
                           <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
                        </div>
                        <div class="product-price">
                           <ins class="new-price">{{ $bestsell->price }}$</ins>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
         <!-- End of Tab Pane -->
         <div class="tab-pane pt-4" id="tab1-3">
            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
               @foreach($most_popular as $mostpop) 
               <div class="product-wrap">
                  <div class="product text-center">
                     <figure class="product-media">
                        <a href="product-default.html">
                        <img src="{{asset('productgallery') }}/{{ $mostpop->capture_image }}" alt="Product"
                           style="width: 231px;height: 225px;" />
                        <img src="{{asset('meta_gallery') }}/{{ $mostpop->gallery[0]->image }}" alt="Product"
                           style="width: 231px;height: 225px;" />
                        </a>
                        <div class="product-action-vertical">
                           <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                              title="Add to cart"></a>
                           <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                              title="Add to wishlist"></a>
                           <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                              title="Quickview"></a>
                           <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                              title="Add to Compare"></a>
                        </div>
                     </figure>
                     <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">{{ $mostpop->name }}</a>
                        </h4>
                        <div class="ratings-container">
                           <div class="ratings-full">
                              <span class="ratings" style="width: 100%;"></span>
                              <span class="tooltiptext tooltip-top"></span>
                           </div>
                           <a href="product-default.html" class="rating-reviews">(10 reviews)</a>
                        </div>
                        <div class="product-price">
                           <ins class="new-price">{{ $mostpop->price }}$</ins>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach 
            </div>
         </div>
         <!-- End of Tab Pane -->
         <div class="tab-pane pt-4" id="tab1-4">
            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
               @foreach($featured as $feat) 
               <div class="product-wrap">
                  <div class="product text-center">
                     <figure class="product-media">
                        <a href="product-default.html">
                        <img src="{{asset('productgallery') }}/{{ $feat->capture_image }}" alt="Product"
                           style="width: 231px;height: 225px;" />
                        <img src="{{asset('meta_gallery') }}/{{ $feat->gallery[0]->image }}" alt="Product"
                           style="width: 231px;height: 225px;" />
                        </a>
                        <div class="product-action-vertical">
                           <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                              title="Add to cart"></a>
                           <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                              title="Add to wishlist"></a>
                           <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                              title="Quickview"></a>
                           <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                              title="Add to Compare"></a>
                        </div>
                     </figure>
                     <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">{{ $feat->name }}</a></h4>
                        <div class="ratings-container">
                           <div class="ratings-full">
                              <span class="ratings" style="width: 60%;"></span>
                              <span class="tooltiptext tooltip-top"></span>
                           </div>
                           <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
                        </div>
                        <div class="product-price">
                           <ins class="new-price">{{ $feat->price }}$</ins>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach 
            </div>
         </div>
         <!-- End of Tab Pane -->
      </div>
      <!-- End of Tab Content -->
      <div class="row category-cosmetic-lifestyle appear-animate mb-5">
         <div class="col-md-6 mb-4">
            <div class="banner banner-fixed category-banner-1 br-xs">
               <figure>
                  <img src="https://portotheme.com/html/wolmart/assets/images/demos/demo1/categories/3-1.jpg" alt="Category Banner"
                     width="610" height="200" style="background-color: #3B4B48;" />
               </figure>
               <div class="banner-content y-50 pt-1">
                  <h5 class="banner-subtitle font-weight-bold text-uppercase">Natural Process</h5>
                  <h3 class="banner-title font-weight-bolder text-capitalize text-white">Cosmetic
                     Makeup<br>Professional
                  </h3>
                  <a href="shop-banner-sidebar.html"
                     class="btn btn-white btn-link btn-underline btn-icon-right">Shop Now<i
                     class="w-icon-long-arrow-right"></i></a>
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-4">
            <div class="banner banner-fixed category-banner-2 br-xs">
               <figure>
                  <img src="https://portotheme.com/html/wolmart/assets/images/demos/demo1/categories/3-2.jpg" alt="Category Banner"
                     width="610" height="200" style="background-color: #E5E5E5;" />
               </figure>
               <div class="banner-content y-50 pt-1">
                  <h5 class="banner-subtitle font-weight-bold text-uppercase">Trending Now</h5>
                  <h3 class="banner-title font-weight-bolder text-capitalize">Women's
                     Lifestyle<br>Collection
                  </h3>
                  <a href="shop-banner-sidebar.html"
                     class="btn btn-dark btn-link btn-underline btn-icon-right">Shop Now<i
                     class="w-icon-long-arrow-right"></i></a>
               </div>
            </div>
         </div>
      </div>
      <!-- End of Category Cosmetic Lifestyle -->
      <div class="product-wrapper-1 appear-animate mb-5">
         <div class="title-link-wrapper pb-1 mb-4">
            <h2 class="title ls-normal mb-0">Clothing & Apparel</h2>
            <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More
            Products<i class="w-icon-long-arrow-right"></i></a>
         </div>
         <div class="row">
            <div class="col-lg-3 col-sm-4 mb-4">
               <div class="banner h-100 br-sm" style="background-image: url(https://portotheme.com/html/wolmart/assets/images/demos/demo1/banners/2.jpg); 
                  background-color: #ebeced;">
                  <div class="banner-content content-top">
                     <h5 class="banner-subtitle font-weight-normal mb-2">Weekend Sale</h5>
                     <hr class="banner-divider bg-dark mb-2">
                     <h3 class="banner-title font-weight-bolder ls-25 text-uppercase">
                        New Arrivals<br> <span
                           class="font-weight-normal text-capitalize">Collection</span>
                     </h3>
                     <a href="shop-banner-sidebar.html"
                        class="btn btn-dark btn-outline btn-rounded btn-sm">shop Now</a>
                  </div>
               </div>
            </div>
            <!-- End of Banner -->
            <div class="col-lg-9 col-sm-8 col-9">
               <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                  @foreach($categwise1 as $categ1) 
                  <div class="product-wrap product-col-3">
                     <figure class="product-media">
                        <a href="#">
                        <img src="{{asset('productgallery') }}/{{ $categ1->capture_image }}" alt="Product"
                        style="height: 235px;width: 211px;" />
                        </a>
                        <div class="product-action-vertical">
                           <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                              title="Add to cart"></a>
                           <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                              title="Add to wishlist"></a>
                           <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                              title="Quickview"></a>
                           <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                              title="Add to Compare"></a>
                        </div>
                     </figure>
                     <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">{{ $categ1->name }}</a>
                        </h4>
                        <div class="ratings-container">
                           <div class="ratings-full">
                              <span class="ratings" style="width: 60%;"></span>
                              <span class="tooltiptext tooltip-top"></span>
                           </div>
                           <a href="product-default.html" class="rating-reviews">(3
                           reviews)</a>
                        </div>
                        <div class="product-price">
                           <ins class="new-price">$23.99</ins><del
                              class="old-price">{{ $categ1->price }}</del>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <div class="swiper-pagination"></div>
            </div>
         </div>
      </div>
      <!-- End of Product Wrapper 1 -->
      <div class="product-wrapper-1 appear-animate mb-8">
         <div class="title-link-wrapper pb-1 mb-4">
            <h2 class="title ls-normal mb-0">Consumer Electric</h2>
            <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More
            Products<i class="w-icon-long-arrow-right"></i></a>
         </div>
         <div class="row">
            <div class="col-lg-3 col-sm-4 mb-4">
               <div class="banner h-100 br-sm" style="background-image: url(https://portotheme.com/html/wolmart/assets/images/demos/demo1/banners/3.jpg); 
                  background-color: #252525;">
                  <div class="banner-content content-top">
                     <h5 class="banner-subtitle text-white font-weight-normal mb-2">New Collection</h5>
                     <hr class="banner-divider bg-white mb-2">
                     <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">
                        Top Camera <br> <span
                           class="font-weight-normal text-capitalize">Mirrorless</span>
                     </h3>
                     <a href="shop-banner-sidebar.html"
                        class="btn btn-white btn-outline btn-rounded btn-sm">shop now</a>
                  </div>
               </div>
            </div>
            <!-- End of Banner -->
            <div class="col-lg-9 col-sm-8 col-9">
               <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                  @foreach($categwise2 as $categ2) 
                  <div class="product-wrap product-col-3">
                     <figure class="product-media">
                        <a href="#">
                        <img src="{{asset('productgallery') }}/{{ $categ2->capture_image }}" alt="Product"
                        style="height: 235px;width: 211px;" />
                        </a>
                        <div class="product-action-vertical">
                           <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                              title="Add to cart"></a>
                           <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                              title="Add to wishlist"></a>
                           <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                              title="Quickview"></a>
                           <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                              title="Add to Compare"></a>
                        </div>
                     </figure>
                     <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">{{ $categ2->name }}</a>
                        </h4>
                        <div class="ratings-container">
                           <div class="ratings-full">
                              <span class="ratings" style="width: 60%;"></span>
                              <span class="tooltiptext tooltip-top"></span>
                           </div>
                           <a href="product-default.html" class="rating-reviews">(3
                           reviews)</a>
                        </div>
                        <div class="product-price">
                           <ins class="new-price">$23.99</ins><del
                              class="old-price">{{ $categ2->price }}</del>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <div class="swiper-pagination"></div>
            </div>
         </div>
      </div>
      <!-- End of Product Wrapper 1 -->
      <div class="banner banner-fashion appear-animate br-sm mb-9" style="background-image: url(https://portotheme.com/html/wolmart/assets/images/demos/demo1/banners/4.jpg);
         background-color: #383839;">
         <div class="banner-content align-items-center">
            <div class="content-left d-flex align-items-center mb-3">
               <div class="banner-price-info font-weight-bolder text-secondary text-uppercase lh-1 ls-25">
                  25
                  <sup class="font-weight-bold">%</sup><sub class="font-weight-bold ls-25">Off</sub>
               </div>
               <hr class="banner-divider bg-white mt-0 mb-0 mr-8">
            </div>
            <div class="content-right d-flex align-items-center flex-1 flex-wrap">
               <div class="banner-info mb-0 mr-auto pr-4 mb-3">
                  <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">For Today's
                     Fashion
                  </h3>
                  <p class="text-white mb-0">Use code
                     <span
                        class="text-dark bg-white font-weight-bold ls-50 pl-1 pr-1 d-inline-block">Black
                     <strong>12345</strong></span> to get best offer.
                  </p>
               </div>
               <a href="shop-banner-sidebar.html"
                  class="btn btn-white btn-outline btn-rounded btn-icon-right mb-3">Shop Now<i
                  class="w-icon-long-arrow-right"></i></a>
            </div>
         </div>
      </div>
      <!-- End of Banner Fashion -->
      <div class="product-wrapper-1 appear-animate mb-7">
         <div class="title-link-wrapper pb-1 mb-4">
            <h2 class="title ls-normal mb-0">Home Garden & Kitchen</h2>
            <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More
            Products<i class="w-icon-long-arrow-right"></i></a>
         </div>
         <div class="row">
            <div class="col-lg-3 col-sm-4 mb-4">
               <div class="banner h-100 br-sm" style="background-image: url(https://portotheme.com/html/wolmart/assets/images/demos/demo1/banners/5.jpg); 
                  background-color: #EAEFF3;">
                  <div class="banner-content content-top">
                     <h5 class="banner-subtitle font-weight-normal mb-2">Deals And Promotions</h5>
                     <hr class="banner-divider bg-dark mb-2">
                     <h3 class="banner-title font-weight-bolder text-uppercase ls-25">
                        Trending <br> <span class="font-weight-normal text-capitalize">House
                        Utensil</span>
                     </h3>
                     <a href="shop-banner-sidebar.html"
                        class="btn btn-dark btn-outline btn-rounded btn-sm">shop now</a>
                  </div>
               </div>
            </div>
            <!-- End of Banner -->
            <div class="col-lg-9 col-sm-8 col-9">
               <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                  @foreach($categwise3 as $categ3) 
                  <div class="product-wrap product-col-3">
                     <figure class="product-media">
                        <a href="#">
                        <img src="{{asset('productgallery') }}/{{ $categ3->capture_image }}" alt="Product"
                        style="height: 235px;width: 211px;" />
                        </a>
                        <div class="product-action-vertical">
                           <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                              title="Add to cart"></a>
                           <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                              title="Add to wishlist"></a>
                           <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                              title="Quickview"></a>
                           <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                              title="Add to Compare"></a>
                        </div>
                     </figure>
                     <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">{{ $categ3->name }}</a>
                        </h4>
                        <div class="ratings-container">
                           <div class="ratings-full">
                              <span class="ratings" style="width: 60%;"></span>
                              <span class="tooltiptext tooltip-top"></span>
                           </div>
                           <a href="product-default.html" class="rating-reviews">(3
                           reviews)</a>
                        </div>
                        <div class="product-price">
                           <ins class="new-price">$23.99</ins><del
                              class="old-price">{{ $categ3->price }}</del>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <div class="swiper-pagination"></div>
            </div>
         </div>
      </div>
      <!-- End of Product Wrapper 1 -->
      <h2 class="title title-underline mb-4 ls-normal appear-animate">Our Clients</h2>
    
         <div class="swiper-wrapper row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
         @foreach($seller as $selle) 
   <div class="swiper-slide brand-col">
         
               <figure class="brand-wrapper">
                  <img src="{{asset('seller') }}/{{ $selle->image }}" alt="Brand" width="410"
                     height="186" />
               </figure>
            </div>
            @endforeach
           
         </div>
      
      <!-- Post Wrapper -->
      <h2 class="title title-underline mb-4 ls-normal appear-animate">Your Recent Views</h2>
      <div class="swiper-container swiper-theme shadow-swiper appear-animate pb-4 mb-8" data-swiper-options="{
         'spaceBetween': 20,
         'slidesPerView': 2,
         'breakpoints': {
         '576': {
         'slidesPerView': 3
         },
         '768': {
         'slidesPerView': 5
         },
         '992': {
         'slidesPerView': 6
         },
         '1200': {
         'slidesPerView': 8
         }
         }
         }">
         
         <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-2">
         @foreach($brand as $bran) 
            <div class="swiper-slide product-wrap mb-0">
               <div class="product text-center product-absolute">
                  <figure class="product-media" style="height: 100px;width: 150px;">
                     <a href="product-defaproduct-default.html">
                     <img src="{{asset('brand') }}/{{ $bran->image }}" style="height: 100px;width: 150px;" alt="Category image"
                        style="background-color: #fff" />
                     </a>
                  </figure>
                  <h4 class="product-name">
                     <a href="product-default.html">{{ $bran->name }}</a>
                  </h4>
               </div>
            </div>
            @endforeach
        
         </div>
        
         <div class="swiper-pagination"></div>
      </div>
      <!-- End of Reviewed Producs -->
   </div>
   <!--End of Catainer -->
</main>
@endsection