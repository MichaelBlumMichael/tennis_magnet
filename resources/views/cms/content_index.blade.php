@extends('cms.cms_master')
@section('cms_content')

<div>
  <h3 class="mb-4">Content Control Panel</h3>
</div>
<div class="row">
  <div class="col-12">
    <p>
      <a class="btn btn-primary" href="{{url('cms/content/create')}}">Add Content</a>
    </p>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Content title</th>
            <th>Page Name</th>
            <th>Last update</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($contents as $item)
          <tr>
            <td>{{ $item->ctitle }}</td> 
          <td>{{ $menu->find($item->menu_id)->page_name }}</td> 
            <td>{{ date('d/m/Y', strtotime($item->updated_at)) }}</td> 
            <td class="text-center">
            <a title="Edit Content" href="{{ url('cms/content/'.$item->id.'/edit') }}">Edit</a> 
            <a class="ml-2 text-danger" title="Delete Content" href="{{ url('cms/content/' . $item->id) }}">Delete</a>             
            </td> 
          </tr>
            @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</div>



@endsection