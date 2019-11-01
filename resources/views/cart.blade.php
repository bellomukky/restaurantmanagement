@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="css/cart.css">
<style>

.cart-quantity::-webkit-inner-spin-button,
.cart-quantity::-webkit-outer-spin-button{
    opacity:1;
}

</style>
@endsection
@section('main-content')
@include('includes.search')
  <div class="main-container">
        <div class="container">
            <div class="row">
             
                <div class="col-md-8 text-left">
                    <div class="card" style="margin-bottom:20px;">
                        <div class="card-body">
                            <div class="price">
                                <h4 style="font-weight:550;">Shopping Cart (<span id="cart-page-count">{{$cart==null?0:count($cart)}}</span>)</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card" >
                        <div class="card-body" id="cart-card">

                            <!-- Shopping Cart table -->
                            <div class="table-responsive">

                                <table class="table table-borderless product-table">

                                    <!-- Table head -->
                                    <thead class="">
                                        <tr >
                                            <th scope="col"></th>
                                            <th scope="col" class="font-weight-bold">
                                                Food
                                            </th>
                                            <th scope="col" ></th>
                                            <th scope="col" class="font-weight-bold">
                                                Price
                                            </th>
                                            <th scope="col" class="font-weight-bold">
                                                QTY
                                            </th>
                                            <th scope="col" class="font-weight-bold">
                                                Amount
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <!-- /.Table head -->

                                    <!-- Table body -->
                                    <tbody id="table-cart-body">

                                        <!-- First row -->
                                    <form action="{{route('cart.checkout')}}" method="post" id="cart-form">
                                    @csrf
                                     @if($cart)
                                       @foreach($cart as $item)
                                        <tr data-row="{{$loop->index+1}}" id="cart-row-{{$loop->index+1}}">
                                            
                                            <th scope="row">
                                            <input type="hidden" name="item_id_{{$loop->index+1}}"
                                            value="{{$item['id']}}">
                                                <img src="{{$item['image']}}" alt=""
                                                 class="img-fluid z-depth-0">
                                            </th>
                                            <td>
                                             
                                                <p class="text-muted">{{$item['name']}}</p>
                                            </td>
                                            
                                            <td></td>
                                            <td>#{{number_format($item['price'],2)}}</td>
                                            <td>
                                            
                                                <input type="number" min="1"
                                                name="item_quantity_{{$loop->index+1}}"
                                                data-row="{{$loop->index+1}}"
                                                data-price="{{$item['price']}}" 
                                                data-prev-qty="{{$item['quantity']}}"
                                                 value="{{$item['quantity']}}" 
                                                 style="box-shadow:none;outline:0;width:80px"
                                                  aria-label="Search" class="form-control cart-quantity"
                                                  >
                                            </td>
                                            <td class="font-weight-bold" >
                                                #<span id="item-total-{{$loop->index+1}}" data-grand-total="{{number_format($item['price']*$item['quantity'],2)}}">
                                                {{number_format($item['price']*$item['quantity'],2)}}</span>
                                            </td>
                                            <td>
                                                <button type="button"
                                                 class="btn btn-sm btn-danger waves-effect
                                                  waves-light remove-item" data-toggle="tooltip"
                                                   data-placement="top" data-id="{{$item['id']}}"
                                                   data-price="{{$item['price']}}" data-quantity="{{$item['quantity']}}"
                                                    data-row="{{$loop->index+1}}"
                                                   >X
                                                </button>
                                            </td>
                                        </tr>
                                       @endforeach
                                     @else
                                     <tr class="text-center"><td colspan="6">There is no item in the cart</td></tr>
                                     @endif
                                      <tr id="cart-message" class="text-center d-none"><td colspan="6">There is no item in the cart</td></tr>
                                    </form>
                                    </tbody>
                                    <!-- /.Table body -->

                                </table>

                            </div>
                            <!-- /.Shopping Cart table -->

                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="price">
                                <h4 style="padding-bottom:10px; font-weight:550; border-bottom: 1px solid #eee;">Order Summary</h4>
                                <div class="order-charge-container" style="border-bottom: 2px solid #eee">
                                    <div>
                                        <dl class="charges-totle">
                                            <dt class="float-left"> Subtotal</dt>
                                            <dd  class="float-right"># 
                                            <span data-sub-total="{{$total}}" id="cart-total">{{number_format($total,2)}}</span></dd>
                                        </dl>
                                    </div>
                                    <div style="clear: both"></div>
                                    <div class="text-right">
                                       <p class="" style="font-size:14px;">Delivery fee not included yet.</p>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                                <div class="total-price">
                                    <dl>
                                        <dt class="float-left">Total</dt>
                                        <dd class="float-right"># 
                                        <span  id="overall-total">{{number_format($total,2)}}</span></dd>
                                    </dl>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <a href="javascript:void(0)"
                            onClick='document.getElementById("cart-form").submit()' class="order-btn-holder"><button id="checkout-button" type="button"
                                    class="btn btn-info btn-gradient btn-block" role="button"><span class="click-mask"></span>
                                    <strong>COMPLETE ORDER</strong>
                                    ({{$cart==null?0:count($cart)}})</button>
                            </a>
                            <br>
                            <br>
                             <a href="{{route('search')}}" class="order-btn-holder"><button id="checkout-button" type="button"
                                    class="btn btn-info btn-gradient btn-block" role="button"><span
                                        class="click-mask"></span>
                                    <strong>CONTINUE SHOPPING</strong>
                                 </button>
                            </a>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
 var url = "{{route('cart.delete')}}";
   $.ajaxSetup({
         headers:{
             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
         }
     });
$(document).ready(function(){
 function numberWithComas(x){
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",");
    }
   

    $('.remove-item').click(function(){
        var food_id = $(this).data('id');
        var row_id = $(this).data('row');
        var item_total = Number($(this).data('price')) * Number($(this).data('quantity'));

         $.ajax({
        type: "POST",
        url: url,
        data: { food_id: food_id },
        success: function (data) {
             var count = $('#cart-count').html();
             var cart_count = Number($('#cart-page-count').html());
            var sub_total = Number($('#cart-total').data('sub-total'));
              
            if(data==1 && count > 0){
               
   
                sub_total = sub_total - item_total;
                $('#cart-total').data('sub-total',sub_total);
                $('#cart-total').html(numberWithComas(sub_total)+".00");
                 $('#overall-total').html(numberWithComas(sub_total)+".00");
                 
                $('table #table-cart-body #cart-row-'+row_id).remove();
                $('#cart-count').html(--count);
                $('#cart-page-count').html(--cart_count);    
            }

            if(count <= 0){
                $("#cart-message").removeClass('d-none');
            }
           
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
    })

    $('.cart-quantity').change(function(){
        //Update the cart item amount
        var prev = $(this).data("prev-qty");
        var current = $(this).val();
        var prev_item_total = Number($("#item-total-"+$(this).data('row')).data("grand-total"));
        prev_item_total = prev_item_total+ (current-prev)*$(this).data('price')
        $(this).data("prev-qty",$(this).val())
        $("#item-total-"+$(this).data('row')).data("grand-total",prev_item_total);
        $("#item-total-"+$(this).data('row')).html(numberWithComas(prev_item_total)+".00")

        //Update the overall cart amount
        var cart_total = $('#cart-total').data('sub-total')
        cart_total = cart_total + (current-prev)*$(this).data('price');
        $('#cart-total').html(numberWithComas(cart_total)+".00")
        $('#overall-total').html(numberWithComas(cart_total)+".00")
        $('#cart-total').data('sub-total',cart_total);
        
    })
})
</script>
@endsection