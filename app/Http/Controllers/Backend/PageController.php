<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = Page::orderBy('id', 'DESC')->get();
        return view('backend.page.index')->with(compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|unique:page|max:255',
                'slug' => 'max:255',
                'content' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'title.required' => 'Bạn hãy nhập tiêu đề',
                'title.unique' => 'Tiêu đề đã tồn tại! Hãy nhập tiêu đề khác.',
                'content.required' => 'Bạn hãy nhập nội dung',
            ]
        );
        
        $page = new Page();
        $page->title = $data['title'];
        $page->slug = $data['slug'];
        $page->content = $data['content'];
        $page->status = $data['status'];
        $page->save();
        return redirect()->route('page.create')->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page =  Page::find($id);
        return view('backend.page.show')->with(compact('page')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page =  Page::find($id);
        return view('backend.page.edit')->with(compact('page'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $data = $request->validate(
                [
                    'title' => 'required|max:255',
                    'slug' => 'required|max:255',
                    'status' => 'required',
                    'content' => 'required',
        
                ],
                [
                    'name.required' => 'Bạn hãy tiêu đề',
                    'content.required' => 'Bạn hãy nhập nội dung',
                ]
        );
        
        $page =  Page::find($id);
        $page->title = $data['title'];
        $page->slug = $data['slug'];
        $page->content = $data['content'];
        $page->status = $data['status'];
        $page->save();
        return redirect()->back()->with('message', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = Page::withTrashed()->find($id);
        $page->forceDelete(); 
        return redirect()->route('page.trash')->with('message', 'Xóa hoàn toàn trang đơn thành công');
    }
    public function trash()
    {
    $page = Page::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.page.trash', compact('page'));
    }


    public function delete($id)
    {
    $page = Page::find($id);

    

    $page->delete(); // Thực hiện soft delete

    return redirect()->back()->with('message', 'Trang đơn đã được đưa vào thùng rác!');
    }
    public function restore($id)
    {
            $page = Page::withTrashed()->find($id);
            $page->restore();
            return redirect()->route('page.trash')->with('message', 'Khôi phục trang đơn thành công');
            
    }
}
