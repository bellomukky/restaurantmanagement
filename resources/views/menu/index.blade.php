@extends('layouts.admin_app')
@section('main-content')
  <div class="content">
        <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Our Menus</h4>
              </div>
              <div class="card-body">
                <div class="table-sm-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                      <th>S/No</th>
                      <th>
                        Name
                      </th>
                      <th>
                        Tags
                      </th>
                      <th>
                        Slug
                      </th>
                      <th class="">
                        Image
                      </th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr></thead>
                    <tbody>
                    @foreach($menus as $menu)
                      <tr>
                      <td>{{$loop->index+1}}</td>
                        <td>
                         {{$menu->name}}
                        </td>
                        <td>
                         {{$menu->tags}}
                        </td>
                        <td>
                          {{$menu->slug}}
                        </td>
                        <td >
                          <img src="{{$front_img_path}}{{$menu->image}}" class="img-fluid" style="height:48px;" alt="">
                        </td>
                        <td><a href="{{route('menus.edit',$menu)}}" class="btn btn-info">Edit <span class="fa fa-pencil"></span></a></td>
                         <form action="{{route('menus.destroy',$menu)}}" id="menu-{{$menu->id}}" method="post" style="display:none;">
                        @method("DELETE")
                        @csrf
                        </form>
                        <td><a href="javascript:void(0)"
                        onClick="if(confirm('Are you sure you want to delete this menu withits foods?')){document.getElementById('menu-{{$menu->id}}').submit()}"
                         class="btn btn-danger">Trash <span class="fa fa-trash"></span></a></td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
@endsection