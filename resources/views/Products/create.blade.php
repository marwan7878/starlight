@extends('layouts.app')

@section('content')

<div class="card-styles">
  <br>           
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h1 class="font-weight-bold" style="color: #0d6efd;">Add product</h1>
    </div>
  <br>
  @if($errors->any())
    <div class="alert alert-danger fw-bold" role="alert">
        <h4>{{$errors->first()}}</h4>
    </div>
  @endif
  <div class="card-style-3 mb-30">
      <div class="card-content">            
          <div class="row">
            <form action="{{route('Products.store')}}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="col-12">
                <div class="input-style-1">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title" oninput="countCharacters(this,1)"
                  value="{{ old('title')}}">
                  <div><span id="1"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label>Category</label>
                  <select name="category_id" class="form-control w-25">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>  
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="shortdescription">Short Description</label>
                  <textarea name="shortdescription" id="textarea" oninput="countCharacters(this,22)">{{old('shortdescription')}}</textarea>
                  <div><span id="22"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="description">Description</label>
                  <textarea name="description" id="textarea" rows="4" oninput="countCharacters(this,2)">{{old('description')}}</textarea>
                  <div><span id="2"></span></div>
                </div>
              </div>
              
              
              <div class="input-fields">
                <label for="images[]">Image</label>
                <label class="block">
                  <input type="file" name="images[]"
                      class="block w-full mt-1 rounded-md"
                      placeholder="" multiple/>
                </label>

                <div class="col-12">
                  <div class="input-style-1">
                    <label for="alt_text" dir="ltr">Alt_text</label>
                    <input type="text" class="form-control" value="" name="alt_text[]" oninput="countCharacters(this,3)">
                    <div><span id="3"></span></div>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <button id="add-more-field" class="btn btn-secondary btn-sm">Add more</button>
              </div>
              <br>
              <br>

              <div class="col-12">
                <div class="input-style-1">
                  <label for="focus_word" dir="ltr">Focus_keyword</label>
                  <input type="text" class="form-control" name="focus_keyword" oninput="countCharacters(this,4)"
                  value="{{old('focus_keyword')}}">
                  <div><span id="4"></span></div>
                </div>
              </div>
              
              <br><br>              
              <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="font-weight-bold" style="color: #0d6efd;">Social Media Data</h1>
              </div>
              <br><br>
              <div class="col-12">
                <div class="input-style-1">
                  <label>Social_title</label>
                  <input type="text" class="form-control" name="social_title" oninput="countCharacters(this,5)"
                  value="{{old('social_title')}}">
                  <div><span id="5"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label>Social_description</label>
                  <textarea type="text" class="form-control" rows="3" name="social_description" oninput="countCharacters(this,6)">{{old('social_title')}}</textarea>
                  <div><span id="6"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label>Social_image</label>
                  <input type="file" class="file" name="social_image" oninput="countCharacters(this,7)">
                  <div><span id="7"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label>Social_alt_text</label>
                  <input type="text" class="form-control" name="social_alt_text" oninput="countCharacters(this,8)"
                  value="{{old('social_alt_text')}}">
                  <div><span id="8"></span></div>
                </div>
              </div>
              
              <br><br>              
              <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="font-weight-bold" style="color: #0d6efd;">Meta Data</h1>
              </div>
              <br><br>
              <div class="col-12">
                <div class="input-style-1">
                  <label>Title_tag</label>
                  <input type="text" class="form-control" name="meta_title" oninput="countCharacters(this,9)"
                  value="{{old('title_tag')}}">
                  <div><span id="9"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label>Meta_link</label>
                  <input type="text" class="form-control" name="meta_link" oninput="countCharacters(this,10)"
                  value="{{old('meta_link')}}">
                  <div><span id="10"></span></div>
                </div>
              </div>
              
              <div class="col-12">
                <div class="input-style-1">
                  <label>Meta_decription</label>
                  <textarea type="text" class="form-control" rows="3" name="meta_description" oninput="countCharacters(this,11)">{{old('meta_description')}}</textarea>
                  <div><span id="11"></span></div>
                </div>
              </div>

              <div class="col-12">
                  <div class="button-group d-flex justify-content-center flex-wrap">
                    <input class="main-btn primary-btn btn-hover w-25 text-center" type="submit" value="Add">
                  </div>
              </div>
              </div>
            </form> 
      </div>
  </div>
</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>


      function countCharacters(inputField , id) {
        var charCountElement = document.getElementById(id);
        charCountElement.innerText = inputField.value.length;
      }
        
  $(function(){
    
    var more_fields = `
                    <label class="block">
                      <span class="text-gray-700">Images</span>
                      <input type="file" name="images[]" 
                        class="block w-full mt-1 rounded-md" placeholder="" multiple/>
                    </label>
                    <div class="block">
                      <div class="input-style-1">
                        <label for="alt_text" dir="ltr">Alt_text</label>
                        <input type="text" class="form-control" name="alt_text[]" oninput="countCharacters(this,3)">
                        <div dir="ltr"><span id="3"></span></div>
                      </div>
                    </div>
                `;

    $('#add-more-field').on('click', (function (e) {
        e.preventDefault();
        $(".input-fields").append(more_fields);
    }));

});
    </script>
@endsection

    
  