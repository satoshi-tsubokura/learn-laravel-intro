@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
<p>This is a sample page with php-template</p>
<p>{{$msg}}</p>
<p>id: {{$id}}</p>
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

@section('footer')
    copyright 2017 tuyano.
@endsection