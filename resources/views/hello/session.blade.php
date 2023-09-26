@extends('layouts.helloapp')

@section('title', 'Session')

@section('menubar')
  @parent
  セッションページ
@endsection

@section('content')
<p>access: {{$count}}</p>
<p>{{implode(', ', $session_data_list)}}</p>
<form action="{{route('hello.ses_put')}}" method="post">
  @csrf
  <input type="text" name="input" id="input">
  <input type="submit" value="send">
</form>
@endsection