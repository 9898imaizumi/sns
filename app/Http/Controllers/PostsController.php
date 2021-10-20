<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $list = \DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->select('users.username','posts.posts', 'posts.id', 'users.images', 'posts.created_at')
        ->orderBy('posts.created_at', 'DESC')
        ->get();
        // dd($list);
        return view('follows.followList', ['list'=>$list]);

    }
    public function posts()
    {
        $list = \DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->select('users.username','posts.posts', 'posts.id', 'users.images', 'posts.created_at')
        ->orderBy('posts.created_at', 'DESC')
        ->get();
        // dd($list);
        return view('posts.index', ['list'=>$list]);
    }

// 新規投稿 //
    public function create(Request $request){
        $login_user_id = Auth::id();
        // dd($login_user_id);
        $post = $request->input('newPost');
        // dd($post);

        \DB::table('posts')->insert([
        'user_id'=>$login_user_id,
        'posts'=>$post,
        'created_at'=>now(),
        ]);
        return redirect('/top');
    }
// アップデート //
    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post, 'created_at'=>now()]
            );

        return redirect('/top');
    }
// 削除 //
    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

}
