<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::orderBy('id', 'DESC')->get();
        return view('backend.post.index')->with(compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topic = Topic::orderBy('id', 'DESC')->get();
        return view('backend.post.create', compact('topic'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|unique:post|max:255',
                'slug' => 'max:255',
                'detail' => 'required|max:255',
                'status' => 'required',
                'topic' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif',

            ],
            [
                'title.required' => 'Bạn hãy tiêu đề',
                'title.unique' => 'Tiêu đề đã tồn tại! Hãy nhập tiêu đề khác.',
                'detail.required' => 'Bạn hãy nhập chi tiết',
                'image.required' => 'Hình ảnh bắt buộc phải có',
            ]
        );

        $post = new Post();
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->detail = $data['detail'];
        $post->status = $data['status'];
        $post->topic_id = $data['topic'];

        $get_image = $request->file('image');
        $get_name_image = $get_image->getClientOriginalName(); // Đúng cú pháp getClientOriginalName()
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); // Đúng cú pháp getClientOriginalExtension()
        $get_image->move(public_path('uploads/post_img'), $new_image);
        
        $post->image = $new_image;

        
        $post->save();
        return redirect()->back()->with('message', 'Thêm thành công');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post =  Post::find($id);
        return view('backend.post.show')->with(compact('post')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $topic = Topic::orderBy('id', 'DESC')->get();
        return view('backend.post.edit', compact('post', 'topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'slug' => 'max:255',
                'detail' => 'required|max:255',
                'status' => 'required',
                'topic' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif',

            ],
            [
                'title.required' => 'Bạn hãy tiêu đề',
                'detail.required' => 'Bạn hãy nhập chi tiết',
                'image.required' => 'Hình ảnh bắt buộc phải có',
            ]
        );

        $post =  Post::find($id);
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->detail = $data['detail'];
        $post->status = $data['status'];
        $post->topic_id = $data['topic'];

        $get_image = $request->file('image');
        $get_name_image = $get_image->getClientOriginalName(); // Đúng cú pháp getClientOriginalName()
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); // Đúng cú pháp getClientOriginalExtension()
        $get_image->move(public_path('uploads/post_img'), $new_image);
        
        $post->image = $new_image;

        
        $post->save();
        return redirect()->back()->with('message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::withTrashed()->find($id);
        $post->forceDelete(); 
        return redirect()->route('post.trash')->with('message', 'Xóa hoàn toàn bài viết thành công');
    }
    public function trash()
    {
    $post = Post::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.post.trash', compact('post'));
    }


    public function delete($id)
    {
    $post = Post::find($id);
    $post->delete(); // Thực hiện soft delete

    return redirect()->back()->with('message', 'Bài viết đã được đưa vào thùng rác!');
    }
    public function restore($id)
    {
            $post = Post::withTrashed()->find($id);
            $post->restore();
            return redirect()->route('post.trash')->with('message', 'Khôi phục thành công');
            
    }
}