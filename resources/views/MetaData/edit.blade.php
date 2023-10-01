@extends('layouts.app')

@section('content')

<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">
            <div class="row">
                <form action="{{route('metadata.update',$metadata->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                      <br>
                      <div class="col-12 d-flex justify-content-center align-items-center">
                        <h1 class="font-weight-bold" style="color: #0d6efd;">Meta Data</h1>
                      </div>
                      <br><br>

                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="meta_title" dir="ltr">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $metadata->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <div><span id="1"></span></div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="meta_title" dir="ltr">Title</label>
                            <input dir="ltr" type="text" class="form-control" name="title" value="{{$metadata->title}}" oninput="countCharacters(this,1)">
                            <div><span id="1"></span></div>
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="Meta_decription" dir="ltr">Description</label>
                            <textarea type="text" class="form-control summernote"  name="description" dir="ltr" rows="3" oninput="countCharacters(this,3)">{!! $metadata->description !!}</textarea>
                            <div><span id="3"></span></div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="meta_link" dir="ltr">Link</label>
                            <input type="text" class="form-control" name="link" value="{{$metadata->link}}" dir="ltr" oninput="countCharacters(this,2)">
                            <div><span id="2"></span></div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="meta_title" dir="ltr">Title Social</label>
                            <input dir="ltr" type="text" class="form-control" name="title_social" value="{{$metadata->title_social}}" oninput="countCharacters(this,1)">
                            <div><span id="1"></span></div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="Meta_decription" dir="ltr">Description Social</label>
                            <textarea type="text" class="form-control summernote"  name="description_social" dir="ltr" rows="3" oninput="countCharacters(this,3)">{!! $metadata->description_social !!}}</textarea>
                            <div><span id="3"></span></div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="Meta_decription" dir="ltr">Alt</label>
                            <input class="form-control" name="alt" type="text" value="{{$metadata->alt}}">
                            <div><span id="3"></span></div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="Meta_decription" dir="ltr">Image</label>
                            <input class="file" name="image" type="file">
                            <div><span id="3">
                                    <img src="{{$metadata->image_url}}" height="100px" width="100px">
                                </span></div>
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

