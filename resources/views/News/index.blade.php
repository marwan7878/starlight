@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block " style="width: 100px">الاخبار</h1>
    
    <form class="display: flex;justify-content: center;align-items: center;" id="search-form" action="{{route('News.title_search')}}" method="get">
      <input class="mySearch" style="width:10rem;" type="text" name="title" id="search-input" placeholder="ادخل عنوان...">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>

    
    <form class="display: flex;justify-content: center;align-items: center;" id="search-form" action="{{route('News.search')}}" method="get">
      <input class="mySearch" style="width:15rem;" type="text" name="description" id="search-input" placeholder="ادخل كلمات بالوصف...">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>
    
    

    <form action="{{ route('News.searchByDate') }}" method="POST">
      @csrf
      <i class="fa-solid fa-calendar-days"></i>
      <input type="date" name="date">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>
    
    

    <a type="button" class="btn btn-secondary py-2" href="{{ route('News.archive') }}">الارشيف</a>
  </div>
  @if ($news->count() > 0)
    <table class="table" id="table">
          <thead style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
            @if ($search_flag == true && $search_flag2 == true)
              <th scope="col" style="width: 5rem;">#</th>
              <th scope="col" style="width: 8rem;">الصورة</th>
              <th scope="col">العنوان</th>
              <th scope="col">القسم</th>
              <th scope="col">تاريخ الانشاء</th>
              <th scope="col">تاريخ التعديل</th>
              <th scope="col">الخيارات</th>
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
              @include('News.rows')
            </tbody>
    </table>  
    <div class="pagination justify-content-center">
      {{$news->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد اخبار</div>
    @endif
    
  </div>

</div>
@endsection

<link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/daygrid.min.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid' ],
      events: [
        // Add your calendar events here
      ]
    });

    calendar.render();
  });
</script>