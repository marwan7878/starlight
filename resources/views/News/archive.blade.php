@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">ارشيف الاخبار</h1>

    <form class="display: flex;justify-content: center;align-items: center;" id="search-form" action="{{route('News.archive_title_search')}}" method="get">
      <input class="mySearch" style="width:10rem;" type="text" name="title" id="search-input" placeholder="ادخل عنوان...">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>

    
    <form class="display: flex;justify-content: center;align-items: center;" id="search-form" action="{{route('News.archive_search')}}" method="get">
      <input class="mySearch" style="width:15rem;" type="text" name="description" id="search-input" placeholder="ادخل كلمات بالوصف...">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>

    <a type="button" class="btn btn-secondary py-2" href="{{ route('News.index') }}">الاخبار</a>
  </div>
  @if ($news->count() > 0)
  <table class="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
              <th scope="col" style="width: 5rem;">#</th>
              <th scope="col" style="width: 8rem;">الصورة</th>
              <th scope="col">العنوان</th>
              <th scope="col">القسم</th>
              <th scope="col">تاريخ الانشاء</th>
              <th scope="col">تاريخ التعديل</th>
              <th scope="col">تاريخ الحذف</th>
              <th scope="col">الخيارات</th>
          </tr>
        </thead>
        <tbody>
            @php
                $counter =1;
            @endphp
          @foreach ($news as $event)
          <tr style="border-bottom: 1px double #5d657b">
            <th scope="row" style="color: #2f80ed ">{{$counter++}}</th>
            <td><img src="/images/main/news/{{$event->image}}" alt="error" style="width: 60px"></td>
            <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$event->title}}</p></td>
            <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word; padding-left: 30px;">{{$event->category->name_ar}}</p></td>
            <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($event->created_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($event->updated_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($event->deleted_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td>
              <a class="btn btn-primary ms-1 py-1" href="{{ route('News.restore', $event->id) }}">استرجاع</a>
              <a class="btn btn-danger ms-1 py-1" href="{{ route('News.hard_delete', $event->id) }}">حذف نهائي</a>  
            </td>
          </tr>
              
          @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
      {{$news->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد اخبار</div>
    @endif
</div>
@endsection
