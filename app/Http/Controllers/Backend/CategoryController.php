<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('backend.category.index')->with(compact('category'));
    }

    public function trash()
{
    $category = Category::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.category.trash', compact('category'));
}


    public function delete($id)
{
    $category = Category::find($id);

    if (!$category) {
        return redirect()->back()->with('error', 'Danh mục không tồn tại');
    }

    $category->delete(); // Thực hiện soft delete

    return redirect()->back()->with('message', 'Danh mục đã được đưa vào thùng rác!');
}


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:category|max:255',
                'slug' => 'max:255',
                'meta_desc' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'name.required' => 'Bạn hãy nhập tên danh mục',
                'name.unique' => 'Tên danh mục đã tồn tại! Hãy nhập tên danh mục khác.',
                'meta_desc.required' => 'Bạn hãy nhập mô tả',
            ]
        );
        
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->meta_desc = $data['meta_desc'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->route('category.create')->with('message', 'Thêm thành công');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category =  Category::find($id);
        return view('backend.category.show')->with(compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category =  Category::find($id);
        return view('backend.category.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'slug' => 'max:255',
                'meta_desc' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'name.unique' => 'Tên danh mục đã tồn tại! Hãy nhập tên danh mục khác.',
                'name.required' => 'Bạn hãy nhập tên danh mục',
                'meta_desc.required' => 'Bạn hãy nhập mô tả',
            ]
        );
        $category =  Category::find($id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->meta_desc = $data['meta_desc'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->back()->with('message', 'Cập nhật danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $category = Category::withTrashed()->find($id);

    if (!$category) {
        return redirect()->route('category.trash')->with('error', 'Không tìm thấy danh mục trong thùng rác');
    }

    $category->forceDelete(); // Sử dụng forceDelete để xóa hoàn toàn bản ghi

    return redirect()->route('category.trash')->with('message', 'Xóa hoàn toàn danh mục thành công');
}



public function restore($id)
{
    $category = Category::withTrashed()->find($id);

    if (!$category) {
        return redirect()->route('category.trash')->with('error', 'Không tìm thấy danh mục trong thùng rác');
    }

    if ($category->restore()) {
        return redirect()->route('category.trash')->with('message', 'Khôi phục danh mục thành công');
    }
}



}
