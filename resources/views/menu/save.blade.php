@extends('layouts.admin_app')
@section('main-content')
  <div class="content">
        <div class="row">
            <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Create or Save Menu</h5>
              </div>
              <div class="card-body">
                <form action="{{$menu==null?route('menus.store'):route('menus.update',$menu)}}"
                method="post" enctype="multipart/form-data"
                >
              @if($menu)
                @method('PATCH')
              @endif
              @csrf
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>Menu Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Menu name"
                         value="{{$menu==null?old('name'):$menu->name}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Menu Tags</label>
                        <input type="text" class="form-control" 
                        placeholder="Menu tags" name="tags" value="{{$menu==null?old('tags'):$menu->tags}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Menu Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Menu Slug" 
                        value="{{$menu==null?old('slug'):$menu->slug}}">
                      </div>
                    </div>
                 
                    <div class="col-md-6 pl-1">
                    
                      <div class="form-group">
                       
                        <label>Menu Image</label>
                        <input type="file" name="image" class="form-control">
                      </div>
                      @if($menu)
               <img src="{{$front_img_path}}{{$menu->image}}" class="img img-fluid" style="height:7rem;" alt="">
              @endif
                    </div>
                  </div>
                   
                  <div class="row">
                    <div class="update ml-auto mr-auto" style="width:400px;">
                      <button type="submit"  class="btn btn-block btn-primary">Save Menu</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div> 
    </div>
@endsection