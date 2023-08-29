@extends('layouts.app')

@section('content')

<div class="card-styles">
  <br>           
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h1 class="font-weight-bold" style="color: #0d6efd;">Add Category</h1>
    </div>
  <br>
  @if($errors->any())
    <div class="alert alert-danger fw-bold" role="alert">
        <h4>{{$errors->first()}}</h4>
    </div>
  @endif
<br>
<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">            
                <div class="row">
                    <div class="d-inline-block input-style-1">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name')}}">
                    </div>
                    <div class="d-inline-block input-style-1">
                        <label for="image">Image</label>
                        <input type="file" class="file" name="image">
                    </div>
                        
                    </div>
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <input class="main-btn primary-btn btn-hover w-25 text-center" type="submit" value="Add">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> 
        
</div>                      
    
@endsection