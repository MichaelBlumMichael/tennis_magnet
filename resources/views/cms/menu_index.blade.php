@extends('cms.cms_master')
@section('cms_content')
<div>
  <h3 class="mb-4">Menus Control Panel</h3>
</div>
<div class="row">
  <div class="col-12">
    <p>
      <a class="btn btn-primary" href="{{url('cms/menu/create')}}">Add Menu</a>
    </p>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Url</th>
            <th>Title</th>
            <th>Updated At</th>
            <th>Created At</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($menu as $item)
          <tr>
            <td>{{ $item->page_name }}</td>  
            <td>{{ $item->url }}</td>  
            <td>{{ $item->title }}</td>
            <td>{{ date('d/m/Y', strtotime($item->updated_at)) }}</td> 
            <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td> 
            <td class="text-center">
            <a title="Edit Menu" href="{{ url('cms/menu/'.$item->id.'/edit') }}">Edit</a> 
            <a class="ml-2 text-danger" title="Delete Menu" href="{{ url('cms/menu/' . $item->id) }}">Delete</a>             
            </td> 
          </tr>
            @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</div>



@endsection