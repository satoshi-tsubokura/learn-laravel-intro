@extends('layouts.helloapp')

@section('title', 'person.index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <table>
    <tr>
      <th>Data(投稿済みユーザー)</th>
    </tr>
    @foreach ($posts_people as $person)
    <tr>
      <td>{{$person->getData()}} 総いいね数: {{$person->countGood()}}</td>
      <td>
        <ul>
        @forelse ($person->posts as $post)
        <li>{{$post->getData()}}  good: {{$post->evaluation->good}} </li>
        @empty
        <li>投稿はありません。</li>
        @endforelse
          </ul>
      </td>
      <td>
        <form action="{{route('person.destroy', $person)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit">削除</button>
        </form>
      </td>
    </tr>    
    @endforeach
  </table>
  <hr>
  <table>
    <tr>
      <th>Data(未投稿ユーザー)</th>
    </tr>
    @foreach ($no_posts_people as $person)
    <tr>
      <td>{{$person->getData()}}</td>
      <td>
        <form action="{{route('person.destroy', $person)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit">削除</button>
        </form>
      </td>
    </tr>    
    @endforeach
  </table>
@endsection