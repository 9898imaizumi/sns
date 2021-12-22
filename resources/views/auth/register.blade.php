@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<div class="login">
  <span>

<p class="">新規ユーザー登録</p>
  <p class="common name">
    {{ Form::label('ユーザー名') }}
  <p class="input_tug">
    {{ Form::text('username',null,['class' => 'input']) }}
  </p>
  @if ($errors->has('username'))
    {{ $errors->first('username')}}
  @endif
</p>
<p class="common name">
    {{ Form::label('メールアドレス') }}
  <p class="input_tug">
    {{ Form::text('mail',null,['class' => 'input']) }}
  </p>
  @if ($errors->has('mail'))
    {{ $errors->first('mail')}}
  @endif
</p>
<p class="common name">
{{ Form::label('パスワード') }}
  <p class="input_tug">
{{ Form::password('password',null,['class' => 'input']) }}
  </p>
  @if ($errors->has('password'))
    {{ $errors->first('password')}}
  @endif
</p>
<p class="common name">
{{ Form::label('パスワード確認') }}
  <p class="input_tug">
{{ Form::password('password_confirmation',null,['class' => 'input']) }}
  </p>
  @if ($errors->has('password'))
    {{ $errors->first('password')}}
  @endif
</p>
<p class="register_btn">
{{ Form::submit('登録') }}
</p>

<p class="login_back"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
</span>
</div>
@endsection
