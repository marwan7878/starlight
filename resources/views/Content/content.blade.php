@extends('layouts.app')

@section('content')

<div class="card-styles">
    <br>           
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h1 class="font-weight-bold" style="color: #0d6efd;">{{$content->type}} of {{$content->page_name}} page</h1>
    </div>
    <br>
    @if($errors->any())
        <div class="alert alert-danger fw-bold" role="alert">
            <h4>{{$errors->first()}}</h4>
        </div>
    @endif
    <br>
    <div class="card-style-3 mb-30">
        <br>
        <div class="card-content">            
            <div class="row">
                <form action="{{route('content.update',['page_name' => $content->page_name, 'type' => $content->type])}}" method="POST" enctype="multipart/form-data">
                    @csrf                
                    <div class="col-12">
                        <div class="input-style-1">
                            <label>Image</label>
                            <img src="{{$content->image_link}}" alt="error" style="width: 200px">
                            <br><br>
                            <input type="file" class="file" name="image">
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="input-style-1">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="6">{{$content->description}}</textarea>
                        </div>
                    </div>

                     
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <input class="main-btn primary-btn btn-hover w-25 text-center" type="submit" value="Update">
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
  

@endsection
