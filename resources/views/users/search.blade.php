@extends('layouts.login')

@section('content')

<div class="search">
  {{ Form::open(['url' => '/users/searchResult']) }}
  {{ Form::text('searchText',null, ['class' => 'form-control_search', 'placeholder' => 'ユーザー名'])}}
  <button type="submit" href="">検索</button>
  {{ Form::close()}}
</div>
<div class="user_list">
  <table class='search_table table-hover'>
  @foreach ($list as $list)
  <tr>
    <td><p class="icon_top"><img src="{{ asset ('/images/'.$list->images) }}"></p></td>
    <div>
    <td><p class="search_username">{{ $list->username }}</p></td>
    @if(!in_array($list->id, array_column($follow_list, 'follower')))
    <td>
      <p class="follow_btn"><a href="/users/{{$list->id}}/searchFollow">フォローする</a></p>
    </td>
      @else
    <td>
      <p class="follow_del_btn"><a class="btn btn-danger" href="/users/{{$list->id}}/searchFollow_del" onclick="return confirm('フォローをはずしてもよろしいでしょうか？')">フォローをはずす</a></p>
    </td>
      @endif
      </div>
  </tr>

  @endforeach
  </table>
</div>

@endsection
