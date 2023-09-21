@extends('layouts.helloapp')

@section('title', 'post.Add')

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
      <form action="{{route('post.create')}}" method="POST">
        @csrf
        <tr>
          <th>person_id: </th>
          <td><input type="number" name="person_id" value="{{old('person_id')}}"></td>
        </tr>
        <tr>
          <th>title: </th>
          <td><input type="text" name="title" value="{{old('title')}}"></td>
        </tr>
        <tr>
          <th>content: </th>
          <td><textarea name="body">{{old('body')}}</textarea></td>
        </tr>
        <tr>
          <th></th>
          <td><input type="submit" value="send"></td>
        </tr>
      </form>
    </table>
@endsection