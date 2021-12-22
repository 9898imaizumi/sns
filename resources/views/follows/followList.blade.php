@extends('layouts.login')

@section('content')
<div class="follow_icon">
  <p>Follow List</p>
  <table class='follow_table table-hover'>
    @foreach ($icon as $icon)
    <tr>
      <td><a class="icon_top" href="/users/{{$icon->id}}/otherProfile"><img src="{{ asset ('/images/'.$icon->images) }}"></a></td>
    </tr>
    @endforeach
    </table>
</div>
<div class='post_container'>
    <table class='table table-hover'>
    @foreach ($list as $list)
    <tr>
      <td><a class="icon_top" href="/users/{{$icon->id}}/otherProfile"><img src="{{ asset ('/images/'.$list->images) }}"></a></td>
      <td><p class="username">{{ $list->username }}</p><p class="posts">{{ $list->posts }}</p></td>
      <td><p class="created_at">{{ $list->created_at }}</p></td>
    </tr>
    @endforeach
    </table>
  </div>
@endsection
