@extends('layouts.app')

@section('content')

<div class="card-styles">
  <br>           
    <div class="col-12 d-flex justify-content-center align-items-center">
      <h1 class="font-weight-bold" style="color: #0d6efd;">Edit product</h1>
    </div>
  <br>
  <div class="card-style-3 mb-30">
      <div class="card-content">            
          <div class="row">
            <form action="{{route('Products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="col-12">
                <div class="input-style-1">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" 
                    value="{{$product->title}}" name="title" id="name" oninput="countCharacters(this,1)">
                  <div dir="ltr"><span id="1"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="category_id">Category</label>
                  <select name="category_id" class="form-control w-25">
                    <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                    @foreach($categories as $category)
                        @if ($category != $product->category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                  </select>  
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="shortdescription">Short Description</label>
                  <textarea name="shortdescription" id="textarea" oninput="countCharacters(this,22)">{{$product->shortdescription}}</textarea>
                  <div dir="ltr"><span id="22"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="description">Description</label>
                  <textarea name="description" id="textarea" rows="4" oninput="countCharacters(this,32)">{{$product->description}}</textarea>
                  <div dir="ltr"><span id="32"></span></div>
                </div>
              </div>
             
              @php
                  $i=0;
              @endphp
                <div class="input-fields">
                  <label class="block">
                    @foreach ($product->images_url as $image_url)
                    <img src="{{$image_url}}" alt="error" style="width: 200px">
                    <input type="file" name="images[]" class="block w-full mt-1 rounded-md" value="">
                  </label>

                  <div class="col-12">
                    <div class="input-style-1">
                      <label for="alt_text" dir="ltr">Alt_text</label>
                      <input type="text" class="form-control" name="alt_text[]" value="{{$product->alt_text[$i]}}" oninput="countCharacters(this,3)">
                      <div dir="ltr"><span id="3"></span></div>
                    </div>
                  </div>
                  @php
                      $i++
                  @endphp
                @endforeach
                </div>


              <div class="form-group">
                <button id="add-more-field" class="btn btn-secondary btn-sm">add more</button>
              </div>
              <br>
              <br>
           
             
              <div class="col-12">
                <div class="input-style-1">
                  <label for="focus_word" dir="ltr">Focus_keyword</label>
                  <input type="text" class="form-control" name="focus_keyword" value="{{$product->focus_keyword}}" oninput="countCharacters(this,4)">
                  <div dir="ltr"><span id="4"></span></div>
                </div>
              </div>
              
              <br><br>              
              <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="font-weight-bold" style="color: #0d6efd;">Social Media Data</h1>
              </div>
              <br><br>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_title" dir="ltr">Social_title</label>
                  <input type="text" class="form-control" name="social_title" value="{{$product->social_title}}" oninput="countCharacters(this,15)">
                  <div dir="ltr"><span id="15"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_description" dir="ltr">Social_description</label>
                  <textarea type="text" class="form-control" rows="3" name="social_description" oninput="countCharacters(this,5)">{{$product->social_description}}</textarea>
                  <div dir="ltr"><span id="5"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_image" dir="ltr">Social_image</label>
                  @if ($product->social_image != null)
                    <img src="/images/social/news/{{$event->social_image}}" alt="error" style="width: 200px">  
                  @endif
                  <input type="file" class="file" name="social_image">
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="social_alt_text" dir="ltr">Social_alt_text</label>
                  <input type="text" class="form-control" name="social_alt_text" value="{{$product->social_alt_text}}" oninput="countCharacters(this,6)">
                  <div dir="ltr"><span id="6"></span></div>
                </div>
              </div>
              
              <br><br>              
              <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="font-weight-bold" style="color: #0d6efd;">Meta Data</h1>
              </div>
              <br><br>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="meta_title" dir="ltr">Title_tag</label>
                  <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}" oninput="countCharacters(this,7)">
                  <div dir="ltr"><span id="7"></span></div>
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label for="meta_link" dir="ltr">Meta_link</label>
                  <input type="text" class="form-control" dir="ltr" name="meta_link" value="{{$product->meta_link}}" oninput="countCharacters(this,8)">
                  <div><span id="8"></span></div>
                </div>
              </div>
              
              <div class="col-12">
                <div class="input-style-1">
                  <label for="Meta_decription" dir="ltr">Meta_description</label>
                  <textarea type="text" class="form-control" rows="3" name="meta_description" oninput="countCharacters(this,9)">{{$product->meta_description}}</textarea>
                  <div dir="ltr"><span id="9"></span></div>
                </div>
              </div>

              <div class="col-12">
                  <div class="button-group d-flex justify-content-center flex-wrap">
                    <input class="main-btn primary-btn btn-hover w-25 text-center" type="submit" value="Update">
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
                      <input type="file" name="images[]" class="block w-full mt-1 rounded-md" >
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

    
  