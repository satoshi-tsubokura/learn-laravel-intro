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
    <tr>
      <th>name</th>
      <th>mail</th>
      <th>age</th>
      <th>delete button</th>
    </tr>
    @foreach ($people as $person)
        <tr>
          <td>{{$person->name}}</td>
          <td>{{$person->mail}}</td>
          <td>{{$person->age}}</td>
          <td>
            <form action="{{route('db_facade.delete', $person->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <input type="submit" value="delete">
            </form>
          </td>
        </tr>
    @endforeach
  </table>    
@endsection