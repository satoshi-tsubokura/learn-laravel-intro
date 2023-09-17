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
    <form action="{{route('db_facade.update', ['id' => $people->id])}}" method="POST">
      @csrf
      @method('PUT')
      <tr>
        <th>name: </th>
        <td><input type="text" name="name" value="{{old('name', $people->name)}}"></td>
      </tr>
      <tr>
        <th>mail: </th>
        <td><input type="email" name="mail" value="{{old('mail', $people->mail)}}"></td>
      </tr>
      <tr>
        <th>age: </th>
        <td><input type="text" name="age" value="{{old('age', $people->age)}}"></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="send"></td>
      </tr>
    </form>
  </table>
@endsection