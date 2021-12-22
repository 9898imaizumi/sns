@extends('layouts.login')

@section('content')
<div class='container'>
    @foreach ($list as $list)
      <div class="img_profile">
        <p><img src="{{ asset ('/images/'.$list->images) }}"></p>
      </div>
      {!! Form::open(['url' => '/users/profile/update', 'enctype' => 'multipart/form-data']) !!}
      {!! Form::hidden('id', $list->id) !!}
      <div class="profile">
        <div class="profile_text username_profile">
          {{ Form::label('username') }}
          {{ Form::input('username', 'username', $list->username, ['class' => 'input_profile']) }}
          @if ($errors->has('username'))
          {{ $errors->first('username')}}
          @endif
        </div>
        <div class="profile_text mail">
          {{ Form::label('MailAdress') }}
          {{ Form::input('mail', 'mail', $list->mail, ['class' => 'input_profile']) }}
          @if ($errors->has('mail'))
          {{ $errors->first('mail')}}
          @endif
        </div>
        <div class="profile_text pass">
          {{ Form::label('Password') }}
          {{ Form::input('password', 'password', $list->password, ['class' => 'input_profile', 'readonly']) }}
        </div>
        <div class="profile_text newPass">
          {{ Form::label('New Password') }}
          {{ Form::input('password', 'password', null, ['class' => 'input_profile']) }}
          @if ($errors->has('password'))
          {{ $errors->first('password')}}
          @endif
        </div>
        <div class="profile_text bio">
          {{ Form::label('Bio') }}
          {{ Form::text('bio', $list->bio, ['class' => 'input_bio_profile', 'placeholder' => $list->bio]) }}
          @if ($errors->has('bio'))
          {{ $errors->first('bio')}}
          @endif
        </div>
        <div class="profile_text icon_profile">
          {{ Form::label('Icon Image') }}
          {{Form::file("images")}}
          @if ($errors->has('images'))
          {{ $errors->first('images')}}
          @endif
        </div>
        <div class="profile_update">
          {{ Form::submit('更新') }}
          {!! Form::close() !!}
        </div>
      </div>

    @endforeach
  </div>
@endsection
