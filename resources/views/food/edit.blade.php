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
                <form action="{{route('foods.update',$food)}}" method="post" enctype="multipart/form-data">
            @method("PATCH")
            @csrf
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Food Name</label>
                        <input type="text" class="form-control"
                         placeholder="Enter the food the name" required
                         name="name" value="{{old('name')!=null?old('name'):$food->name}}">
                         <p class="text-danger">{{$errors->first('name')}}</p>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Food Menu</label>
                        <select name="menu_id" id="" class="form-control" required>
                          <option value="">Choose Menu..</option>
                          @foreach($menus as $menu)
                          <option value="{{$menu->id}}"
                          {{$food->menu_id == $menu->id?'selected':''}}
                          {{old('menu_id')==$menu->id?'selected':''}}
                          >{{$menu->name}}</option>
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
                         placeholder="Enter food tags"  name="tags"
                          value="{{old('tags')!=null?old('tags'):$food->tags}}">
                            <p class="text-danger">{{$errors->first('tags')}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Food Price</label>
                        <input type="number" class="form-control" placeholder="Food Price" 
                         name="price" value="{{old('price')!=null?old('price'):$food->price}}">
                           <p class="text-danger">{{$errors->first('price')}}</p>
                      </div>
                    </div>
                 
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Discount (e.g 0.2)</label>
                       
                        <input type="number" class="form-control" placeholder="Food Discount"
                         name="discount" value="{{old('discount')!=null?old('discount'):$food->discount}}"
                         >
                           <p class="text-danger">{{$errors->first('discount')}}</p>
                      </div>
                    </div>
                  </div>
                     <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Food Slug</label>
                        <input type="text" class="form-control" placeholder="Food Slug (e.g jollof-rice)"
                         name="slug" value="{{old('slug')!=null?old('slug'):$food->slug}}" >
                           <p class="text-danger">{{$errors->first('slug')}}</p>
                      </div>
                    </div>
                 
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Food Image</label>
                       
                        <input type="file" class="form-control" name="image">
                          <p class="text-danger">{{$errors->first('image')}}</p>
                      </div>
                      <img src="{{$front_img_path}}{{$food->image}}"  class="img img-fluid" style="height:7rem;" alt="">
                    </div>
                  </div>
                   
                  <div class="row">
                    <div class="update ml-auto mr-auto" style="width:400px;">
                      <button type="submit"  class="btn btn-block btn-primary">Update Food</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div> 
    </div>
@endsection