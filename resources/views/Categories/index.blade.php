@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">Categories</h1>
    
    <form class="d-f justify-content-center align-items-center" id="search-form" action="{{route('category.search')}}" method="get">
      <input class="mySearch" type="text" name="name" id="search-input">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>search</b></button>
    </form>
  </div>
  @if ($categories->count() > 0)
    <table class="table" id="table">
          <thead style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
              <th scope="col" style="width: 5rem;">#</th>
              <th scope="col">Image</th>
              <th scope="col" style="padding-right: 10px">Name</th>
              <th scope="col">Creation date</th>
              <th scope="col">Updated date</th>
              <th scope="col">Settings</th>
            </tr>
          </thead>
          <tbody id="tbody">
              @php
                  $counter =1;
              @endphp
            @foreach ($categories as $category)
            <tr style="border-bottom: 1px double #5d657b">
              <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
              <td ><img src="{{$category->image_url}}" alt="error" style="width: 80px;"></td>
              <td style="max-width:  11rem;word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word">{{$category->name}}</p></td>
              <td style="max-width:  5rem;word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word">{{($category->created_at)->format('d/m/Y   h:i:s')}}</p></td>
              <td style="max-width:  5rem;word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word">{{($category->updated_at)->format('d/m/Y   h:i:s')}}</p></td>
              <td>
                <a class="btn btn-secondary ms-1 py-1" href="{{ route('category.edit', $category->id) }}">Edit</a> 
                <a class="btn btn-danger ms-1 py-1" href="{{ route('category.delete', $category->id) }}">Delete</a>  
              </td>
            </tr>
                
            @endforeach
          </tbody>
    </table>  
    <div class="pagination justify-content-center">
      {{$categories->links()}}
    </div>
  @else
    <div class="alert alert-danger fw-bold" role="alert">No categories are exist!</div>
  @endif
  
</div>
    
</div>
@endsection


