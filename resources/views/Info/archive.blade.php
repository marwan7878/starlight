@extends('layouts.app')

@section('content')

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">ارشيف البيانات</h1>

    <form class="d-f justify-content-center align-items-center" id="search-form" action="{{route('info.archive_search')}}" method="get">
      <input class="mySearch" type="text" name="description" id="search-input">
      <button class="btn btn-outline-secondary py-1" style="border-radius: 12px"  type="submit"><b>بحث</b></button>
    </form>

    <a type="button" class="btn btn-secondary py-2" href="{{ route('info.index') }}">البيانات</a>
  </div>
  @if ($all_info->count() > 0)
  <table class="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" style="width:5rem">#</th>
            <th scope="col">النوع</th>
            <th scope="col">الوصف</th>
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
          @foreach ($all_info as $info)
           <tr>
            <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
            <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$info->type}}</p></td>
            <td style="max-width:  11rem;word-wrap: break-word;padding-left: 60px;"><p class=" title" style=" overflow-wrap: break-word;">{{$info->description}}</p></td>
            <td style="word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word; max-width:  7rem;">{{($info->created_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td style="word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word; max-width:  7rem;">{{($info->updated_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td style="word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word; max-width:  7rem;">{{($info->deleted_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td>
              <a class="btn btn-primary ms-1 py-1" href="{{ route('info.restore', $info->id) }}">استرجاع</a>
              <a class="btn btn-danger ms-1 py-1" href="{{ route('info.hard_delete', $info->id) }}">حذف نهائي</a>  
            </td>
           </tr>
              
          @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center">
      {{$all_info->links()}}
    </div>
    @else
    <div class="alert alert-danger fw-bold" role="alert">لا يوجد بيانات</div>
    @endif
    
  </div>
</div>
@endsection
