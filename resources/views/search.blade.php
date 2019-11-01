@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/search.css')}}">

@endsection
@section('main-content')
@include('includes.search')
 <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-md-3 page-sidebar mobile-filter-sidebar" 
                >
                    <aside>
                        <div class="sidebar-modern-inner">
                            <div class="block-title has-arrow sidebar-header">
                                <h5><a href="javascript:void(0)">All Menus</a></h5>
                            </div>
                            <div class="block-content categories-list  list-filter ">
                                <ul class=" list-unstyled">
                                   @foreach($menus as $menu)
                                         <li><a href="{{route('menu',$menu)}}">
                                             <span class="title">{{$menu->name}}</span><span
                                                class="count">&nbsp;{{count($menu->foods)}}</span></a>
                                        </li>
                                   @endforeach
                                </ul>
                            </div>
                            <!--/.categories-list-->
    
                            <div class="block-title has-arrow ">
                                <h5><a href="#">Special Menus</a></h5>
                            </div>
                            <div class="block-content locations-list  list-filter ">
                                <ul class="browse-list list-unstyled long-list">
                                     @foreach($menus as $menu)
                                         <li><a href="{{route('menu',$menu)}}">
                                             <span class="title">{{$menu->name}}</span><span
                                                class="count">&nbsp;{{count($menu->foods)}}</span></a>
                                        </li>
                                   @endforeach
                                </ul>
                               
                            </div>
                            <!--/.locations-list-->
    
                          
                            <div style="clear:both"></div>
                        </div>
    
    
    
                        <!--/.categories-list-->
                    </aside>
                </div>
                <div class="menu-overly-mask"></div>
                <!--/.page-side-bar-->
                <div class="col-md-9 page-content col-thin-left">
    
                    <div class="category-list make-compact">
    
                        <div class="tab-box ">
    
                           
                            <div class="tab-filter">
                                <select title="sort by" class="select-sort-by form-control" data-style="btn-select"
                                    data-width="auto" >
                                    <option>Sort by</option>
                                    <option>Lowest Price</option>
                                    <option>Highest Price</option>
                                </select>
                              
                            </div>
                            <div class="listing-filter">
                                <div class="pull-left col-xs-6">
                                    <div class="breadcrumb-list"><a href="#" class="current"> <span>Search Results for:</span></a>
                                        <!-- cityName will replace with selected location/area from location modal -->
                                        <span class="cityName">{{session('search')}} </span>
                                    </div>
                                </div>
                            
                                <div style="clear:both"></div>
                            </div>
                        </div>

                        <div class="mobile-filter-bar col-xl-12  ">
                            <ul class="list-unstyled list-inline no-margin no-padding">
                                <li class="filter-toggle">
                                    <a class="">
                                        <i class="fa fa-align-justify"></i>
                                        Filters
                                    </a>
                                </li>
        
    
                            </ul>
                        </div>
                       
    

                        <div class="adds-wrapper row no-margin" style="padding:20px 10px;">
                           @foreach($foods as $food)
                             <div class="col-sm-6 col-lg-4">
                                <div class="card special-menu">
                                    <div class="card-image">
                                        <img src="{{$front_img_path}}{{$food->image}}" height="10px" class="img-fluid" alt="">
                                    </div>
                                    <div class="text-center card-body food">
                                        <h5>{{$food->name}}</h5>
                                        <div class="prices">
                                            <span class="old"><del>${{number_format($food->price,2)}}</del></span>
                                            <span class="new">${{number_format($food->price,2)}}</span>
                                        </div>
                                        <div class="col-12">
                                            <button class="text-center btn add-cart" 
                                            onclick="btnAddCart({{$food->id}})" data-id="{{$food->id}}" id="add-cart">
                                                Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endforeach
                           
                           
                        </div>
                      
                    </div>
    
                    <div class="pagination-bar text-center mt-3">
                    {{ $foods->links() }}
                        <!-- <nav aria-label="Page navigation " class="d-inline-b">
                            <ul class="pagination">
    
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>
                    <!--/.pagination-bar -->
    
                </div>
                <!--/.page-content-->
    
            </div>
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