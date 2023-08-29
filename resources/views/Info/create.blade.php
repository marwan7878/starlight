@extends('layouts.app')

@section('content')

<div class="card-styles">
  <br>           
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h1 class="font-weight-bold" style="color: #0d6efd;">Add Info</h1>
    </div>
  <br>
  @if($errors->any())
    <div class="alert alert-danger fw-bold" role="alert">
        <h4>{{$errors->first()}}</h4>
    </div>
  @endif

<form action="{{route('info.store')}}" method="POST">
    @csrf
    @php
        $counter = 0;
    @endphp
    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">            
                <div class="row">
                    <div class="d-inline-block input-style-1">
                        <label for="name">Type</label>
                        <select name="type_index" class="form-control w-25">
                            @foreach($types as $type)
                                <option value="{{ $counter++ }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-inline-block input-style-1">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description"
                            id="description" value="{{old('description')}}">
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