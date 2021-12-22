@extends('layouts.login')

@section('content')

<div class='other_container'>
    <table class='table_other table-hover'>
    @foreach ($profile as $profile)
    <tr>
      <td><a class="icon_top_other"><img src="{{ asset ('/images/'.$profile->images) }}"></a></td>
      <td><p>Name</p><p>Bio</p></td>
      <td><p>{{ $profile->username }}</p><p>{{ $profile->bio }}</p></td>
      @if(!in_array($profile->id, array_column($follow_list, 'follower')))
      <td><p class="other_follow_btn"><a href="/users/{{$profile->id}}/other_searchFollow">フォローする</a></p></td>
      @else
      <td><p class="other_follow_del_btn"><a class="btn btn-danger" href="/users/{{$profile->id}}/other_searchFollow_del" onclick="return confirm('フォローをはずしてもよろしいでしょうか？')">フォローをはずす</a></p></td>
      @endif
    </tr>
    @endforeach
    </table>
  </div>
<div class='post_container'>
    <table class='table table-hover'>
    @foreach ($list as $list)
    <tr>
      <td><p class="icon_top"><img src="{{ asset ('/images/'.$list->images) }}"></p></td>
      <td><p class="username">{{ $list->username }}</p><p class="posts">{{ $list->posts }}</p></td>
      <td><p class="created_at">{{ $list->created_at }}</p></td>
    </tr>
    @endforeach
    </table>
  </div>

@endsection
