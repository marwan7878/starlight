@extends('layouts.app')

@section('content')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">Orders</h1>

    {{-- <form class="d-f justify-content-center align-items-center" id="search-form" action="{{route('contactus.search')}}" method="get">
      <label>الاسم الاول</label>
      <input class="mySearch w-25" type="text" name="first_name" id="search-input">
      <label>اسم الشركة</label>
      <input class="mySearch w-25" type="text" name="company_name" id="search-input">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form> --}}
    {{-- @csrf
    <input type="text" id="myInput" onkeyup="contactus_search()"> --}}
    {{-- <form>
      @csrf
      <input type="text" id="myInput" onkeyup="contactus_search()">
    </form> --}}
    
    <a type="button" class="btn btn-secondary py-2" href="{{ route('orders.archive') }}">Archive</a>
  </div>
  @if ($all_orders->count() > 0)
    <table class="table" id="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" style="width: 7rem;">#</th>
            <th scope="col">Email</th>
            <th scope="col">Product</th>
            <th scope="col">Send date</th>
            <th scope="col">Properties</th>
          </tr>
        </thead>
        <tbody id="tbody">
          @php
              $counter =1;
          @endphp
          @foreach ($all_orders as $order)
          <tr class="search2 " style="border-bottom: 1px double #5d657b">
            <td scope="row" style="color: #2f80ed">{{$counter++}}</td>
            <td style="max-width: 30px;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$order->email}}</p></td>
            <td style="max-width: 30px;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$order->product}}</p></td>
            <td ><p class=" title" style=" overflow-wrap: break-word;max-width: 85px;">{{$order->created_at}}</p></td>
            <td>
              <a class="btn btn-secondary ms-1 py-1" href="{{ route('orders.show', $order->id) }}">Show</a> 
              <a class="btn btn-danger ms-1 py-1" href="{{ route('orders.soft_delete', $order->id) }}">Delete</a>  
            </td>
            @if ($order->read == 0)
              <td><i class="fa-solid fa-circle" style="color: #0d6efd;"></i></td>  
            @endif
          </tr>
              
          @endforeach
        </tbody>
    </table>  
    <div class="pagination justify-content-center">
      {{$all_orders->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert">There aren't orders</div>
    @endif
    
  </div>
  
</div>
@endsection

