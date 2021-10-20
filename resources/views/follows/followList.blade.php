@extends('layouts.login')

@section('content')
<div class="">
  <p>Follow List</p>
  <table class='table table-hover'>
    @foreach ($icon as $icon)
    <tr>
      <td><a href="/users/{{$icon->id}}/otherProfile"><img src="{{ asset ('/images/'.$icon->images) }}"></a></td>
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
      <td><a href="/users/{{$icon->id}}/otherProfile"><img src="{{ asset ('/images/'.$list->images) }}"></a></td>

    </tr>
    @endforeach
    </table>
  </div>
@endsection
