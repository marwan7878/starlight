@extends('layouts.app')

@section('content')
<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">
    <h1 class="d-inline-block w-25 ">Meta Data</h1>
    
  </div>
  
  @if ($Meta_data->count() > 0)
    <table class="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col" style="width: 5rem;">#</th>
            <th scope="col">العنوان</th>
            <th scope="col">الرابط</th>
            <th scope="col">تاريخ الانشاء</th>
            <th scope="col">تاريخ التعديل</th>
            <th scope="col">الاختيارات</th>
          </tr>
        </thead>
        <tbody>
          @php
              $counter = 1;
          @endphp
          @foreach ($Meta_data as $metadata)
          <tr style="border-bottom: 1px double #5d657b">
            <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
            <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p class=" title" style=" overflow-wrap: break-word">{{$metadata->title}}</p></td>
            <td style="max-width:  11rem;word-wrap: break-word;padding-left: 50px;"><p class=" title" style=" overflow-wrap: break-word">{{$metadata->link}}</p></td>
            <td style="word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word;max-width:  5rem;">{{($metadata->created_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td style="word-wrap: break-word;"><p class=" title" style=" overflow-wrap: break-word;max-width:  5rem;">{{($metadata->updated_at)->format('d/m/Y   h:i:s')}}</p></td>
            <td>
              <a class="btn btn-secondary ms-1 py-1" href="{{ route('metadata.edit', $metadata->id) }}">تعديل</a> 
              <a class="btn btn-danger ms-1 py-1" href="{{ route('metadata.delete', $metadata->id) }}">حذف</a>  
            </td>
         
          @endforeach        
    </table>
    <div class="pagination justify-content-center">
      {{$Meta_data->links()}}
    </div>
    @else
      <div class="alert alert-danger fw-bold" role="alert">لا يوجد بيانات</div>
    @endif
    
    
</div>
@endsection
