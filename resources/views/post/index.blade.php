@extends('layouts.helloapp')

@section('title', 'post.index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <table>
    <tr>
      <th>Data</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
      <td>{{$post->getData()}}</td>
    </tr>    
    @endforeach
  </table>
@endsection