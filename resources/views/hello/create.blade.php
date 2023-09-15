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

@if ($errors->any())
  <div>
    {{-- <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul> --}}
    <p>入力に問題があります。再入力してください</p>
  </div>    
@endif
<form action="{{route('hello.post')}}" method="POST">
  @csrf
  <table>
    @error('name')
    <tr>
      <th>ERROR</th>
      <td>{{$message}}</td>
    </tr>    
    @enderror
    <tr>
      <th>name:</th>
      <td><input type="text" name="name" value="{{old('name')}}"></td>
    </tr>
    @error('mail')
    <tr>
      <th>ERROR</th>
      <td>{{$message}}</td>
    </tr>
    @enderror
    <tr>
      <th>mail:</th>
      <td><input type="text" name="mail" value="{{old('mail')}}"></td>
    </tr>
    @error('age')
    <tr>
      <th>ERROR</th>
      {{-- <td>{{$errors->first('age')}}</td> --}}
      {{-- <td>{{$message}}</td> --}}
      <td>
        <ul>
          @foreach ($errors->get('age') as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </td>
    </tr>
    @enderror
    <tr>
      <th>age:</th>
      <td><input type="text" name="age" value="{{old('age')}}"></td>
    </tr>
    <tr>
      <th></th>
      <td><input type="submit" value="送信"></td>
    </tr>
  </table>
</form>
</html>