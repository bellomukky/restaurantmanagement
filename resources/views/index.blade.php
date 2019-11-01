@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection
@section('main-content')
 <div class="intro" >
            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">
                        <h1 class="intro-title animated fadeInDown"> Food to fit your lifestyle & health. </h1>

                        <p class="sub animateme fittext3 animated fadeIn">
                            We deliver specilized and delicious taste to your place.
                        </p>

                        <form action="{{route('search')}}" method="get">

                            <div class="row search-row animated fadeInUp">
                                <div class="col-xl-8 col-sm-8 search-col relative locationicon">
                                    <i class="icon-location-2 icon-append"></i>
                                    <input type="text" id="autocomplete-ajax"
                                        class="form-control locinput input-rel 
                                        searchtag-input has-icon" name="query"
                                        placeholder="Search foods, snacks, drinks or cuisnies..." value="" autocomplete="off">

                                </div>
                                <div class="col-xl-4 col-sm-4 search-col">
                                    <button type="submit" class="btn btn-block btn-search  btn-gradient"><i
                                            class="icon-search"></i><strong>Search</strong></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="page-header">
                <h4>Top Featured Menu</h4>
            </div>

            <div class="row">
            @foreach($menus as $menu)
                <a href="{{route('menu',$menu)}}" class="col-sm-12 col-md-6 col-lg-4 menu">
                    <div class="hover-content">
                        <img src="{{$front_img_path}}{{$menu->image}}" alt="Indian" class="img-fluid animation">
                        <div class="overlay animation text-center">
                            <h4 class="text-uppercase">{{$menu->name}}</h4>
                        </div>
                    </div>
                </a>
             @endforeach
            </div>
            <div class="page-header">
                <h4>Special Offers</h4>
            </div>
            <div class="row">
                @foreach($foods as $food)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card special-menu">
                        <div class="card-image">
                            <img src="{{$front_img_path}}{{$food->image}}" height="10px"  class="img-fluid" alt="">
                        </div>
                        <div class="text-center card-body food">
                            <h5>{{$food->name}}</h5>
                            <div class="prices">
                                <span class="old"><del>${{number_format($food->price,2)}}</del></span>
                                <span class="new">${{number_format($food->price,2)}}</span>
                            </div>
                            <div class="col-12">
                                <button class="text-center btn add-cart"
                                onclick="btnAddCart({{$food->id}})" data-id="{{$food->id}}" id="add-cart"
                                >Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
@endsection

@section('scripts')


<script>
 var url = "{{route('cart.add')}}";
   $.ajaxSetup({
         headers:{
             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
         }
     });
 </script>
 <script src="{{asset('js/cart.js')}}"></script>

@endsection