@extends('layouts.admin_app')
@section('main-content')
  <div class="content">
        <div class="row">
            <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Create Food</h5>
              </div>
              <div class="card-body">
                <form action="{{route('foods.store')}}" method="post" 
                enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Food Name</label>
                        <input type="text" 
                        class="form-control" placeholder="Enter the food name" name="name"
                        value="{{old('name')}}">
                         <p class="text-danger">{{$errors->first('name')}}</p>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Food Menu</label>
                        <select name="menu_id" id="" required class="form-control">
                         <option value="">Choose Menu..</option>
                        @foreach($menus as $menu)
                          <option value="{{$menu->id}}"
                           {{ old("menu_id") == $menu->id?'selected':''}}>{{$menu->name}}</option>
                        @endforeach
                        </select>
                         <p class="text-danger">{{$errors->first('menu_id')}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Food Tags</label>
                        <input type="text" class="form-control"
                         placeholder="Food Tags" name="tags" value="{{old('tags')}}">
                          <p class="text-danger">{{$errors->first('tags')}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Food Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Food Price"
                        value="{{old('price')}}" >
                         <p class="text-danger">{{$errors->first('price')}}</p>
                      </div>
                    </div>
                 
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Discount (e.g 0.2, 2)</label>
                       
                        <input type="number" class="form-control"
                        name="discount" value="{{old('discount')}}" placeholder="Food Discount">
                         <p class="text-danger">{{$errors->first('discount')}}</p>
                      </div>
                    </div>
                  </div>
                     <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Food Slug</label>
                        <input type="text" class="form-control" name="slug"
                         value="{{old('slug')}}" placeholder="Food Slug (e.g jollof-rice)" >
                          <p class="text-danger">{{$errors->first('slug')}}</p>
                      </div>
                    </div>
                 
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Food Image</label>
                       
                        <input type="file" name="image"  class="form-control">
                        <p class="text-danger">{{$errors->first('image')}}</p>
                      </div>
                    </div>
                  </div>
                   
                  <div class="row">
                    <div class="update ml-auto mr-auto" style="width:400px;">
                      <button type="submit"  class="btn btn-block btn-primary">Create Food</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div> 
    </div>
@endsection