@extends('layouts.app')

@section('content')

<div class="card-styles">
    <br>           
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h1 class="font-weight-bold" style="color: #0d6efd;">Reasons of {{$reason->page_name}} page</h1>
    </div>
    <br>
    <div class="card-style-3 mb-30">
        <div class="button-group d-flex justify-content-center flex-wrap">
    
            @php
              $reason3 = request()->url() === route('careersreason3.show', 'reason3');
              $reason2 = request()->url() === route('careersreason2.show', 'reason2');
              $reason1 = request()->url() === route('careersreason1.show', 'reason1');
            @endphp

            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $reason3 ? 'active' : '' }}" href="{{ route('careersreason3.show','reason3') }}">Reason 3</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $reason2 ? 'active' : '' }}" href="{{ route('careersreason2.show','reason2') }}">Reason 2</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $reason1 ? 'active' : '' }}" href="{{ route('careersreason1.show','reason1') }}">Reason 1</a>
        </div>
        <br>
        <div class="card-content">            
            <div class="row">
                <form action="{{ route('content.update', $reason->type) }}" method="POST">
                    @csrf
            
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="description_ar">الوصف</label>
                            <textarea name="description_ar" class="form-control" rows="6">{{$reason->description_ar}}</textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1" dir="ltr">
                            <label for="description_en">Description</label>
                            <textarea name="description_en" class="form-control" rows="6">{{$reason->description_en}}</textarea>
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