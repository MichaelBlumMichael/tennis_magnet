@extends('cms.cms_master')
@section('cms_content')

<div class="mb-4">
  <h1>Tennis Magnet Orders</h1>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>User</th>
            <th>Total</th>
            <th>Order Details</th>
            <th>Order Date</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($orders as $order)
              <tr>
                <td>{{$order->name}}</td>
                <td>${{$order->total}}</td>
                <td>
                  <ul style="list-style-type:none;">
                    @foreach (unserialize($order->data) as $item)
                      <li>
                        <b>{{$item['name']}}</b>,<br> 
                        <b>Price: </b> ${{ $item['price'] }},<br>  
                        <b>Quantity: </b> {{$item['quantity']}}
                      </li>   
                    @endforeach
                  </ul>
                </td>   
                <td>{{date('d/m/Y H:i:s', strtotime($order->created_at))}}</td>   
              </tr>
            @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</div>



@endsection