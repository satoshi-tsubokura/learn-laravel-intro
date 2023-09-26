@extends('layouts.helloapp')

@section('title', 'Auth')

@section('menubar')
  @parent
  認証ページ    
@endsection

@section('content')
  @if(session()->has('message'))
    <p>ログインに失敗しました。</p>
  @endif
  <form action="{{route('hello.auth')}}" method="post">
    @csrf
    <label for="email">email: </label>
    <input type="text" name="email" id="email">
    <br>
    <label for="password">password: </label>
    <input type="password" name="password" id="password">
    <br>
    <input type="submit" value="send">
  </form>
@endsection