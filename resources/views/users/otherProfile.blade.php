@extends('layouts.login')

@section('content')

<div class='container'>
    <table class='table table-hover'>
    @foreach ($profile as $profile)
    <tr>
      <td><img src="{{ asset ('/images/'.$profile->images) }}"></td>
      <td>{{ $profile->username }}</td>
      <td>{{ $profile->bio }}</td>
      @if(!in_array($profile->id, array_column($follow_list, 'follower')))
      <td><a href="/users/{{$profile->id}}/other_searchFollow">フォローする</a></td>
      @else
      <td><a class="btn btn-danger" href="/users/{{$profile->id}}/other_searchFollow_del" onclick="return confirm('フォローをはずしてもよろしいでしょうか？')">フォローをはずす</a></td>
      @endif
    </tr>
    @endforeach
    </table>
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
    </tr>
    @endforeach
    </table>
  </div>

@endsection
