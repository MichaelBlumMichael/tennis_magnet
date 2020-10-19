@extends('cms.cms_master')
@section('cms_content')
<div class="mb-4">
  <h3>Products Control Panel</h3>
</div>
<div class="row">
  <div class="col-12">
    <p>
      <a class="btn btn-primary" href="{{url('cms/products/create')}}">Add New Product</a>
    </p>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-center">Product Title</th>
            <th class="text-center">Product Price</th>
            <th class="text-center">Product Image</th>
            <th class="text-center">In Stock</th>
            <th class="text-center">Updated At</th>
            <th class="text-center">Created At</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
          <tr>
            <td>{{ $item->ptitle }}</td>  
            <td class="text-center">${{ $item->price }}</td>  
            <td>
            <img class="img-thumbnail" width="50" src="{{ asset('images/demo/' . $item->pimage) }}" alt="">
            </td>
            <td class="text-center"> {{$item->in_stock}}</td>  
            <td>{{ date('d/m/Y', strtotime($item->updated_at)) }}</td> 
            <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td> 
            <td class="text-center">
            <a title="Edit Menu" href="{{ url('cms/products/'.$item->id.'/edit') }}">Edit</a> 
            <a class="ml-2 text-danger" title="Delete Menu" href="{{ url('cms/products/' . $item->id) }}">Delete</a>             
            </td> 
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>



@endsection