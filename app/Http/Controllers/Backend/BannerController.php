<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::orderBy('id', 'DESC')->get();
        return view('backend.banner.index')->with(compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.banner.create');
    }
    public function delete($id)
{
    $banner = banner::find($id);

    

    $banner->delete(); // Thực hiện soft delete

    return redirect()->back()->with('message', 'Banner đã được đưa vào thùng rác!');
}
public function restore($id)
{
    $banner = banner::withTrashed()->find($id);

    

    if ($banner->restore()) {
        return redirect()->route('banner.trash')->with('message', 'Khôi phục banner thành công');
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:banner|max:255',
                'description' => 'required|max:255',
                'status' => 'required',
                'link' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif',

            ],
            [
                'name.required' => 'Bạn hãy tên banner',
                'name.unique' => 'Tên banner đã tồn tại! Hãy nhập tên banner khác.',
                'description.required' => 'Bạn hãy nhập mô tả',
                'image.required' => 'Hình ảnh bắt buộc phải có',
            ]
        );

        $banner = new Banner();
        $banner->name = $data['name'];
        $banner->description = $data['description'];
        $banner->link = $data['link'];
        $banner->status = $data['status'];

        $get_image = $request->file('image');
        $get_name_image = $get_image->getClientOriginalName(); // Đúng cú pháp getClientOriginalName()
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); // Đúng cú pháp getClientOriginalExtension()
        $get_image->move(public_path('uploads/banner_img'), $new_image);
        
        $banner->image = $new_image;

        
        $banner->save();
        return redirect()->back()->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner =  Banner::find($id);
        return view('backend.banner.show')->with(compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner =  Banner::find($id);
        return view('backend.banner.edit')->with(compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $data = $request->validate(
        [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required',
            'link' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif',

        ],
        [
            'name.required' => 'Bạn hãy tên banner',
            'description.required' => 'Bạn hãy nhập mô tả',
            'image.required' => 'Hình ảnh bắt buộc phải có',
        ]
    );

    $banner = Banner::find($id);
    $banner->name = $data['name'];
    $banner->description = $data['description'];
    $banner->link = $data['link'];
    $banner->status = $data['status'];

    $get_image = $request->file('image');
    $get_name_image = $get_image->getClientOriginalName(); // Đúng cú pháp getClientOriginalName()
    $name_image = current(explode('.', $get_name_image));
    $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); // Đúng cú pháp getClientOriginalExtension()
    $get_image->move(public_path('uploads/banner_img'), $new_image);
    
    $banner->image = $new_image;

    
    $banner->save();
    return redirect()->back()->with('message', 'Cập nhật thành công');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = banner::withTrashed()->find($id);

    
        $banner->forceDelete(); // Sử dụng forceDelete để xóa hoàn toàn bản ghi
    
        return redirect()->route('banner.trash')->with('message', 'Xóa hoàn toàn banner thành công');
    }
    public function trash()
    {
        $banner = banner::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
        return view('backend.banner.trash', compact('banner'));
    }

    
}
