@extends('layouts.login')

@section('content')
<div class='container'>
    @foreach ($list as $list)

      <p><img src="{{ asset ('/images/'.$list->images) }}"></p>
      {!! Form::open(['url' => '/users/profile/update', 'enctype' => 'multipart/form-data']) !!}
      {!! Form::hidden('id', $list->id) !!}

      <div class="username">
        {{ Form::label('username') }}
        {{ Form::input('username', 'new_username', $list->username, ['class' => 'input']) }}
      </div>
      <div class="mail">
        {{ Form::label('MailAdress') }}
        {{ Form::input('mail', 'new_mail', $list->mail, ['class' => 'input']) }}
      </div>
      <div class="pass">
        {{ Form::label('Password') }}
        {{ Form::input('password', 'password', $list->password, ['class' => 'input', 'readonly']) }}
      </div>
      <div class="newPass">
        {{ Form::label('New Password') }}
        {{ Form::input('password', 'new_password', null, ['class' => 'input']) }}
      </div>
      <div class="bio">
        {{ Form::label('Bio') }}
        {{ Form::text('new_bio', $list->bio, ['class' => 'input', 'placeholder' => $list->bio]) }}
      </div>
      <div class="icon">
        <p>Icon Image</p>
        {{Form::file("images")}}
      </div>
      {{ Form::submit('更新') }}
      {!! Form::close() !!}


    @endforeach
  </div>
@endsection
