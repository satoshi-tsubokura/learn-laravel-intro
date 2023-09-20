@extends('layouts.helloapp')

@section('title', 'Person.Edit')

@section('menubar')
  @parent
  更新ページ
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
      <form action="{{route('person.store', $person)}}" method="POST">
        @csrf
        @method('PUT')
        <tr>
          <th>name: </th>
          <td><input type="text" name="name" value="{{old('name', $person->name)}}"></td>
        </tr>
        <tr>
          <th>mail: </th>
          <td><input type="text" name="mail" value="{{old('mail', $person->mail)}}"></td>
        </tr>
        <tr>
          <th>age: </th>
          <td><input type="text" name="age" value="{{old('age', $person->age)}}"></td>
        </tr>
        <tr>
          <th></th>
          <td><input type="submit" value="send"></td>
        </tr>
      </form>
    </table>
@endsection