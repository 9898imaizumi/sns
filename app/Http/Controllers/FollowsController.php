<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class FollowsController extends Controller
{
    //
    public function followList(){
        $icon = \DB::table('users')
        ->join('follows','follower','=','users.id')
        ->where('follow',Auth::id())
        ->select('users.username', 'users.id', 'users.images')
        ->get();

        $list = \DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->join('follows','follows.follower','=','users.id')
        ->where('follow',Auth::id())
        ->select('users.username','posts.posts', 'posts.id', 'users.images', 'posts.created_at','posts.user_id')
        ->orderBy('posts.created_at', 'DESC')

        ->get();
        //dd($list);
        return view('follows.followList', ['list'=>$list, 'icon'=>$icon]);
    }
    public function followerList(){
        $icon = \DB::table('users')
        ->join('follows','follow','=','users.id')
        ->where('follower',Auth::id())
        ->select('users.username', 'users.id', 'users.images')
        ->get();

        $list = \DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->join('follows','follow','=','users.id')
        ->where('follower',Auth::id())
        ->select('users.username','posts.posts', 'posts.id', 'users.images', 'posts.created_at')
        ->orderBy('posts.created_at', 'DESC')
        ->get();
        return view('follows.followerList', ['list'=>$list, 'icon'=>$icon]);
    }
}
