@extends('layouts.login')

@section('content')

{!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
          {{ Form::open(['url' => '/post/create']) }}
          {{ Form::text('posts',null, ['class' => 'form-control', 'placeholder' => '何をつぶやこうか'])}}
          <button type="submit" class="btn btn-success pull-right" href="post/index">追加</button>
          {{ Form::close()}}
        </div>
@endsection
