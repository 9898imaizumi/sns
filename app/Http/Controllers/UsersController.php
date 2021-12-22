<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:12|min:4',
            'mail' => 'required|string|email|max:255|min:4|unique:users,mail,NULL,id,id,Auth::id()',
            'password' => 'required|string|max:12|min:4',
            'bio' => 'max:200',

        ], [
            'username.required'=>'username.required',
            'username.string'=>'username.string',
            'username.max'=>'username.max',
            'username.min'=>'username.min',
            'mail.required'=>'new_mail.required',
            'mail.string'=>'new_mail.string',
            'mail.email'=>'new_mail.email',
            'mail.max'=>'maxのエラー文です',
            'mail.min'=>'new_mail.min',
            'mail.unique'=>'uniqueのエラー文です',
            'password.required'=>'new_password.required',
            'password.string'=>'new_password.string',
            'password.max'=>'new_password.max',
            'password.min'=>'new_password.min',
            'bio.max'=>'new_bio.max',

            'images.alpha_dash'=>'alpha_dashのエラー文です',
            'images.image'=>'images.imageのエラー文です'
        ]);
    }
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
        $new_username = $request->input('username');
        $new_mail = $request->input('mail');
        $new_password = $request->input('password');
        $new_bio = $request->input('bio');
        $filename = $request->file('images');
        //dd($request);

        $data = $request->input();
        //dd($data);
        $validator = $this->validator($data);

        if($validator->fails()){
           return redirect('/users/profile')
           ->withErrors($validator)
           ->withInput();
        }


        if(isset($new_password) && isset($filename)){
            $filename = $request->file("images")->getClientOriginalName();
            //dd($filename);
            $request->file('images')->storeAs('images', $filename, ['disk' => 'root_public']);
            \DB::table('users')
            ->where('id', $id)
            ->update(
                ['username' => $new_username, 'mail' => $new_mail, 'password' => $new_password, 'bio'=>$new_bio, 'images'=>$filename]
            );
        }else if(!isset($new_password) && isset($filename)){
            $filename = $request->file("images")->getClientOriginalName();
            //dd($filename);
            $request->file('images')->storeAs('images', $filename, ['disk' => 'root_public']);
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
        $login_user_id = Auth::id();
        $list = \DB::table('users')
        ->where('id', '<>', Auth::id())
        ->select('username', 'id', 'images')
        ->get();
        return view('users.search', ['list'=>$list, 'login_user_id'=>$login_user_id]);
    }
    public function searchResult(Request $request){
        $login_user_id = Auth::id();
        //dd($request);
        $list = \DB::table('users')
        ->where('id', '<>', Auth::id())
        ->where('username', 'like', "%$request->searchText%")
        ->get();
        //dd($list);
        return view('users.search', ['list'=>$list, 'login_user_id'=>$login_user_id]);
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
