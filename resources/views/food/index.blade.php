@extends('layouts.admin_app')
@section('main-content')
  <div class="content">
        <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Our Delicious Foods</h4>
              </div>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create offer for <b>jollof Rice</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="special-offer-form">
              <div class="modal-body">
              <p class="text text-success" id="offer-message"></p>
                <div class="form-group">
                <input type="hidden" name="food_id" id="modal-food-id">
                    <label for="">Discount (Decimal value)</label>
                    <input type="number" name="discount" class="form-control" id="modal-discount">
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary"
                  id="special-offer-btn">Create Offer</button>
              </div>
            </form>
        </div>
    </div>
</div>
              <div class="card-body">
              
                <div class="">
                  <table class="table table-responsive" style="overflow-y:hidden;">
                    <thead class=" text-primary">
                   
                      <tr><th>
                        Food
                      </th>
                      <th>
                        Menu 
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Discount
                      </th>
                      <th>
                        Tags
                      </th>
                      <th class="">
                        Image
                      </th>
                       <th>
                        Edit
                      </th>
                      <th>
                        Delete
                      </th>
                    </tr></thead>
                    <tbody>
                    
                     @foreach($foods as $food)
                      <tr>
                        <td>
                          {{$food->name}}
                        </td>
                        <td>
                          <span class="badge badge-info" style="font-size:1rem;">
                            {{$food->menu->name}}
                          </span>
                         
                        </td>
                        <td>
                          # {{number_format($food->price,2)}}
                        </td>
                        <td>
                          {{$food->offer==null?0:$food->offer->discount}}%
                        </td>
                        <td>
                         {{$food->tags}}
                        </td>
                         <td>
                          <img src="{{$front_img_path}}{{$food->image}}" class="img img-fluid" style="height:5rem;" alt="">
                        </td>
                        <td>
                        <button type="button" data-id="{{$food->id}}" class="btn btn-info" data-toggle="modal" id="showOfferForm" data-target="#exampleModal">
                            Create Offer
                        </button>
                        </td>
                        <td>
                           <a href="{{route('foods.edit',$food)}}" class="btn btn-warning">Edit <span class="fa fa-pencil"></span></a>
                        </td>
                        <form action="{{route('foods.destroy',$food)}}" id="food-{{$food->id}}" method="post" style="display:none;">
                        @method("DELETE")
                        @csrf
                        </form>
                        <td><a href="javascript:void(0)"
                        onClick="if(confirm('Are you sure you want to delete this food?')){document.getElementById('food-{{$food->id}}').submit()}" class="btn btn-danger">Delete <span class="fa fa-trash"></span></a></td>
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
@section('scripts')
     <script type="text/javascript">
     $.ajaxSetup({
         headers:{
             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
         }
     });
$('#showOfferForm').click(function(){
   $('#offer-messgae').html("")
 $('#modal-food-id').val($(this).data('id'));
 $('#modal-discount').val(0);
})
     $('#special-offer-form').submit(function(e){
       e.preventDefault();
        $('#special-offer-btn').prop("disabled",true);
         $('#offer-message').html("")
       var formData = new FormData();
        formData.append('discount', $('#modal-discount').val());
         formData.append('food_id', $('#modal-food-id').val());
        $.ajax({
                url:"{{route('food.offer')}}",
                data:formData,
                processData:false,
                contentType: false,
                cache: false,
                type:'POST',
                success:function(data){
                   if(data == 1){
                     
                     $('#offer-message').html("You have successfully created an offer");
                   }else{
                      $('#offer-message')
                      .html("An error occured please refresh the page and try again");
                   }
                    $('#special-offer-btn').prop("disabled",false);
                },
                error:function(jqXHR, textStatus, errorThrown){
                     console.log(errorThrown+JSON.stringify(jqXHR));
                    $('#submit-test').prop("disabled",false);
                    $('#loading-image').hide();

                }
            },"json");

     });
     </script>
@endsection