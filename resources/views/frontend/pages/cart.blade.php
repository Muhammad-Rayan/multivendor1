@extends('frontend.layout.master')
@section('content')
<main class="main cart">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg mb-10">
                        <div class="col-lg-8 pr-lg-4 mb-6">
                            <table class="shop-table cart-table">
                                <thead>
                                    <tr>
                                        <th class="product-name"><span>Product</span></th>
                                        <th></th>
                                        <th class="product-price"><span>Shipping</span></th>
                                        <th class="product-price"><span>Price</span></th>
                                        <th class="product-price"><span>Discount</span></th>
                                        <th class="product-quantity"><span>Quantity</span></th>
                                        <th class="product-subtotal"><span>Subtotal</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $total = 0;
                                    $shipping_rate = 0;
                                    $discount = 0;
                                @endphp
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $products)
                                        @php $total += $products['price'] * $products['quantity'];
                                        $discount += $products['discount'] * $products['quantity'];
                                        @endphp
                                        <tr data-id="{{ $id }}">
                                            <td class="product-thumbnail">
                                                <div class="p-relative">
                                                    <a>
                                                        <figure>
                                                            <img src="{{asset('productgallery') }}/{{ $products['capture_image'] }}" alt="product"
                                                                width="300" height="338">
                                                        </figure>
                                                    </a>
                                                    <button class="btn btn-close remove-from-cart"><i
                                                            class="fas fa-times"></i></button>
                                                </div>
                                            </td>
                                            <td class="product-price">
                                                <a>
                                                    {{ $products['name'] }}
                                                </a>
                                            </td>
                                            @if($products['free_shipping'] == 1)
                                                <td class="product-price" style="width: 83px;"><span class="amount">Free Shipping</span></td>
                                            
                                            @elseif($products['shipping_flatrate'] == 1)
                                                @php $shipping_rate += $products['shipping_costrate'] @endphp
                                                <td class="product-price" style="width: 83px;"><span class="amount">${{$products['shipping_costrate']}}</span></td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td class="product-price"><span class="amount">${{ $products['price'] }}</span></td>
                                            <td class="product-price"><span class="amount">${{ $products['discount'] }}</span></td>
                                            <td class="product-quantity">
                                                <div class="input-group">
                                                <input type="number" value="{{ $products['quantity'] }}" class="form-control qty update-cart" />
                                                   
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">${{ ($products['price'] * $products['quantity']) - ($products['discount']) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                            <div class="cart-action mb-6">
                                <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                                <!-- <button class="remove-all" value="Clear Cart">Clear Cart</button>  -->
                                <!-- <button type="submit" class="btn btn-rounded btn-update disabled" name="update_cart" value="Update Cart">Update Cart</button> -->
                            </div>

                            
                        </div>
                        <div class="col-lg-4 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar">
                                <div class="cart-summary mb-4">
                                    <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Subtotal</label>
                                        <span>${{ $total }}</span>
                                    </div>

                                    <hr class="divider">

                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Discount</label>
                                        <span>${{ $discount }}</span>
                                    </div>
                                    
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Shipping</label>
                                        <span>${{ $shipping_rate }}</span>
                                    </div>
                                    

                                    <hr class="divider mb-6">
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Total</label>
                                        <span class="ls-50">${{ $total - $discount - $shipping_rate}}</span>
                                    </div>
                                    <a href="{{ route('checkout') }}"
                                        class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                        Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
@endsection
@section('scripts')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".qty").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-all").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.all') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    
                }
            });
        }
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection