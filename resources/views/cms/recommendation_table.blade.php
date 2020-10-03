@extends('cms.cms_master')
@section('cms_content')
<div class="mb-4">
  <h3>Recommended Products</h3>
</div>
<div class="row">
  <div class="col-12">
    <p>
      <a class="btn btn-primary" href="{{url('cms/recom-categroies')}}">Add New Recommendation</a>
    </p>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Product Title</th>
            <th>Product Image</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($recommendations as $recommendation)
          <tr>
            <td>{{ $recommendation->ptitle }}</td>  
            <td>
                <img class="img-thumbnail" width="50" src="{{ asset('images/demo/' . $recommendation->pimage) }}" alt="">
            </td>
            <td class="text-center">
            <a class="ml-2 text-danger" title="Delete Menu" href="{{ url('cms/recom-delete/' . $recommendation->rid) }}">Delete</a>             
            </td> 
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>



@endsection