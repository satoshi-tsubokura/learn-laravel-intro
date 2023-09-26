@extends('layouts.helloapp')

@section('title', 'restfull')

@section('menubar')
  @parent
  Restfullコントローラー    
@endsection

@section('content')
  <form action="{{route('rest.store')}}" method="post">
    @csrf
    <label for="message">message: </label>
    <input type="text" name="message" id="message">
    <br>
    <label for="url">url: </label>
    <input type="text" name="url" id="url">
    <br>
    <input type="submit" value="send">
  </form>
@endsection