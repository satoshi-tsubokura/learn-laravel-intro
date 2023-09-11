<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <style>
    body {
    font-size:16pt;
    color: #999;
    margin: 5px;
    }

    h1 {
    font-size: 100px;
    text-align: right;
    color: #eee;
    margin: -40px 0px 50px 0px;
    letter-spacing: -4pt;
    }

    ul {
      font-size: 12pt;
    }

    hr {
      margin:25px 100px;
      border-top: 1px dashed #ddd;
    }

    .menutitle {
      font-size: 14pt;
      font-weight: bold;
      margin: 0;
    }

    .content {
      margin:10px;
    }
    
    .footer {
      text-align: right;
      font-size: 10pt;
      margin: 10px;
      border-bottom: 1px solid #ccc;
      color: #ccc;
    }
  </style>
</head>
<body>
  <h1>@yield('title')</h1>
  @section('menubar')
  <h2 class="menutitle">メニュー</h2>
  <ul>
    <li>@show</li>
  </ul>
  <hr size="1">
  <div class="content">
    @yield('content')
  </div>
  <div class="footer">
    @yield('footer')
  </div>
</body>
</html>