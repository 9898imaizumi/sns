@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<div class="login">
  <span>
    <p>DAWNSNSへようこそ</p>

    <P>
      {{ Form::label('e-mail') }}
    </P>
    <p>
      {{ Form::text('mail',null,['class' => 'input']) }}
    </p>
    <p>
      {{ Form::label('password') }}
    </p>
    <p>
      {{ Form::password('password',['class' => 'input']) }}
    </p>
    <p>
      {{ Form::submit('ログイン') }}
    </p>

    <p><a href="/register">新規ユーザーの方はこちら</a></p>

    {!! Form::close() !!}
  </span>
</div>
@endsection
