<!DOCTYPE html>
<html>
<head>
<title>Blade/Create</title>
<style>
    body {
    font-size:16pt;
    color: #999;
    }

    h1 {
    font-size: 100px;
    text-align: right;
    color: #eee;
    margin: -40px 0px 50px 0px;
    }
</style>
</head>
<body>
<h1>Blade/Create</h1>
<p>This is a sample page with php-template</p>
@empty($msg)
<p style="color:red;">名前を入力してください</p>
@else
<p>{{$msg}}</p>
@endempty
<form action="{{route('hello.post')}}" method="POST">
  @csrf
  <input type="text" name="msg">
  <button type="submit">送信</button>
</form>
</html>