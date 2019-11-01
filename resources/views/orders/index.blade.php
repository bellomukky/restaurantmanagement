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
                   
                      <tr><th>
                       Customer Name
                      </th>
                      <th>
                       Total Amount
                      </th>
                      <th>
                       Date/Time
                      </th>
                      <th>
                        Action
                      </th>
                      
                    </tr></thead>
                    <tbody>
                    @if(count($orders) > 0)
                    @foreach($orders as $order)
                      <tr>
                        <td>
                          {{$order->full_name}}
                        </td>
                       
                        <td>
                          #{{number_format($order->total,2)}}
                        </td>
                         <td>
                         {{$order->created_at}}
                        </td>
                        <td>
                          <a href="{{route('order.detail',$order->id)}}" class="btn btn-success">View Orders</a>
                        </td>
                       
                      </tr>
                    @endforeach
                    @endif
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
@endsection