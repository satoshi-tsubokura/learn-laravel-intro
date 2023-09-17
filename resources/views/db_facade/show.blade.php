@extends('layouts.helloapp')

@section('title', 'DBFacades')

@section('menubar')
  @parent
  詳細ページ
@endsection

@section('content')
  @isset($msg)
    <p>{{$msg}}</p>   
  @endisset
  @foreach ($people as $person)
  <table>
        <tr>
          <th>id: </th>
          <td>{{$person?->id ?? 'not exists'}}</td>
        </tr>
        <tr>
          <th>name: </th>
          <td>{{$person?->name ?? 'not exists'}}</td>
        </tr>
  </table>    
  @endforeach
@endsection