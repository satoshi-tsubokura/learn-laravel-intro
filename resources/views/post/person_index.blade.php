@extends('layouts.helloapp')

@section('title', 'post.index')

@section('menubar')
  @parent
  ユーザー投稿ページ
@endsection

@section('content')
  <table>
    <tr>
      <th>Data</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
      <td @if($post->id === $latest_post->id) style="color:red;" @endif>{{$post->getData()}}</td>
    </tr>    
    @endforeach
  </table>
@endsection