@extends('layouts.helloapp')

@section('title', 'person.index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
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
@endsection