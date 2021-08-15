<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request)
    {

        return view('dashboard', [
            'countUser' => User::where('role', 'normal')->count(),
            'countBlog' => Blog::where('user_id', Auth::user()->id)->count(),
        ]);
    }
}
