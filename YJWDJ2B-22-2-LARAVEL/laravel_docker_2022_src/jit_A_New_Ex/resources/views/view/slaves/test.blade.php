@extends('layouts.master')
@section('title')
할일 목록 화면
@stop

@section('content')
<table class='table'>
    <thead>
        <tr>
            <th>
                할일
            </th>
            <th>
                기한
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
         <tr>
            <td>{{$task['name']}}</td>
            <td>{{$task['due_date']}}</td>
         </tr>
        @endforeach
    </tbody>
</table>
@endsection
