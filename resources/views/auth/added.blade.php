@extends('layouts.logout')

@section('content')
<div class="login">
  <span>
  <div class="clear">
    <p>{{$username}}さん、</p>
    <p>ようこそ！DAWNSNSへ！</p>
    <div class="added_text02">
      <p>ユーザー登録が完了しました。</p>
      <p>さっそく、ログインをしてみましょう。</p>
    </div>
    <p class="added_btn"><a href="/login">ログイン画面へ</a></p>
  </div>
  </span>
</div>

@endsection
