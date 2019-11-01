@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="css/cart.css">
<style>

.cart-quantity::-webkit-inner-spin-button,
.cart-quantity::-webkit-outer-spin-button{
    opacity:1;
}
.table th{
    border-top:none;
}

</style>
@endsection
@section('main-content')
@include('includes.search')
  <div class="main-container">
        <div class="container">
            <div class="row">
             
                <div class="col-md-12 text-left">
                    <div class="card" style="margin-bottom:0px;margin-top:20px;">
                        <div class="card-body" style="padding:10px 20px">
                            <div class="price">
                                <h4 style="font-weight:550;">My Orders</h4>
                            </div>
                        </div>
                    </div>
                   
                    <div class="card mb-5" style="border:none;">
                        <div class="card-body" id="cart-card" >

                       <div class="text-center">
                       <p class="text-success">{{@session('message')}}</p>
                        <p class="text-danger" >{{@session('error')}}</p>
                        </div>
                            <!-- Shopping Cart table -->
                            <div class="table-md-responsive">

                                <table class="table table-borderless product-table">

                                    <!-- Table head -->
                                    <thead class="">
                                        <tr >
                                            
                                            <th scope="col" class="font-weight-bold">
                                                OrderID
                                            </th>
                                            
                                            <th scope="col" class="font-weight-bold">
                                               Location 
                                            </th>
                                            <th scope="col" class="font-weight-bold">
                                                Total Price
                                            </th>
                                         
                                            <th scope="col" class="font-weight-bold">
                                                Order Date
                                            </th>
                                            <th scope="col" class="font-weight-bold">
                                               Action
                                            </th> 
                                        </tr>
                                    </thead>
                                    <!-- /.Table head -->

                                    <!-- Table body -->
                                    <tbody id="table-cart-body">

              

                                       @foreach($orders as $order)
                                        <tr data-row="" id="">
                                          
                                              <td >
                                            #{{$order->id}} 
                                            @if($order->status==1 || $order->status==2)
                                            <span class="badge badge-success">Paid</span>
                                            @else
                                            <span class="badge badge-danger">Not Paid</span>
                                            @endif
                                            </td>
                                        
                                            <td>
                                                <p class="text-muted">{{$order->location}}</p>
                                            </td>
                                              
                                            
                                            
                                            <td>#{{number_format($order->total,2)}}</td>
                                            <td>
                                            
                                               {{$order->created_at}}
                                            </td>
                                            <td>
                                            @if($order->status == 0)
                                            <a href="{{route('update.order',$order->id)}}" class="btn btn-sm btn-success">Pay <span class='fa fa-money'></span></a>
                                            <form action="{{route('delete.order',$order->id)}}" id="delete-form-{{$order->id}}" style="display:none;" method="post">
                                            @csrf
                                            </form>
                                            <a href="javascript:void(0)" onClick="document.getElementById('delete-form-{{$order->id}}').submit()" class="btn btn-sm btn-danger">Cancel <span class='fa fa-trash-o'></span></a>
                                            @endif
                                            </td>
                                           
                                           
                                        </tr>
                                       @endforeach
                               
                                      <tr id="cart-message" class="text-center d-none"><td colspan="6">There is no item in the cart</td></tr>
                           
                                    </tbody>
                                    <!-- /.Table body -->

                                </table>

                            </div>
                            <!-- /.Shopping Cart table -->

                        </div>

                    </div>

                </div>
               
            </div>
        </div>
    </div>
@endsection