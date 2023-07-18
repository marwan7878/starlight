@extends('layouts.app')

@section('content')

<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>الطلب</h2>
            </div>
        </div>
    </div>
</div>
<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">            
            <div class="row">
                <div class="col-12 d-flex align-items-center ">

                    <div class="d-inline-block input-style-1">
                        <label for="first_name">الاسم</label>
                        <input type="text" class="form-control" name="name"
                            style=" margin-left: 70px;" id="name" placeholder="{{$order->name}}"
                            readonly>
                    </div>
                    <div class="d-inline-block input-style-1">
                        <label for="second_name" style=" margin-right: 70px;">رقم الموبايل</label>
                        <input type="text" class="form-control" name="phone"
                            style=" margin-right: 70px;" id="name" placeholder="{{$order->phone}}"
                            readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-style-1">
                        <label for="city">المدينة</label>
                        <input type="text" class="form-control" name="city"
                            id="name" placeholder="{{$order->city}}" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="input-style-1">
                    <label for="commodity">المنتج</label>
                    <input type="text" class="form-control" name="commodity"
                            id="name" placeholder="{{$order->commodity}}" readonly>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="button-group d-flex justify-content-center flex-wrap">
                        <a href="{{ route('contactus.soft_delete', $order->id) }}" class="main-btn danger-btn btn-hover w-25 text-center">
                            حذف
                        </a>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</div>
@endsection
