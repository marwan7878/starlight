@extends('layouts.app')

@section('content')

<div class="card-styles">
    <br>           
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h1 class="font-weight-bold" style="color: #0d6efd;">{{$content->type}} of {{$content->page_name}} page</h1>
    </div>
    <br>
    <div class="card-style-3 mb-30">
        <div class="button-group d-flex justify-content-center flex-wrap">

            @if ($content->page_name == 'home' && ($content->type == 'value1' || $content->type == 'value2' || $content->type == 'value3'))
            @php
            $value3 = Route::currentRouteName() === 'content.show' && 
                request()->query('page_name') === $content->page_name && 
                request()->query('type') === 'value3';
            $value2 = Route::currentRouteName() === 'content.show' && 
                request()->query('page_name') === $content->page_name && 
                request()->query('type') === 'value2';
            $value1 = Route::currentRouteName() === 'content.show' && 
                request()->query('page_name') === $content->page_name && 
                request()->query('type') === 'value1';
            @endphp
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $value3 ? 'active' : '' }}" href="{{ route('content.show',['page_name' => 'home', 'type' => 'value3']) }}">Value 3</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $value2 ? 'active' : '' }}" href="{{ route('content.show',['page_name' => 'home', 'type' => 'value2']) }}">Value 2</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $value1 ? 'active' : '' }}" href="{{ route('content.show',['page_name' => 'home', 'type' => 'value1']) }}">Value 1</a>
                    
            @elseif($content->page_name == 'aboutus' && ($content->type == 'vision' || $content->type == 'objective'))
            @php
            $objective = Route::currentRouteName() === 'content.show' && 
                request()->query('page_name') === $content->page_name && 
                request()->query('type') === 'objective';
            $vision = Route::currentRouteName() === 'content.show' && 
                request()->query('page_name') === $content->page_name && 
                request()->query('type') === 'vision';
            @endphp
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $objective ? 'active' : '' }}" href="{{ route('content.show',['page_name' => 'aboutus', 'type' => 'objective']) }}">Objective</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $vision ? 'active' : '' }}" href="{{ route('content.show',['page_name' => 'aboutus', 'type' => 'vision']) }}">Vision</a>
            
            @elseif ($content->page_name == 'careers' && ($content->type == 'reason1' || $content->type == 'reason2' || $content->type == 'reason3'))
            @php
            $reason3 = Route::currentRouteName() === 'content.show' && 
                request()->query('page_name') === $content->page_name && 
                request()->query('type') === 'reason3';
            $reason2 = Route::currentRouteName() === 'content.show' && 
                request()->query('page_name') === $content->page_name && 
                request()->query('type') === 'reason2';
            $reason1 = Route::currentRouteName() === 'content.show' && 
                request()->query('page_name') === $content->page_name && 
                request()->query('type') === 'reason1';
            @endphp
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $reason3 ? 'active' : '' }}" href="{{ route('content.show',['page_name' => 'careers', 'type' => 'reason3']) }}">Reason 3</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $reason2 ? 'active' : '' }}" href="{{ route('content.show',['page_name' => 'careers', 'type' => 'reason2']) }}">Reason 2</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $reason1 ? 'active' : '' }}" href="{{ route('content.show',['page_name' => 'careers', 'type' => 'reason1']) }}">Reason 1</a>
            
            @elseif ($content->page_name == 'home' && ($content->type == 'header1' || $content->type == 'header2' || $content->type == 'header3'))
            @php
                $header3 = Route::currentRouteName() === 'content.show' && 
                    request()->query('page_name') === $content->page_name && 
                    request()->query('type') === 'header3';
                $header2 = Route::currentRouteName() === 'content.show' && 
                    request()->query('page_name') === $content->page_name && 
                    request()->query('type') === 'header2';
                $header1 = Route::currentRouteName() === 'content.show' && 
                    request()->query('page_name') === $content->page_name && 
                    request()->query('type') === 'header1';
            @endphp
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $header3 ? 'active' : '' }}" href="{{ route('content.show',['page_name' => 'home', 'type' => 'header3']) }}">Header 3</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $header2 ? 'active' : '' }}" href="{{ route('content.show',['page_name' => 'home', 'type' => 'header2']) }}">Header 2</a>
            <a class="main-btn primary-btn btn-hover w-25 text-center m-3 {{ $header1 ? 'active' : '' }}" href="{{ route('content.show',['page_name' => 'home', 'type' => 'header1']) }}">Header 1</a>
            
            @endif
        </div>
        <br>
        <div class="card-content">            
            <div class="row">
                <form action="{{route('content.update',['page_name' => $content->page_name, 'type' => $content->type])}}" method="POST" enctype="multipart/form-data">
                    @csrf                
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="name">الصورة</label>
                            <img src="{{$content->image_url}}" alt="error" style="width: 200px">
                            <input type="file" class="file" id="file" name="image">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="description_ar">الوصف</label>
                            <textarea name="description_ar" class="form-control" rows="6">{{$content->description_ar}}</textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1" dir="ltr">
                            <label for="description_en">Description</label>
                            <textarea name="description_en" class="form-control" rows="6">{{$content->description_en}}</textarea>
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