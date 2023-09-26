@extends('layouts.helloapp')

@section('title', 'person.index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
@auth
  <p>User: {{$user->name}}: ({{$user->email}})</p>   
@endauth

@guest
  <p>ログインしていません。</p>
  <a href="{{route('login')}}">ログイン</a>   
@endguest
  {{-- <table>
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
  </table> --}}
  <hr>
  <table>
    <tr>
      <th><a href="{{route('person.index', ['sort' => 'name'])}}">name</a></th>
      <th><a href="{{route('person.index', ['sort' => 'mail'])}}">mail</a></th>
      <th><a href="{{route('person.index', ['sort' => 'age'])}}">age</a></th>
    </tr>
    @foreach ($people as $person)
    <tr>
      <td>{{$person->name}}</td>
      <td>{{$person->mail}}</td>
      <td>{{$person->age}}</td>
    </tr>    
    @endforeach
  </table>
  {{$people->appends(['sort' => $sort])->links('vendor.pagination.tailwind')}}
@endsection