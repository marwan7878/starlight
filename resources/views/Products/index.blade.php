@extends('layouts.app')

@section('content')
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block " style="width: 100px">Products</h1>
    
    {{-- <form class="display: flex;justify-content: center;align-items: center;" id="search-form" action="{{route('Products.title_search')}}" method="get">
      <input class="mySearch" style="width:10rem;" type="text" name="title" id="search-input" placeholder="ادخل عنوان...">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form> --}}
    <input type="text" class="mySearch" style="width:10rem;" onkeyup="liveSearch(this)" >
    
    <form class="display: flex;justify-content: center;align-items: center;" id="search-form" action="{{route('Products.search')}}" method="get">
      <input class="mySearch" style="width:15rem;" type="text" name="description" id="search-input" placeholder="ادخل كلمات بالوصف...">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>
    
    

    {{-- <form action="{{ route('Products.searchByDate') }}" method="POST">
      @csrf
      <i class="fa-solid fa-calendar-days"></i>
      <input type="date" name="date">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form> --}}

    

    <a type="button" class="btn btn-secondary py-2" href="{{ route('Products.archive') }}">Archive</a>
  </div>
  @if ($products->count() > 0)
    <table class="table" id="table">
          <thead style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
            @if ($search_flag == true && $search_flag2 == true)
              <th scope="col" style="width: 5rem;">#</th>
              <th scope="col" style="width: 8rem;">Image</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Publish date</th>
              <th scope="col">Modification date</th>
              <th scope="col">Properties</th>
            @else
              <th scope="col" style="width: 5rem;">#</th>
              <th scope="col" style="width: 8rem;">الصورة</th>
              <th scope="col">العنوان</th>
              <th scope="col">الوصف</th>
              <th scope="col">القسم</th>
              <th scope="col">تاريخ الانشاء</th>
              <th scope="col">الخيارات</th>
            @endif
            </tr>
          </thead>
            <tbody id="tbody">

              @php
$counter =1;
@endphp
@foreach($products as $product)
<tr style="border-bottom: 1px double #5d657b">
    <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
    <td><img src="/images/main/products/{{$product->images[0]}}" alt="error" style="width: 60px"></td>

    
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">{{$product->title}}</p></td>
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 90px;"><p style=" overflow-wrap: break-word">{{$product->category->name_ar}}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">{{($product->created_at)->format('d/m/Y   h:i:s')}}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p 
            style="overflow-wrap: break-word">{{($product->updated_at)->format('d/m/Y   h:i:s')}}</p>
        </td>
    
    <td>
        <a class="btn btn-secondary ms-1 py-1" href="{{ route('Products.edit', $product->id) }}">Edit</a> 
        <a class="btn btn-danger ms-1 py-1" href="{{ route('Products.soft_delete', $product->id) }}">Delete</a>  
    </td>
</tr>
@endforeach
              {{-- @include('Products.rows') --}}
            </tbody>
    </table>  
    <div class="pagination justify-content-center">
      {{$products->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد منتجات</div>
    @endif
    
  </div>

</div>
@endsection

{{-- <link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/daygrid.min.js') }}"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  // document.addEventListener('DOMContentLoaded', function() {
  //   var calendarEl = document.getElementById('calendar');

  //   var calendar = new FullCalendar.Calendar(calendarEl, {
  //     plugins: [ 'dayGrid' ],
  //     events: [
  //       // Add your calendar events here
  //     ]
  //   });

  //   calendar.render();
  // });



    function liveSearch(input){
        
        var input = input.value;

        $.ajax({
            url: "{{ route('Products.search') }}",
            method: "GET",
            data: {
                column: input,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
              let products = response.products; 
              console.log(products[0]);

              var content;
              for(var i = 0 ; i < products.length ; i++)
              {
                var row = `<tr style="border-bottom: 1px double #5d657b">
    <th scope="row" style="color: #2f80ed">${i+1}</th>
    <td><img src="/images/main/products/${products[i].images[0]}" alt="error" style="width: 60px"></td>

    
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">${products[i].title}</p></td>
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 90px;"><p style=" overflow-wrap: break-word">${products[i].category}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">${products[i].created_at}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p 
            style="overflow-wrap: break-word">${products[i].updated_at}</p>
        </td>
    <td>
        <a class="btn btn-secondary ms-1 py-1" href="">Edit</a> 
        <a class="btn btn-danger ms-1 py-1" href="">Delete</a>  
    </td>
</tr>
                `
              }
              content += row;
                $('#tbody').html(content);
                
            },
            error: function(xhr) {
                $('#result').html('An error occurred.');
                console.log(xhr);
            }
          });
    }

</script>