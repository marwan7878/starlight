@extends('layouts.app')

@section('content')

<div class="card-styles">
    <br>           
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h1 class="font-weight-bold" style="color: #0d6efd;">Header of {{$header->page_name}} page</h1>
    </div>
    <br>
    <div class="card-style-3 mb-30">
        
        <div class="card-content">            
            <div class="row">
                <form action="{{route('pageheader.update',$header->page_name)}}" method="POST" enctype="multipart/form-data">
                    @csrf
            
                    <div class="col-12">
                        <div class="input-style-1">
                          <label for="name">الصورة</label>
                          <img src="/images/content/{{$header->image}}" alt="error" style="width: 200px">
                          <input type="file" class="file" id="file" name="image">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="description_ar">الوصف</label>
                            <textarea name="description_ar" class="form-control" rows="6">{{$header->description_ar}}</textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1" dir="ltr">
                            <label for="description_en">Description</label>
                            <textarea name="description_en" class="form-control" rows="6">{{$header->description_en}}</textarea>
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

