<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $product = Product::orderBy('id', 'DESC')->get();
        return view('backend.product.index')->with(compact('product'));
    }
    public function trash()
    {

    $product = Product::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.product.trash', compact('product'));
    }
     public function delete($id)
     {
        $product = Product::find($id);
        $product->delete(); 
        return redirect()->back()->with('message', 'Danh mục đã được đưa vào thùng rác!');
     }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        $brand = Brand::orderBy('id', 'DESC')->get();

        return view('backend.product.create', compact('category', 'brand'));
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
                'meta_key' => 'required|max:255',
                'price' => 'required|max:255',
                'status' => 'required',
                'category' => 'required',
                'brand' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif',

            ],
            [
                'name.required' => 'Bạn hãy nhập tên sản phẩm',
                'name.unique' => 'Tên sản phẩm đã tồn tại! Hãy nhập tên sản phẩm khác.',
                'meta_desc.required' => 'Bạn hãy nhập mô tả',
                'meta_key.required' => 'Bạn hãy nhập từ khóa',
                'price.required' => 'Bạn hãy nhập giá tiền',
                'image.required' => 'Hình ảnh bắt buộc phải có',
            ]
        );

        $product = new Product();
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->slug = $data['slug'];
        $product->meta_desc = $data['meta_desc'];
        $product->meta_key = $data['meta_key'];
        $product->status = $data['status'];
        $product->category_id = $data['category'];
        $product->brand_id = $data['brand'];

        $get_image = $request->file('image');
        $get_name_image = $get_image->getClientOriginalName(); // Đúng cú pháp getClientOriginalName()
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); // Đúng cú pháp getClientOriginalExtension()
        $get_image->move(public_path('uploads/product_img'), $new_image);
        
        $product->image = $new_image;

        
        $product->save();
        return redirect()->back()->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product =  Product::find($id);
        return view('backend.product.show')->with(compact('product')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('id', 'DESC')->get();
        $brand = Brand::orderBy('id', 'DESC')->get();
        return view('backend.product.edit', compact('product', 'category', 'brand'));
    }
    

    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:category|max:255',
                'slug' => 'max:255',
                'meta_desc' => 'required|max:255',
                'meta_key' => 'required|max:255',
                'price' => 'required|max:255',
                'status' => 'required',
                'category' => 'required',
                'brand' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif',

            ],
            [
                'name.required' => 'Bạn hãy nhập tên sản phẩm',
                'name.unique' => 'Tên sản phẩm đã tồn tại! Hãy nhập tên sản phẩm khác.',
                'meta_desc.required' => 'Bạn hãy nhập mô tả',
                'meta_key.required' => 'Bạn hãy nhập từ khóa',
                'price.required' => 'Bạn hãy nhập giá tiền',
                'image.required' => 'Hình ảnh bắt buộc phải có',
            ]
        );

        $product =  Product::find($id);
        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->slug = $data['slug'];
        $product->meta_desc = $data['meta_desc'];
        $product->meta_key = $data['meta_key'];
        $product->status = $data['status'];
        $product->category_id = $data['category'];
        $product->brand_id = $data['brand'];

        $get_image = $request->file('image');
        $get_name_image = $get_image->getClientOriginalName(); // Đúng cú pháp getClientOriginalName()
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); // Đúng cú pháp getClientOriginalExtension()
        $get_image->move(public_path('uploads/product_img'), $new_image);
        
        $product->image = $new_image;

        
        $product->save();
        return redirect()->back()->with('message', 'Cập nhật thành công!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function destroy($id)
    {
        $product = Product::withTrashed()->find($id);
        $product->forceDelete(); 
        return redirect()->route('product.trash')->with('message', 'Xóa hoàn toàn sản phẩm thành công');
    }
    
    
    
    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);
        $product->restore();
        return redirect()->route('product.trash')->with('message', 'Khôi phục sản phẩm thành công');
        }
 }
    
    
    

    

