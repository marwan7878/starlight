@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">Company info</h1>

    <a type="button" class="btn btn-secondary py-2" href="{{ route('info.archive') }}">Archive</a>
  </div>
  @if ($all_info->count() > 0)
    <table class="table" id="table">
          <thead style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
              <th scope="col" class="pe-5">#</th>
              <th scope="col">Type</th>
              <th scope="col" class="ps-5">Description</th>
              <th scope="col">Publish date</th>
              <th scope="col">Modification date</th>
              <th scope="col">Properties</th>
            </tr>
          </thead>
          <tbody id="tbody">
              @php
                  $counter =1;
              @endphp
            @foreach ($all_info as $info)
            <tr style="border-bottom: 1px double #5d657b">
              <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
              <td>{{$info->type}}</td>
              <td class="ps-5">{{$info->description}}</td>
              <td>{{($info->created_at)->format('d/m/Y   h:i:s')}}</td>
              <td>{{($info->updated_at)->format('d/m/Y   h:i:s')}}</td>

              <td>
                <a class="btn btn-secondary ms-1 py-1" href="{{ route('info.edit', $info->id) }}">Edit</a> 
                <a class="btn btn-danger ms-1 py-1" href="{{ route('info.soft_delete', $info->id) }}">Delete</a>  
              </td>
            </tr>
            
                
            @endforeach
          </tbody>
    </table>  
    
    <div class="pagination justify-content-center">
      {{$all_info->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert">There aren't info</div>
    @endif
    
  </div>
  
</div>
@endsection

