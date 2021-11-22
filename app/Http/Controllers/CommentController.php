<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function deleteComment(Request $request)
    {
        Comments::destroy($request->ID);
        return response()->json("ok");
    }
}
