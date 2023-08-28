@extends('layouts.app')

@section('content')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">Orders</h1>
    
    <a type="button" class="btn btn-secondary py-2" href="{{ route('orders.archive') }}">Archive</a>
  </div>
  @if ($all_orders->count() > 0)
    <table class="table" id="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" class="pe-5">#</th>
            <th scope="col">First name</th>
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
          <tr style="border-bottom: 1px double #5d657b">
            <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
            <td>{{$order->firstname}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->product}}</td>
            <td>{{$order->created_at}}</td>
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

