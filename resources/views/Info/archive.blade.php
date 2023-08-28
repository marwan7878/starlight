@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">Company info Archive</h1>

    {{-- <form class="d-f justify-content-center align-items-center" id="search-form" action="{{route('info.archive_search')}}" method="get">
      <input class="mySearch" type="text" name="description" id="search-input">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form> --}}

    <a type="button" class="btn btn-secondary py-2" href="{{ route('info.index') }}">Contact Info</a>
  </div>
  @if ($all_info->count() > 0)
  <table class="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" class="pe-5">#</th>
            <th scope="col">Type</th>
            <th scope="col" class="ps-5">Description</th>
            <th scope="col">Deletion date</th>
            <th scope="col">Properties</th>
          </tr>
        </thead>
        <tbody>
            @php
                $counter =1;
            @endphp
          @foreach ($all_info as $info)
           <tr>
            <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
            <td>{{$info->type}}</p></td>
            <td class="ps-5">{{$info->description}}</p></td>
            <td>{{($info->deleted_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td>
              <a class="btn btn-primary ms-1 py-1" href="{{ route('info.restore', $info->id) }}">Restore</a>
              <a class="btn btn-danger ms-1 py-1" href="{{ route('info.hard_delete', $info->id) }}">Hard delete</a>  
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
