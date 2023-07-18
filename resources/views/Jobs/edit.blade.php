@extends('layouts.app')

@section('content')

<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">            
            <div class="row">
                <form action="{{route('Jobs.update',$job->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="title">العنوان</label>
                            <input type="text" class="form-control" name="title" value="{{$job->title}}" oninput="countCharacters(this,1)">
                            <div dir="ltr"><span id="1"></span></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="address">المكان</label>
                            <input type="text" class="form-control" name="address" value="{{$job->address}}" oninput="countCharacters(this,2)">
                            <div dir="ltr"><span id="2"></span></div>
                        </div>
                    </div>
            
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="description">الوصف</label>
                            <textarea name="description" class="form-control" id="textarea1">{{$job->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-style-1">
                          <label for="alt_text" dir="ltr">alt_text</label>
                          <input type="text" class="form-control" name="alt_text" value="{{$job->alt_text}}" oninput="countCharacters(this,3)">
                          <div dir="ltr"><span id="3"></span></div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label for="focus_word" dir="ltr">Focus_keyword</label>
                          <input type="text" class="form-control" name="focus_keyword" value="{{$job->focus_keyword}}" oninput="countCharacters(this,4)">
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
                          <input type="text" class="form-control" name="social_title" value="{{$job->social_title}}" oninput="countCharacters(this,5)">
                          <div dir="ltr"><span id="5"></span></div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label for="social_description" dir="ltr">Social_decription</label>
                          <textarea type="text" class="form-control" name="social_description" rows="3" oninput="countCharacters(this,6)">{{$job->social_description}}</textarea>
                          <div dir="ltr"><span id="6"></span></div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label for="social_alt_text" dir="ltr">Social_alt_text</label>
                          <input type="text" class="form-control" name="social_alt_text" value="{{$job->social_alt_text}}" oninput="countCharacters(this,7)">
                          <div dir="ltr"><span id="7"></span></div>
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
                          <input type="text" class="form-control" name="meta_title" value="{{$job->meta_title}}" oninput="countCharacters(this,8)">
                          <div dir="ltr"><span id="8"></span></div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label for="meta_link" dir="ltr">Meta_link</label>
                          <input type="text" class="form-control" dir="ltr" name="meta_link" value="{{$job->meta_link}}" oninput="countCharacters(this,9)">
                          <div><span id="9"></span></div>
                        </div>
                      </div>
                      
                      <div class="col-12">
                        <div class="input-style-1">
                          <label for="Meta_decription" dir="ltr">Meta_decription</label>
                          <textarea type="text" class="form-control" rows="3" name="meta_description" oninput="countCharacters(this,10)">{{$job->meta_description}}</textarea>
                          <div dir="ltr"><span id="10"></span></div>
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
  

<script>
    tinymce.init({
        selector: "#textarea1",
        directionality: 'rtl',
        plugins:
        "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss",
        toolbar:
        "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat",
        tinycomments_mode: "embedded",
        tinycomments_author: "Author name",
        mergetags_list: [
            { value: "First.Name", title: "First Name" },
            { value: "Email", title: "Email" },
        ],
    });

    function countCharacters(inputField , id) {
        var charCountElement = document.getElementById(id);
        charCountElement.innerText = inputField.value.length;
    }
    
</script>

@endsection

