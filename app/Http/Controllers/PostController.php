<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        return view('custom');
    }

    public function getAll(Request $request)
    {
        return Posts::all();
    }

    public function getPost(Posts $post)
    {
        return view('post');
    }

    public function getPostData(Request $request)
    {
        return DB::table('comments')->where('post_id', '=', $request->ID)->get();
    }
}
