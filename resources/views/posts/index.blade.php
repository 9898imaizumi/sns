@extends('layouts.login')

@section('content')

<div class="form-group">
          {{ Form::open(['url' => '/posts/create']) }}
          {{ Form::text('newPost',null, ['class' => 'form-control', 'placeholder' => '何をつぶやこうか'])}}
          <button type="submit" href="post/index"><img src="images/post.png"></button>
          {{ Form::close()}}
        </div>
<div class='container'>
    <h2 class='page-header'>投稿一覧</h2>
    <table class='table table-hover'>
    @foreach ($list as $list)
    <tr>
      <td>{{ $list->username }}</td>
      <td>{{ $list->posts }}</td>
      <td>{{ $list->created_at }}</td>
      <td><img src="{{ asset ('/images/'.$list->images) }}"></td>
      <td>
        <div class="edit">
          <a href="" class="modalopen" data-target="modal{{$list->id}}">
          <p class="edit"><img src="images/edit.png"></p>
          </a>
        </div>
        <div class="modal-main js-modal" id="modal{{$list->id}}">
          <div class="inner">
            <div class="inner-content">

                <div class="form-group">
                  {{ Form::open(['url' => '/posts/update']) }}
                  {!! Form::hidden('id', $list->id) !!}
                  {{ Form::text('upPost', $list->posts, ['class' => 'form-control']) }}
                  <button type="submit" class="btn btn-primary pull-right"><img src="images/edit.png"></button>
                  {{ Form::close() }}
                </div>
                <div class="delete-btn">
                  <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash.png"></a></td>
                </div>
            </div>
          </div>
      </td>
    </tr>
    @endforeach
    </table>
  </div>

@endsection
