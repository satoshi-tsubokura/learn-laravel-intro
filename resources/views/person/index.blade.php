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