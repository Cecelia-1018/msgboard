@extends('master')

@section('title','Homepage')

@section('content')

    Recent Messages

    <form action="/create" method="POST">
      
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="text" name="title" placeholder="Title">
      <input type="text" name="content" placeholder="Content">
      {{ csrf_field()}}
      <button type="submit"> Submit </button>
    </form>
    
    <ul>
       @foreach($messages as $message)
       <li>
        <strong>{{$message -> title }} </strong> 
        <br>
         {{$message -> content}}
        <br>
         {{$message -> created_at -> format('d/m/Y H:i') }} <br>
         {{\Carbon\Carbon::parse($message['created_at'])->diffForHumans() }}
         <br>
         <a href="/message/{{ $message->id}}">View</a>
       </li> 
       @endforeach
    </ul> 

@endsection