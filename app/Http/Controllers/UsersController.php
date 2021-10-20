<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        $list = \DB::table('users')
        ->where('id', '=', Auth::id())
        ->select('username', 'id', 'images', 'bio', 'mail', 'password')
        ->get();
        return view('users.profile', ['list'=>$list]);
    }
    public function update(Request $request)
    {
        $id = Auth::id();
        $new_username = $request->input('new_username');
        $new_mail = $request->input('new_mail');
        $new_password = $request->input('new_password');
        $new_bio = $request->input('new_bio');

        if(isset($new_password) && isset($filename)){
            $filename = $request->file("images")->getClientOriginalName();
            \DB::table('users')
            ->where('id', $id)
            ->update(
                ['username' => $new_username, 'mail' => $new_mail, 'password' => $new_password, 'bio'=>$new_bio, 'images'=>$filename]
            );
        }else if(!isset($new_password) && isset($filename)){
            $filename = $request->file("images")->getClientOriginalName();
            \DB::table('users')
            ->where('id', $id)
            ->update(
                ['username' => $new_username, 'mail' => $new_mail, 'bio'=>$new_bio, 'images'=>$filename]
            );
        }else if(isset($new_password) && !isset($filename)){
            \DB::table('users')
            ->where('id', $id)
            ->update(
                ['username' => $new_username, 'mail' => $new_mail, 'password' => $new_password, 'bio'=>$new_bio]
            );
        }else{
            \DB::table('users')
            ->where('id', $id)
            ->update(
                ['username' => $new_username, 'mail' => $new_mail, 'bio'=>$new_bio]
            );
        };
        return redirect('/users/profile');
    }

    public function search(Request $request){
        $list = \DB::table('users')
        ->where('id', '<>', Auth::id())
        ->select('username', 'id', 'images')
        ->get();
        return view('users.search', ['list'=>$list]);
    }
    public function searchResult(Request $request){
        //dd($request);
        $list = \DB::table('users')
        ->where('id', '<>', Auth::id())
        ->where('username', 'like', "%$request->searchText%")
        ->get();
        //dd($list);
        return view('users.search', ['list'=>$list]);
    }
    public function searchFollow($id){
        //dd($id);
        $login_user_id = Auth::id();

        \DB::table('follows')->insert([
        'follow'=>$login_user_id,
        'follower'=>$id,
        'created_at'=>now(),
        ]);
        return redirect('/users/search');
    }
    public function searchFollow_del($id){
        //dd($id);
        $login_user_id = Auth::id();

        \DB::table('follows')
            ->where('follower', $id)
            ->where('follow', $login_user_id)
            ->delete();

        return redirect('/users/search');
    }
    public function otherProfile($id){
        $profile = \DB::table('users')
        ->where('id', $id)
        ->select('username', 'id', 'images', 'bio')
        ->get();

        $list = \DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->where('user_id', '=', $id)
        ->select('users.username','posts.posts', 'posts.id', 'users.images', 'posts.created_at')
        ->orderBy('posts.created_at', 'DESC')
        ->get();
        return view('/users/otherProfile', ['profile'=>$profile, 'list'=>$list]);

    }
    public function other_searchFollow($id){
        //dd($id);
        $login_user_id = Auth::id();

        \DB::table('follows')->insert([
        'follow'=>$login_user_id,
        'follower'=>$id,
        'created_at'=>now(),
        ]);
        return back();
    }
    public function other_searchFollow_del($id){
        //dd($id);
        $login_user_id = Auth::id();

        \DB::table('follows')
            ->where('follower', $id)
            ->where('follow', $login_user_id)
            ->delete();

        return back();
    }
}
