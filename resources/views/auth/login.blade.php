@extends('layouts.logout')

@section('content')
<div class="sub_title">
  <p>Social Network Service</p>
</div>

{!! Form::open() !!}
<div class="login">
  <span>
    <p class="">DAWNSNSへようこそ</p>

    <P class="common name">
      {{ Form::label('e-mail') }}
      <p class="input_tug">
        {{ Form::text('mail',null,['class' => 'input']) }}
      </p>
    </P>
    <p class="common name">
      {{ Form::label('password') }}
      <p class="input_tug">
        {{ Form::password('password',['class' => 'input']) }}
      </p>
    </p>
    <p class="common login_btn">
      {{ Form::submit('ログイン') }}
    </p>

    <p class="register_btn"><a href="/register">新規ユーザーの方はこちら</a></p>

    {!! Form::close() !!}
  </span>
</div>
@endsection
