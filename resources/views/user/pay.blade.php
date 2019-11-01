@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="css/order.css">
@endsection
@section('main-content')
@include('includes.search')
<div class="main-container mt-5 mb-5">
        <div class="container">
            <div class="row">

                <div class="col-md-7 text-left">
                  
                    <div class="card">
                        <div class="card-body">
                            <div class="" style="margin-bottom: 10px;">
                                <h4 style="font-weight:550;">Billing Address</h4>
                            </div>
                            <hr>
                            <form action="javascript:void(0)" id="billing-form">
                            <div class="form-group">
                                <label for="">Full name</label>
                                <input type="text" id="full_name" value="{{$order->full_name}}"
                                 required placeholder="Enter your first name" name="full_name" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Contact Phone</label>
                                <input type="text" id="billing_phone"
                                value="{{$order->phone}}" required placeholder="Enter contact phone number" name="" class="form-control" id="">
                            </div>
                             <div class="form-group">
                                <label for="">Email Address    </label>
                                <input type="email"
                                value="{{$order->email}}" id="billing_email" required placeholder="Enter email address" name="" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" 
                                value="{{$order->address}}" id="billing_address" placeholder="1234 Main Street." required name="" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <label for="">You Locations</label>
                                <select name="location" id="billing_location" class="form-control" id="" required>
                                    <option value="">Choose...</option>
                                    <option value="Agege">Agege</option>
                                    <option value="Ajeromi-Ifelodun">Ajeromi-Ifelodun</option>
                                    <option value="Alimosho">Alimosho</option>
                                    <option value="Amuwo-Odofin">Amuwo-Odofin</option>
                                    <option value="Apapa">Apapa</option>
                                    <option value="Badagry">Badagry</option>
                                    <option value="Epe">Epe</option>
                                    <option value="Eti Osa">Eti Osa</option>
                                    <option value="Ibeju-Lekki">Ibeju-Lekki</option>
                                    <option value="Ifako-Ijaiye">Ifako-Ijaiye</option>
                                    <option value="Ikeja">Ikeja</option>
                                    <option value="Ikorodu">Ikorodu</option>
                                    <option value="Kosofe">Kosofe</option>
                                    <option value="Lagos Island">Lagos Island</option>
                                    <option value="Mushin">Mushin</option>
                                    <option value="Lagos Mainland">Lagos Mainland</option>
                                    <option value="Ojo">Ojo</option>
                                    <option value="Oshodi-Isolo">Oshodi-Isolo</option>
                                    <option value="Shomolu">Shomolu</option>
                                    <option value="Surulere">Surulere</option>
                                </select>
                            </div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-gradient btn-block">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Complete Payment #{{number_format($order->total + 1200,2)}}</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>
                            </form>
                            <form action="{{route('pay')}}" method="post" novalidate="novalidate" 
                            class="needs-validation" id="paystack-form">
                                <input type="hidden" name="order_id" value="{{$order->id}}" >
                                <input type="hidden" name="email" id="email" value="{{Auth::user()->email}}">
                                <input type="hidden" name="metadata" value="{{$order->id}}" > 
                                <input type="hidden" name="amount" id="amount" value="{{($order->total + 1200)*100}}">
                                <input type="hidden" name="reference" value="{{(new Unicodeveloper\Paystack\Paystack())->genTranxRef()}}">
                                <input type="hidden" name="key" value="{{config('services.paystack.secret_key')}}">
                                @csrf
                            </form>
                                           
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body" style="padding:10px;">
                            <div class="price">
                                <h4 style="padding-bottom:10px; font-size:20px; font-weight:550; border-bottom: 1px solid #eee;">Order
                                    Summary</h4>
                                    <div class="order-charge-container" style="border-bottom: 2px solid #eee">
                                    @foreach($order->details as $detail)
                                    <div>
                                        <dl class="charges-totle">
                                            <dt class="float-left">{{$detail->quantity}} X {{$detail->food->name}}</dt>
                                            <dd class="float-right"> #{{number_format(($detail->quantity*$detail->food->price),2)}}</dd>
                                        </dl>
                                    </div>
                                    <div style="clear: both"></div>
                                    @endforeach
                                </div>
                                <div class="order-charge-container" style="border-bottom: 2px solid #eee">
                                    <div>
                                        <dl class="charges-totle">
                                            <dt class="float-left"> Subtotal</dt>
                                            <dd class="float-right"><b>#{{number_format($order->total,2)}}</b></dd>
                                        </dl>
                                    </div>
                                    <div style="clear: both"></div>
                                    <div>
                                        <dl class="charges-totle">
                                            <dt class="float-left"> Delivery Fee</dt>
                                            <dd class="float-right"><b>#1,200.00</b></dd>
                                        </dl>
                                    </div>
                                    <div style="clear: both"></div>
                                </div>
                                <div class="total-price">
                                    <dl>
                                        <dt class="float-left">Total</dt>
                                        <dd class="float-right"><b>#{{number_format($order->total+1200,2)}}</b></dd>
                                    </dl>
                                </div>
                                <div style="clear: both"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>

   $.ajaxSetup({
         headers:{
             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
         }
     });
$('#billing-form').submit(function(e){
    e.preventDefault();
     var formData = new FormData();
     formData.append('full_name',$('#full_name').val())
     formData.append('email',$('#billing_email').val())
     formData.append('location',$('#billing_location').val())
     formData.append('address',$('#billing_address').val())
     formData.append('phone',$('#billing_phone').val())

       $.ajax({
        url:"{{route('update.order',$order->id)}}",
        data:formData,
        processData:false,
        contentType: false,
        cache: false,
        type:'POST',
        success: function (data) {  
            if(data.status==1){
          
                $('#paystack-form').submit();
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
})
</script>
@endsection