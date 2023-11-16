<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Topic;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topic = Topic::orderBy('id', 'DESC')->get();
        return view('backend.topic.index')->with(compact('topic'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.topic.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:topic|max:255',
                'slug' => 'max:255',
                'meta_desc' => 'required|max:255',
                'meta_key' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'name.required' => 'Bạn hãy nhập tên chủ đề',
                'name.unique' => 'Tên chủ đề đã tồn tại! Hãy nhập tên chủ đề khác.',
                'meta_desc.required' => 'Bạn hãy nhập mô tả',
                'meta_key.required' => 'Bạn hãy nhập từ khóa',
            ]
        );
        
        $topic = new Topic();
        $topic->name = $data['name'];
        $topic->slug = $data['slug'];
        $topic->meta_desc = $data['meta_desc'];
        $topic->meta_key = $data['meta_key'];
        $topic->status = $data['status'];
        $topic->save();
        return redirect()->route('topic.create')->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic =  Topic::find($id);
        return view('backend.topic.show')->with(compact('topic')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic =  Topic::find($id);
        return view('backend.topic.edit')->with(compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:topic|max:255',
                'slug' => 'max:255',
                'meta_desc' => 'required|max:255',
                'meta_key' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'name.required' => 'Bạn hãy nhập tên chủ đề',
                'name.unique' => 'Tên chủ đề đã tồn tại! Hãy nhập tên chủ đề khác.',
                'meta_desc.required' => 'Bạn hãy nhập mô tả',
                'meta_key.required' => 'Bạn hãy nhập từ khóa',
            ]
        );
        
        $topic =  Topic::find($id);
        $topic->name = $data['name'];
        $topic->slug = $data['slug'];
        $topic->meta_desc = $data['meta_desc'];
        $topic->meta_key = $data['meta_key'];
        $topic->status = $data['status'];
        $topic->save();
        return redirect()->back()->with('message', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::withTrashed()->find($id);
        $topic->forceDelete(); 
        return redirect()->route('topic.trash')->with('message', 'Xóa hoàn toàn chủ dề thành công');
    }
    public function trash()
    {
    $topic = Topic::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.topic.trash', compact('topic'));
    }


    public function delete($id)
    {
    $topic = Topic::find($id);

    

    $topic->delete(); // Thực hiện soft delete

    return redirect()->back()->with('message', 'Chủ đề bài viết đã được đưa vào thùng rác!');
    }
    public function restore($id)
    {
            $topic = Topic::withTrashed()->find($id);
            $topic->restore();
            return redirect()->route('topic.trash')->with('message', 'Khôi phục chủ đề thành công');
            
    }
}