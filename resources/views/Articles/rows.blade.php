@php
$counter =1;
@endphp
@foreach ($articles as $article)
<tr style="border-bottom: 1px double #5d657b">
    <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
    <td><img src="/images/main/articles/{{$article->image}}" alt="error" style="width: 60px"></td>
    @if ($search_flag == true && $search_flag2 == true)
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">{{$article->title}}</p></td>
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 90px;"><p style=" overflow-wrap: break-word">{{$article->category->name_ar}}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">{{($article->created_at)->format('d/m/Y   h:i:s')}}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p 
            style="overflow-wrap: break-word">{{($article->updated_at)->format('d/m/Y   h:i:s')}}</p>
        </td>
    @else
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 40px;"><p style=" overflow-wrap: break-word">{{$article->title}}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;">
            <p style="word-wrap: break-word;padding-left: 40px">
                @foreach ($indecies_of_words[$article->id] as $word)
                    {{$word}}
                @endforeach
            </p>
        </td>
        <td style="max-width:  11rem;word-wrap: break-word;padding-left: 90px;"><p style="overflow-wrap: break-word">{{$article->category->name_ar}}</p></td>
        <td style="max-width:  7rem;word-wrap: break-word;padding-left: 40px;"><p style="overflow-wrap: break-word">{{($article->created_at)->format('d/m/Y   h:i:s')}}</p></td>
    @endif
    <td>
        <a class="btn btn-secondary ms-1 py-1" href="{{ route('Articles.edit', $article->id) }}">تعديل</a> 
        <a class="btn btn-danger ms-1 py-1" href="{{ route('Articles.soft_delete', $article->id) }}">حذف</a>  
    </td>
</tr>
@endforeach