@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">ارشيف الاقسام</h1>
    
    <form class="d-f justify-content-center align-items-center" id="search-form" action="{{route('category.archive_search')}}" method="get">
      <input class="mySearch" type="text" name="name" id="search-input">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>

    <a type="button" class="btn btn-secondary py-2" href="{{ route('category.index') }}">الاقسام</a>
  </div>
  @if ($categories->count() > 0)
    <table class="table" id="table">
          <thead style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
              <th scope="col" style="width:70px">#</th>
              <th style="width: 7rem" scope="col">الاسم AR</th>
              <th scope="col">الاسم EN </th>
              <th scope="col">تاريخ الانشاء</th>
              <th scope="col">تاريخ التعديل</th>
              <th scope="col">تاريخ الحذف</th>
              <th scope="col">الخيارات</th>
            </tr>
          </thead>
          <tbody id="tbody">
              @php
                  $counter =1;
              @endphp
            @foreach ($categories as $category)
            <tr style="border-bottom: 1px double #5d657b">
              <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
              <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$category->name_ar}}</p></td>
              <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$category->name_en}}</p></td>
              <td style="max-width:  5rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($category->created_at)->format('d/m/Y   h:i:s')}}</p></td>
              <td style="max-width:  5rem;word-wrap: break-word;padding-left: 42px;"><p class=" title" style=" overflow-wrap: break-word">{{($category->updated_at)->format('d/m/Y   h:i:s')}}</p></td>
              <td style="max-width:  5rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($category->deleted_at)->format('d/m/Y   h:i:s')}}</p></td>
              <td>
                <a class="btn btn-secondary ms-1 py-1" href="{{ route('category.restore', $category->id) }}">استرجاع</a> 
                <a class="btn btn-danger ms-1 py-1" href="{{ route('category.hard_delete', $category->id) }}">حذف نهائي</a>  
              </td>
            </tr>
            @endforeach
          </tbody>
    </table>  
    <div class="pagination justify-content-center">
      {{$categories->links()}}
    </div>
  @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد اقسام</div>
  @endif
  
</div>
    
</div>
@endsection

