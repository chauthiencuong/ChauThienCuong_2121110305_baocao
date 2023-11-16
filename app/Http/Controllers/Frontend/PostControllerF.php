<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\Models\Post;


class PostControllerF extends Controller
{
    public function show($id)
{
    $post = Post::find($id);
    
    if (!$post) {
        return abort(404); // Xử lý trường hợp bài viết không tồn tại.
    }

    return view('frontend.view_post', compact('post'));
}

    
}
