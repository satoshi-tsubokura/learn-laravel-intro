@extends('layouts.helloapp')

@section('title', 'person.find')

@section('menubar')
  @parent
  検索ページ
@endsection

@section('content')
    <form action="{{route('person.search')}}" method="POST">
      @csrf
      <input type="text" name="input" id="input" value="{{$input}}">
      <input type="submit" value="find">
    </form>

    @isset($people)
    <table>
      <tr>
        <th>Data</th>
      </tr>
      @foreach ($people as $person)
          
      <tr>
        <td>{{$person->getData()}}</td>
      </tr>    
      @endforeach
    </table>
    @endisset
@endsection

