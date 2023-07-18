@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>اضافة بيانات</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    @if($errors->any())
    <div class="alert alert-danger fw-bold" role="alert">
        <h4>{{$errors->first()}}</h4>
    @endif
    </div>
    <!-- ========== title-wrapper end ========== -->
    <form action="{{route('info.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        
    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <div class="row">
                    @php
                        $counter = 0;
                    @endphp
                    <div class="col-12">
                      <div class="input-style-1">
                        <label for="name">النوع</label>
                        <select name="type_index" class="form-control w-25">
                            @foreach($types as $type)
                                <option value="{{ $counter++ }}">{{ $type }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label for="description">الوصف</label>
                        <input type="text" class="form-control" name="description"
                             id="description" placeholder="">
                      </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <input type="submit" value="تعديل" class="main-btn primary-btn btn-hover w-25 text-center">
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

    </form> 
@endsection
