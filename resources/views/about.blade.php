@extends('layouts.app')

@section('content')

<div class="p-5">
    <table class="table">
        <thead style="border-bottom: #2f80ed 3px solid">
          <tr style="color: #2f80ed">
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr >
            <th scope="row" style="color: #2f80ed">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
        </tbody>
    </table>
    
</div>
@endsection
