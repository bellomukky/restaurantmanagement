@extends('layouts.admin_app')
@section('main-content')
  <div class="content">
        <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Our Delicious Foods</h4>
              </div>
              <div class="card-body">
                <div class="table-sm-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                   
                      <tr>
                      <th>
                       Food Name
                      </th>
                      <th>Quantity</th>
                      <th>
                       Total Amount
                      </th>
                      
                    </tr></thead>
                    <tbody>
                    @foreach($order->details as $detail)
                      <tr>
                        <td>
                          {{$detail->food->name}}
                        </td>
                        <td>
                         {{$detail->quantity}}
                        </td>
                        <td>
                          #{{number_format($detail->quantity*$detail->food->price,2)}}
                        </td>
                        
                       
                       
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