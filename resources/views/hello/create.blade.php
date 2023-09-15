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
    @error('start')
    <tr>
      <th>ERROR</th>
      <td>{{$message}}</td>
    </tr>    
    @enderror
    <tr>
      <th>開始日:</th>
      <td><input type="datetime-local" name="start" value="{{old('start')}}"></td>
    </tr>
    @error('end')
    <tr>
      <th>ERROR</th>
      <td>{{$message}}</td>
    </tr>    
    @enderror
    <tr>
      <th>終了日:</th>
      <td><input type="datetime-local" name="end" value="{{old('end')}}"></td>
    </tr>

    @error('gender')
    <tr>
      <th>ERROR</th>
      <td>{{$message}}</td>
    </tr>    
    @enderror
    <tr>
      <th>gender:</th>
      <td>
        <label for="gender_men">men</label>
        <input type="radio" name="gender" value="men" id="gender_men" {{old('gender') === 'men' ? 'checked' : ''}}>
        <label for="gender_women">women</label>
        <input type="radio" name="gender" value="women" id="gender_women" {{old('gender') === 'women' ? 'checked' : ''}}>
        <label for="gender_other">other</label>
        <input type="radio" name="gender" value="other" id="gender_other" {{old('gender') === 'other' ? 'checked' : ''}}>
      </td>
    </tr>
    <tr>
    @error('contact')
    <tr>
      <th>ERROR</th>
      <td>{{$message}}</td>
    </tr>
    @enderror
      <th>連絡手段: </th>
      <td>
        <label for="use_mail">メールアドレス</label>
        <input type="radio" name="contact" id="use_mail" value="email" {{old('contact') === 'email' ? 'checked' : ''}}>
        <label for="use_tel">電話</label>
        <input type="radio" name="contact" id="use_tel" value="tel"  {{old('contact') === 'tel' ? 'checked' : ''}}>
      </td>
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
    @error('tel')
    <tr>
      <th>ERROR</th>
      <td>{{$message}}</td>
    </tr>
    @enderror
    <tr>
      <th>tel:</th>
      <td><input type="text" name="tel" value="{{old('tel')}}"></td>
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
    @error('concent')
    <tr>
      <th>ERROR</th>
      <td>{{$message}}</td>
    </tr>
    @enderror
    <tr>
      <th>利用規約に同意する:</th>
      <td><input type="checkbox" name="concent" value="true"></td>
    </tr>
    <tr>
      <th></th>
      <td><input type="submit" value="送信"></td>
    </tr>
  </table>
</form>
</html>