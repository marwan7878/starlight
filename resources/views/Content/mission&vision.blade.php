@extends('layouts.app')

@section('content')

<div class="card-styles">
    <br>           
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h1 class="font-weight-bold" style="color: #0d6efd;">Reasons of {{$missionvision->page_name}} page</h1>
    </div>
    <br>
    <div class="card-style-3 mb-30">
        <div class="button-group d-flex justify-content-center flex-wrap">
    
            @php
              $mission = request()->url() === route('mission.show');
              $vision = request()->url() === route('vision.show');
            @endphp

            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $vision ? 'active' : '' }}" href="{{ route('vision.show') }}">Vision</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $mission ? 'active' : '' }}" href="{{ route('mission.show') }}">Mission</a>
        </div>
        <br>
        <div class="card-content">            
            <div class="row">
                <form action="{{ route('content.update', $missionvision->type) }}" method="POST">
                    @csrf
            
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="description_ar">الوصف</label>
                            <textarea name="description_ar" class="form-control" rows="6">{{$missionvision->description_ar}}</textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1" dir="ltr">
                            <label for="description_en">Description</label>
                            <textarea name="description_en" class="form-control" rows="6">{{$missionvision->description_en}}</textarea>
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