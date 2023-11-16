<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Page;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $brand = Brand::orderBy('id', 'DESC')->get();
        $topic = Topic::orderBy('id', 'DESC')->get();
        $page = Page::orderBy('id', 'DESC')->get();
        $menu = Menu::orderBy('id', 'DESC')->get();

        return view('backend.menu.index')->with(compact('categories','brand','topic','page','menu'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.menu.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{   
    $data = $request->validate(
        [
            'name' => 'required|max:255',
            'status' => 'required',
        ],
        [
            'name.required' => 'Bạn hãy nhập menu',
            'name.unique' => 'Menu đã tồn tại! Hãy nhập menu khác.',
        ]
    );
    
    $menu = new Menu();
    $menu->name = $data['name'];
    $menu->status = $data['status'];
    $menu->save();
    return redirect()->route('menu.create')->with('message', 'Thêm thành công');



    // Kiểm tra xem biểu mẫu có được submit từ JavaScript hay không
    if ($request->input('form_submitted') == '1') {
        // Biểu mẫu được submit từ JavaScript

        if ($request->has('categories')) {
            // Xử lý Danh mục sách
            $selectedCategories = $request->input('categories');

            $categoryStatuses = [];

            foreach ($selectedCategories as $categoryId) {
                // Lấy trạng thái của category
                $category = Category::find($categoryId);

                // Thêm trạng thái của category vào mảng
                $categoryStatuses[] = $category->status;
            }

            // Lưu vào CSDL hoặc thực hiện các thao tác cần thiết
            // Đây là ví dụ, bạn cần điều chỉnh theo cấu trúc CSDL của bạn
            $menuName = Category::whereIn('id', $selectedCategories)->pluck('name')->implode(' ');
            $menuStatus = in_array(1, $categoryStatuses) ? 1 : 0;

            $menu = new Menu();
            $menu->name = $menuName;
            $menu->status = $menuStatus;
            $menu->save();

            // Gửi phản hồi về client (nếu cần)
            return redirect()->back()->with('message', 'Thêm thành công');
        }

        if ($request->has('brands')) {
            // Xử lý Thể loại sách
            $selectedBrand = $request->input('brands');

            $brandStatuses = [];

            foreach ($selectedBrand as $brandId) {
                // Lấy trạng thái của brand
                $brand = Brand::find($brandId);

                // Thêm trạng thái của brand vào mảng
                $brandStatuses[] = $brand->status;
            }

            // Lưu vào CSDL hoặc thực hiện các thao tác cần thiết
            // Đây là ví dụ, bạn cần điều chỉnh theo cấu trúc CSDL của bạn
            $menuName = Brand::whereIn('id', $selectedBrand)->pluck('name')->implode(' ');
            $menuStatus = in_array(1, $brandStatuses) ? 1 : 0;

            $menu = new Menu();
            $menu->name = $menuName;
            $menu->status = $menuStatus;
            $menu->save();

            // Gửi phản hồi về client (nếu cần)
            return redirect()->back()->with('message', 'Thêm thành công');
        }

        if ($request->has('topics')) {
            // Xử lý Thể loại sách
            $selectedTopic = $request->input('topics');

            $topicStatuses = [];

            foreach ($selectedTopic as $brandId) {
                // Lấy trạng thái của brand
                $brand = Topic::find($brandId);

                // Thêm trạng thái của brand vào mảng
                $topicStatuses[] = $brand->status;
            }

            // Lưu vào CSDL hoặc thực hiện các thao tác cần thiết
            // Đây là ví dụ, bạn cần điều chỉnh theo cấu trúc CSDL của bạn
            $menuName = Topic::whereIn('id', $selectedTopic)->pluck('name')->implode(' ');
            $menuStatus = in_array(1, $topicStatuses) ? 1 : 0;

            $menu = new Menu();
            $menu->name = $menuName;
            $menu->status = $menuStatus;
            $menu->save();

            // Gửi phản hồi về client (nếu cần)
            return redirect()->back()->with('message', 'Thêm thành công');
        }

        if ($request->has('pages')) {
            // Xử lý Thể loại sách
            $selectedPage = $request->input('pages');

            $pageStatuses = [];

            foreach ($selectedPage as $brandId) {
                // Lấy trạng thái của brand
                $page = Page::find($brandId);

                // Thêm trạng thái của brand vào mảng
                $pageStatuses[] = $page->status;
            }

            // Lưu vào CSDL hoặc thực hiện các thao tác cần thiết
            // Đây là ví dụ, bạn cần điều chỉnh theo cấu trúc CSDL của bạn
            $menuName = Page::whereIn('id', $selectedPage)->pluck('title')->implode(' ');
            $menuStatus = in_array(1, $pageStatuses) ? 1 : 0;

            $menu = new Menu();
            $menu->name = $menuName;
            $menu->status = $menuStatus;
            $menu->save();

            // Gửi phản hồi về client (nếu cần)
            return redirect()->back()->with('message', 'Thêm thành công');
        }
    }
}



public function delete($id)
    {
    $menu = Menu::find($id);

    

    $menu->delete(); // Thực hiện soft delete

    return redirect()->back()->with('message', 'Menu đã được đưa vào thùng rác!');
    }
    
    public function trash()
    {
    $menu = Menu::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.menu.trash', compact('menu'));
    }
    public function restore($id)
    {
            $menu = Menu::withTrashed()->find($id);
            $menu->restore();
            return redirect()->route('menu.trash')->with('message', 'Khôi phục menu thành công');
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu =  Menu::find($id);
        return view('backend.menu.show')->with(compact('menu')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu =  Menu::find($id);
        return view('backend.menu.edit')->with(compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'name.required' => 'Bạn hãy nhập menu',
                'name.unique' => 'Menu đã tồn tại! Hãy nhập menu khác.',
            ]
        );
        
        $menu =  Menu::find($id);
        $menu->name = $data['name'];
        $menu->status = $data['status'];
        $menu->save();
        return redirect()->route('menu.edit', $id)->with('message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::withTrashed()->find($id);
        $menu->forceDelete(); 
        return redirect()->route('menu.trash')->with('message', 'Xóa hoàn toàn menu thành công');
    }
}
