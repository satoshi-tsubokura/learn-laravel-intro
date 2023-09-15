@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
@component('components.message')
  @slot('type') danger @endslot
  @slot('msg_title')
      <a href="{{route('hello.index')}}">CAUTION</a>
  @endslot

  @slot('msg_content')
      これはメッセージの表示です。
  @endslot
@endcomponent
<form action="{{route('hello.index')}}" method="get">
  @component('components.primary-button', ['class' => 'md-4', 'type' => 'primary'])
    @slot('text')
      ページ遷移
    @endslot
  @endcomponent
</form>

<ul>
  @each('components.item', $users, 'item', 'components.item-empty')
</ul>

<p>ビューコンポーザーメッセージ: {{$view_message}}</p>

<p>This is a sample page with php-template</p>
<p>ミドルウェアレスポンス前変換: <middleware>google.com</middleware></p>
<p>{{$msg}}</p>
<p>id: {{$id}}</p>
<p>pass: {{$pass}}</p>
<p>url: {{$full_url}}</p>
<p>{{date("Y年m月d日")}}</p>
<label for="area">
  <select name="area" id="area">
    @foreach ($area as $a)
      <option value="{{$a['value']}}" @if($loop->first) selected @endif>{{$a['name']}}</option>
    @endforeach
  </select>
<div>
  <ol>
    @for($i = 1; $i < 100; $i++)
      @if($i % 2 === 1)
        @continue
      @elseif($i <= 10)
        <li>No, {{$i}}</li>
      @else
        @break
      @endif
    @endfor
  </ol>
</div>
<div>
    @foreach ($data as $item)
    @if($loop->first)
      <p>データ一覧</p><ul>
    @endif

    @if($loop->even) 
        @php
          $isEven = true; 
        @endphp
    @else
        @php
          $isEven = false;
        @endphp
    @endif
    <li @if($isEven) style="color:red" @endif>
      no,{{$loop->index}}. {{$item}} <br>
      残り: {{$loop->remaining}}回ループします。
    </li>
    @if ($loop->last)
      </ul><p>--ここまで</p>
    @endif
    @endforeach
</div>
<div>
  <ol>
    @php
        $counter = 0;
    @endphp
    @while ($counter < count($data))
        <li>{{$data[$counter]}}</li>
        @php
            $counter++;
        @endphp
    @endwhile
  </ol>
</div>
@endsection