@php
$counter =1;
@endphp
@foreach ($news as $event)
<tr style="border-bottom: 1px double #5d657b">
    <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
    <td><img src="/images/main/news/{{$event->image}}" alt="error" style="width: 60px"></td>
    @if ($search_flag == true && $search_flag2 == true)
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">{{$event->title}}</p></td>
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 90px;"><p style=" overflow-wrap: break-word">{{$event->category->name_ar}}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">{{($event->created_at)->format('d/m/Y   h:i:s')}}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p 
            style="overflow-wrap: break-word">{{($event->updated_at)->format('d/m/Y   h:i:s')}}</p>
        </td>
    @else
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">{{$event->title}}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;">
            <p style="word-wrap: break-word;padding-left: 40px">
                @foreach ($indecies_of_words[$event->id] as $word)
                    {{$word}}
                @endforeach
            </p>
        </td>
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 90px;"><p style="overflow-wrap: break-word">{{$event->category->name_ar}}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p style="overflow-wrap: break-word">{{($event->created_at)->format('d/m/Y   h:i:s')}}</p></td>
    @endif
    <td>
        <a class="btn btn-secondary ms-1 py-1" href="{{ route('News.edit', $event->id) }}">تعديل</a> 
        <a class="btn btn-danger ms-1 py-1" href="{{ route('News.soft_delete', $event->id) }}">حذف</a>  
    </td>
</tr>
@endforeach