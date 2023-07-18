@extends('layouts.app')

@section('content')

<div class="card-styles">
    <br>           
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h1 class="font-weight-bold" style="color: #0d6efd;">Characteristics of {{$characteristic->page_name}} page</h1>
    </div>
    <br>
    <div class="card-style-3 mb-30">
        <div class="button-group d-flex justify-content-center flex-wrap">
    
            @php
              $characteristic3 = request()->url() === route('aboutuscharacteristic3.show', 'characteristic3');
              $characteristic2 = request()->url() === route('aboutuscharacteristic2.show', 'characteristic2');
              $characteristic1 = request()->url() === route('aboutuscharacteristic1.show', 'characteristic1');
            @endphp

            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $characteristic3 ? 'active' : '' }}" href="{{ route('aboutuscharacteristic3.show','characteristic3') }}">Characteristic 3</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $characteristic2 ? 'active' : '' }}" href="{{ route('aboutuscharacteristic2.show','characteristic2') }}">Characteristic 2</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $characteristic1 ? 'active' : '' }}" href="{{ route('aboutuscharacteristic1.show','characteristic1') }}">Characteristic 1</a>
        </div>
        <br>
        <div class="card-content">            
            <div class="row">
                <form action="{{ route('content.update', $characteristic->type) }}" method="POST">
                    @csrf
            
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="description_ar">الوصف</label>
                            <textarea name="description_ar" class="form-control" rows="6">{{$characteristic->description_ar}}</textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1" dir="ltr">
                            <label for="description_en">Description</label>
                            <textarea name="description_en" class="form-control" rows="6">{{$characteristic->description_en}}</textarea>
                        </div>
                    </div>

                     
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <input class="main-btn primary-btn btn-hover w-25 text-center" type="submit" value="تعديل">
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
  

@endsection


<style>
    .main-btn.primary-btn.btn-hover.w-25.text-center.m-3 {
        background-color: #5d657b;
    }
    .main-btn.primary-btn.btn-hover.w-25.text-center.m-3.active {
        background-color: #2f80ed;
    }
</style>