@extends('layouts.app')

@section('content')

<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">            
            <div class="row">
                <form action="{{route('metadata.update',$metadata->id)}}" method="POST">
                    @csrf
                    
                      <br>              
                      <div class="col-12 d-flex justify-content-center align-items-center">
                        <h1 class="font-weight-bold" style="color: #0d6efd;">Meta Data</h1>
                      </div>
                      <br><br>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label for="meta_title" dir="ltr">Title_tag</label>
                          <input type="text" dir="ltr" class="form-control" name="meta_title" value="{{$metadata->title}}" oninput="countCharacters(this,1)">
                          <div><span id="1"></span></div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <label for="meta_link" dir="ltr">Meta_link</label>
                          <input type="text" dir="ltr" class="form-control" dir="ltr" name="meta_link" value="{{$metadata->link}}" oninput="countCharacters(this,2)">
                          <div><span id="2"></span></div>
                        </div>
                      </div>
                      
                      <div class="col-12">
                        <div class="input-style-1">
                          <label for="Meta_decription" dir="ltr">Meta_decription</label>
                          <textarea type="text" dir="ltr" class="form-control" rows="3" name="meta_description" oninput="countCharacters(this,3)">{{$metadata->description}}</textarea>
                          <div><span id="3"></span></div>
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

