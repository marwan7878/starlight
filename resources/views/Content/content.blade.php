@extends('layouts.app')

@section('content')

<div class="card-styles">
    <br>           
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h1 class="font-weight-bold" style="color: #0d6efd;">{{$content->type}} of {{$content->page_name}} page</h1>
    </div>
    <br>
    <div class="card-style-3 mb-30">

        <br>
        <div class="card-content">            
            <div class="row">
                <form action="{{ route('content.update', $content->type) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input name="page_name" value="{{$content->page_name}}" hidden>
                    @if ($content->type == 'experience')
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="image">الصورة</label>
                                <img src="/images/content/{{$content->image}}" alt="error" style="width: 200px">
                                <input type="file" class="file" id="file" name="image">
                            </div>
                        </div>
                    @endif

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