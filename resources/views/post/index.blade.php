@extends('layouts.helloapp')

@section('title', 'post.index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <table>
    <tr>
      <th><a href="{{route('post.index', ['sort' => 'id'])}}">id</a></th>
      <th><a href="{{route('post.index', ['sort' => 'name'])}}">user name</a></th>
      <th><a href="{{route('post.index', ['sort' => 'title'])}}">title</a></th>
    </tr>
    @foreach ($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->person->name}}</td>
      <td>{{$post->title}}</td>
    </tr>    
    @endforeach
  </table>
  {{$posts->appends(['sort' => $sort])->links('vendor.pagination.tailwind')}}
@endsection