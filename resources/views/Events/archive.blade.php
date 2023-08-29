@extends('layouts.app')

@section('content')
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="p-3">
  <div class="three mb-3 d-flex justify-content-between align-items-center">

    <h1 class="d-inline-block">Events archive</h1>
    
    <input type="text" class="mySearch" style="width:10rem;" onkeyup="liveSearch(this)" placeholder="search">
    
    

    <a type="button" class="btn btn-secondary py-2" href="{{ route('Events.index') }}">Events</a>
  </div>
  @if ($events->count() > 0)
    <table class="table" id="table">
          <thead id="thead" style="border-bottom: #2f80ed 3px solid">
            <tr style="color: #2f80ed">
              <th scope="col" class="pe-4">#</th>
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              {{-- <th scope="col">Description</th> --}}
              <th scope="col">Deletion date</th>
              <th scope="col">Properties</th>
            </tr>
          </thead>
            <tbody id="tbody">
              @php
                $counter =1;
              @endphp
              @foreach($events as $event)
              <tr style="border-bottom: 1px double #5d657b">
                  <th scope="row" style="color: #2f80ed">{{$counter++}}</th>
                  <td><img src="{{$event->image_link}}" alt="error" style="width: 60px"></td>
                  <td>{{$event->title}}</td>
                  {{-- <td style="max-width: 120px;">{{$event->shortdescription}}</td> --}}
                  <td>{{($event->deleted_at)->format('d/m/Y   h:i:s')}}</td>
                  <td>
                      <a class="btn btn-secondary ms-1 py-1" href="{{ route('Events.restore', $event->id) }}">Restore</a> 
                      <a class="btn btn-danger ms-1 py-1" href="{{ route('Events.hard_delete', $event->id) }}">Hard Delete</a>  
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>  
          <div class="pagination justify-content-center">
            {{$events->links()}}
          </div>
          @else
          <div class="alert alert-danger fw-bold" role="alert">No events are exist!</div>
          @endif
        </div>
      </div>
      @endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    function liveSearch(input){
        
        var input = input.value;

        $.ajax({
            url: "{{ route('Events.search') }}",
            method: "GET",
            data: {
                column: input,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
              let events = response.events; 
              console.log(events[0]);

              var content;
              for(var i = 0 ; i < events.length ; i++)
              {
                var row = `<tr style="border-bottom: 1px double #5d657b">
              <th scope="row" style="color: #2f80ed">${i+1}</th>
                <td><img src="${events[i].images_url[0]}" alt="error" style="width: 60px"></td>
                <td>${events[i].title}</td>
                <td style="padding-left:30px;padding-right:30px; max-width:20px;">${events[i].shortdescription}</td>
              <td>
                <a class="btn btn-secondary ms-1 py-1" href="/events/edit/${events[i].id}">Edit</a> 
                <a class="btn btn-danger ms-1 py-1" href="/events/destroy/${events[i].id}">Delete</a>  
              </td>
              </tr>
                `
              }
              content += row;
                $('#tbody').html(content);
              header = `<tr style="color: #2f80ed">
                <th scope="col" style="width: 5rem;">#</th>
                <th scope="col" style="width: 8rem;">Image</th>
                <th scope="col">Title</th>
                <th scope="col" style="padding-left:30px;">Description</th>
                <th scope="col">Properties</th>
                <tr>
              `
                $('#thead').html(header);
                
            },
            error: function(xhr) {
                $('#result').html('An error occurred.');
                console.log(xhr);
            }
          });
    }

</script>