@extends('layouts.helloapp')

@section('title', 'DBFacades')

@section('menubar')
  @parent
  DBFacades
@endsection

@section('content')
  @isset($msg)
    <p>{{$msg}}</p>   
  @endisset
  <table>
    <form action="{{route('db_facade.store')}}" method="POST">
      @csrf
      <tr>
        <th>name: </th>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <th>mail: </th>
        <td><input type="email" name="mail"></td>
      </tr>
      <tr>
        <th>age: </th>
        <td><input type="text" name="age"></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="send"></td>
      </tr>
    </form>
  </table>
@endsection