<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use View;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        $follow_list = \DB::table('follows')->where('follow', Auth::id())->select('follower')->get()->toArray();

        View::share('follow_list', $follow_list);

        $login_user_id = Auth::id();
        $count_follow =\DB::table('follows')->where('follower', $login_user_id)->count();
        View::share('follow', $count_follow);
        $count_follower =\DB::table('follows')->where('follow', $login_user_id)->count();
        View::share('follower', $count_follower);


    return $next($request);
    });
    }

}
