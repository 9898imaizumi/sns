@extends('layouts.login')

@section('content')

<div class="form-group_new">
  <a class="header_img"><img src="{{ asset ('/images/'.auth()->user()->images) }}"></a>
  {{ Form::open(['url' => '/posts/create']) }}
  {{ Form::text('posts',null, ['class' => 'form-control_new', 'placeholder' => '何をつぶやこうか'])}}
  @if ($errors->has('posts'))
    {{ $errors->first('posts')}}
  @endif
  <p class="new_create_btn"><a href="post/create"><input type="image" src="images/post.png"></a></p>
  {{ Form::close()}}
</div>
<div class='post_container'>
  <table class='table table-hover'>
  @foreach ($list as $list)
  <tr>
    <td><p class="icon_top"><img src="{{ asset ('/images/'.$list->images) }}"></p></td>
    <td><p class="username">{{ $list->username }}</p><p class="posts">{{ $list->posts }}</p></td>
    <td><p class="created_at">{{ $list->created_at }}</p></td>
    @if(!in_array($list->user_id, array_column($user_id, 'user_id')))
    @else
    <td>
      <div class="edit">
        <a href="" class="modalopen" data-target="modal{{$list->id}}">
        <p class="edit-img"><img src="images/edit.png"></p>
        </a>
      </div>
      <div class="modal-main js-modal" id="modal{{$list->id}}">
        <div class="inner">
          <div class="inner-content">
            <div class="form-group">
              {{ Form::open(['url' => '/posts/update']) }}
              {!! Form::hidden('id', $list->id) !!}
              {{ Form::text('posts', $list->posts, ['class' => 'form-control_update']) }}
              @if ($errors->has('posts'))
                {{ $errors->first('posts')}}
              @endif
              <div class="update_close">
                <button class="update_btn"><img src="images/edit.png"></button>
                <a href="" class="modalClose">Close</a>
              </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </td>
    <td>
    <div class="delete-btn">
      <a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash.png"></a>
    </div>
    </td>
    @endif
  </tr>
  @endforeach
  </table>
</div>

@endsection
