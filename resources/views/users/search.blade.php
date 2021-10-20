@extends('layouts.login')

@section('content')

<div class="search">
  {{ Form::open(['url' => '/users/searchResult']) }}
  {{ Form::text('searchText',null, ['class' => 'form-control', 'placeholder' => '検索'])}}
  <button type="submit" href="">検索</button>
  {{ Form::close()}}
</div>
<div class="user_list">
  <table class='table table-hover'>
  @foreach ($list as $list)

  <tr>
  <td>{{ $list->username }}</td>
    @if(!in_array($list->id, array_column($follow_list, 'follower')))
  <td><a href="/users/{{$list->id}}/searchFollow">フォローする</a></td>
    @else
  <td><a class="btn btn-danger" href="/users/{{$list->id}}/searchFollow_del" onclick="return confirm('フォローをはずしてもよろしいでしょうか？')">フォローをはずす</a></td>
    @endif
  </tr>

  @endforeach
  </table>
</div>

@endsection
