@extends('layouts.helloapp')

@section('title', 'Person.Add')

@section('menubar')
  @parent
  新規作成ページ
@endsection

@section('content')
    @if($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif
    <table>
      <form action="{{route('person.create')}}" method="POST">
        @csrf
        <tr>
          <th>name: </th>
          <td><input type="text" name="name" value="{{old('name')}}"></td>
        </tr>
        <tr>
          <th>mail: </th>
          <td><input type="text" name="mail" value="{{old('mail')}}"></td>
        </tr>
        <tr>
          <th>age: </th>
          <td><input type="text" name="age" value="{{old('age')}}"></td>
        </tr>
        <tr>
          <th></th>
          <td><input type="submit" value="send"></td>
        </tr>
      </form>
    </table>
@endsection