@extends('layouts.helloapp')

@section('title', 'クッキー')

@section('content')
    <p>{{$msg}}</p>

    @if (count($errors) > 0)
        <p>入力に問題があります。再入力してください。</p>
    @endif
  <table>
    <form action="{{route('cookie.post')}}" method="post">
      @csrf
      @error('msg')
          <tr>
            <th>ERROR</th>
            <td>{{$message}}</td>
          </tr>
      @enderror
      <tr>
        <th>Message: </th>
        <td><input type="text" name="msg" value="{{old('msg')}}"></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="send"></td>
      </tr>
    </form>
  </table>
@endsection