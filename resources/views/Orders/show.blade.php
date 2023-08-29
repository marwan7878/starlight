@extends('layouts.app')

@section('content')

<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>Order</h2>
            </div>
        </div>
    </div>
</div>
<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">            
            
            
            <div class="d-flex align-items-center">
                <div class="d-inline-block w-50 me-5 input-style-1">
                    <label>First name</label>
                    <textarea type="text" class="form-control" rows="1" readonly>{{$order->firstname}}</textarea>
                </div>
                <div class="d-inline-block w-50 input-style-1">
                    <label>Last name</label>
                    <textarea type="text" class="form-control" rows="1" readonly>{{$order->lastname}}</textarea>
                </div>
            </div>
            
            <div class="d-flex align-items-center">
                <div class="d-inline-block w-50 me-5 input-style-1">
                    <label>Phone</label>
                    <textarea type="text" class="form-control" rows="1" readonly>{{$order->phone}}</textarea>
                </div>
                
                <div class="d-inline-block w-50 input-style-1">
                    <label>Product</label>
                    <textarea type="text" class="form-control" rows="1" readonly>{{$order->product}}</textarea>
                </div>
            </div>
            
            <div class="d-block input-style-1">
                <label>Email</label>    
                <textarea type="text" class="form-control" rows="1" readonly>{{$order->email}}</textarea>
            </div>

            <div class="col-12">
                <div class="input-style-1">
                    <label>Message</label>
                    <textarea type="text" class="form-control" name="message" rows="5" readonly>{{$order->message}}</textarea>
                </div>
            </div>
                    
            <div class="col-12">
                <div class="button-group d-flex justify-content-center flex-wrap">
                    <a href="{{ route('orders.soft_delete', $order->id) }}" class="main-btn danger-btn btn-hover w-25 text-center">
                        Delete
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
