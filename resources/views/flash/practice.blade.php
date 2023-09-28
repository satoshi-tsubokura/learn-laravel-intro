@extends('layouts.helloapp')

@section('title')
    フラッシュメッセージテスト
@endsection

@section('content')
<nav class="navbar navbar-light bg-light mb-5">
    <a class="navbar-brand" href="#">Flashメッセージ（デモ）</a>
</nav>
<div class="container">
    <form action="" method="post">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
        </div>
    </form>
</div><!-- /container -->   
@component('components.flash-message')
  @slot('title')
      フラッシュメッセージの練習
  @endslot
@endcomponent
@endsection