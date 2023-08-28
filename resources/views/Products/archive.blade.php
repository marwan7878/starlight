@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">Products Archive</h1>

    <a type="button" class="btn btn-secondary py-2" href="{{ route('Products.index') }}">Products</a>
  </div>
  @if ($products->count() > 0)
  <table class="table">
    <thead id="thead" style="border-bottom: #2f80ed 3px solid">
      <tr style="color: #2f80ed">
        <th scope="col" >#</th>
        <th scope="col" >Image</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Deletion date</th>
        <th scope="col">Properties</th>
      </tr>
    </thead>
    <tbody>
      <tbody id="tbody">
        @php
          $counter =1;
        @endphp
        @foreach($products as $product)
        <tr style="border-bottom: 1px double #5d657b">
            <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
            <td><img src="{{$product->images_url[0]}}" alt="error" style="width: 60px"></td>
            <td>{{$product->title}}</td>
            <td>{{$product->category->name}}</td>
            <td>{{($product->deleted_at)->format('d/m/Y   h:i:s')}}</td>
            <td>
              <a class="btn btn-primary ms-1 py-1" href="{{ route('Products.restore', $product->id) }}">Restore</a>
              <a class="btn btn-danger ms-1 py-1" href="{{ route('Products.hard_delete', $product->id) }}">Hard delete</a>  
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pagination justify-content-center">
          {{$products->links()}}
        </div>
        @else
        <div class="alert alert-danger fw-bold" role="alert">No products are exist!</div>
        @endif
      </div>
      @endsection
          
