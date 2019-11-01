@extends('layouts.admin_app')
@section('main-content')
  <div class="content">
        <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Our Special Offers</h4>
              </div>
             
              <div class="card-body">
            
                <div class="table-sm-responsive">
                  <table class="table">
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
                      
                      <th class="">
                        Image
                      </th>
                       
                      <th>
                        Delete
                      </th>
                    </tr></thead>
                    <tbody>
                    
                     @foreach($offers as $offer)
                      <tr>
                        <td>
                          {{$offer->food->name}}
                        </td>
                        <td>
                          <span class="badge badge-info" style="font-size:1rem;">
                            {{$offer->food->menu->name}}
                          </span>
                         
                        </td>
                        <td>
                          # {{number_format($offer->food->price,2)}}
                        </td>
                        <td>
                          {{$offer->discount}}%
                        </td>
                      
                         <td>
                          <img src="{{$front_img_path}}{{$offer->food->image}}" class="img img-fluid" style="height:5rem;" alt="">
                        </td>
                       
                      
                        <form action="{{route('offer.destroy')}}" id="offer-{{$offer->id}}" method="post" style="display:none;">
                        @method("DELETE")
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
                        @csrf
                        </form>
                        <td><a href="javascript:void(0)"
                        onClick="if(confirm('Are you sure you want to delete this ofer?')){document.getElementById('offer-{{$offer->id}}').submit()}" class="btn btn-danger">Delete <span class="fa fa-trash"></span></a></td>
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