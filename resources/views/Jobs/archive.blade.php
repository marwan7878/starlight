@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">ارشيف الوظائف</h1>

    <form class="display: flex;justify-content: center;align-items: center;" action="{{ route('Jobs.archive_search')}}" method="get">
      <input class="mySearch" type="text" name="title" id="search-input" placeholder="ادخل اسم الظيفة...">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>

    <a type="button" class="btn btn-secondary py-2" href="{{ route('Jobs.index') }}">الوظائف</a>
  </div>
  
  @if ($jobs->count() > 0)
  
  <table class="table">
      <thead style="border-bottom: #2f80ed 3px solid">
        <tr style="color: #2f80ed">
          <th scope="col" style="width: 5rem;">#</th>
          <th scope="col">الوظيفة</th>
          <th scope="col">المكان</th>
          <th scope="col">تاريخ الانشاء</th>
          <th scope="col">تاريخ التعديل</th>
          <th scope="col">تاريخ الحذف</th>
          <th scope="col" style="padding-left: 76px">الاختيارات</th>
        </tr>
      </thead>
      <tbody>
        @php
            $counter = 1;
        @endphp
        @foreach ($jobs as $job)
         <tr >
          <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
          <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$job->title}}</p></td>
          <td style="max-width:  11rem;word-wrap: break-word;padding-left: 50px;"><p class=" title" style=" overflow-wrap: break-word">{{$job->address}}</p></td>
          <td style="max-width:  5rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($job->created_at)->format('d/m/Y   h:i:s')}}</p></td>
          <td style="max-width:  5rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($job->updated_at)->format('d/m/Y   h:i:s')}}</p></td>
          <td style="max-width:  5rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{($job->deleted_at)->format('d/m/Y   h:i:s')}}</p></td>
          <td>
            <a class="btn btn-secondary ms-1 py-1" href="{{ route('Jobs.restore', $job->id) }}">استرجاع</a> 
            <a class="btn btn-danger ms-1 py-1" href="{{ route('Jobs.hard_delete', $job->id) }}">حذف نهائي</a>  
          </td>
         </tr>
        @endforeach        
  </table>
  <div class="pagination justify-content-center">
    {{$jobs->links()}}
  </div>
  @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد وظائف</div>
  @endif
  
  
</div>
@endsection
