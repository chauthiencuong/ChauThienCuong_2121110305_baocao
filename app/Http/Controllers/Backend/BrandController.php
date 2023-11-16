<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::orderBy('id', 'DESC')->get();
        return view('backend.brand.index')->with(compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.create');
    }
    public function delete($id)
{
    $brand = Brand::find($id);

    

    $brand->delete(); // Thực hiện soft delete

    return redirect()->back()->with('message', 'Thể loại đã được đưa vào thùng rác!');
}
public function restore($id)
{
    $brand = Brand::withTrashed()->find($id);

    

    if ($brand->restore()) {
        return redirect()->route('brand.trash')->with('message', 'Khôi phục thể loại thành công');
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:brand|max:255',
                'slug' => 'max:255',
                'meta_desc' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'name.required' => 'Bạn hãy nhập tên thể loại',
                'name.unique' => 'Tên thể loại đã tồn tại! Hãy nhập tên thể loại khác.',
                'meta_desc.required' => 'Bạn hãy nhập mô tả',
            ]
        );

        $brand = new Brand();
        $brand->name = $data['name'];
        $brand->slug = $data['slug'];
        $brand->meta_desc = $data['meta_desc'];
        $brand->status = $data['status'];
        $brand->save();
        return redirect()->route('brand.create')->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand =  Brand::find($id);
        return view('backend.brand.show')->with(compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand =  Brand::find($id);
        return view('backend.brand.edit')->with(compact('brand'));
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
                'name.unique' => 'Thể loại đã tồn tại! Hãy nhập thể loại khác.',
                'name.required' => 'Bạn hãy nhập tên thể loại',
                'meta_desc.required' => 'Bạn hãy nhập mô tả',
            ]
        );
        $brand =  Brand::find($id);
        $brand->name = $data['name'];
        $brand->slug = $data['slug'];
        $brand->meta_desc = $data['meta_desc'];
        $brand->status = $data['status'];
        $brand->save();
        return redirect()->back()->with('message', 'Cập nhật thể loại thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::withTrashed()->find($id);

    
        $brand->forceDelete(); // Sử dụng forceDelete để xóa hoàn toàn bản ghi
    
        return redirect()->route('brand.trash')->with('message', 'Xóa hoàn toàn thể loại thành công');
    }
    public function trash()
    {
        $brand = Brand::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
        return view('backend.brand.trash', compact('brand'));
    }

    
}
