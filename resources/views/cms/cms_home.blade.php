@extends('cms.cms_master')
@section('cms_content')
<div class="mb-4">
  <h3>Products In Stock</h3>
</div>
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>How Many In Stock</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
          <tr>
            <td>{{ $product->ptitle }}</td>  
            <td>
                <img class="img-thumbnail" width="50" src="{{ asset('images/demo/' . $product->pimage) }}" alt="">
            </td>
            <td>{{$product->in_stock}}</td>
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection