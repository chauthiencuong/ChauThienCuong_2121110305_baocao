<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::orderBy('id', 'DESC')->get();
        return view('backend.customer.index')->with(compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customer.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'max:255',
                'phone' => 'required|max:11',
                'address' => 'required|max:1000',
                'status' => 'required',
            ],
            [
                'name.required' => 'Bạn hãy nhập tên khách hàng',
                'name.unique' => 'Tên  khách hàng đã tồn tại! Hãy nhập tên khác.',
                'email.required' => 'Bạn hãy nhập email',
                'phone.required' => 'Bạn hãy nhập phone',
                'email.required' => 'Bạn hãy nhập mô tả',
                'address.required' => 'Bạn hãy nhập địa chỉ',
            ]
        );
        
        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->address = $data['address'];
        $customer->status = $data['status'];
        $customer->save();
        return redirect()->route('customer.create')->with('message', 'Thêm thành công');
    }
    public function trash()
    {
    $customer = Customer::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.customer.trash', compact('customer'));
    }


    public function delete($id)
    {
    $customer = Customer::find($id);

    

    $customer->delete(); // Thực hiện soft delete

    return redirect()->back()->with('message', 'Khách hàng đã được đưa vào thùng rác!');
    }
    public function restore($id)
    {
            $customer = Customer::withTrashed()->find($id);
            $customer->restore();
            return redirect()->route('customer.trash')->with('message', 'Khôi phục thành công');
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer =  Customer::find($id);
        return view('backend.customer.show')->with(compact('customer')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer =  Customer::find($id);
        return view('backend.customer.edit')->with(compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'max:255',
                'phone' => 'required|max:11',
                'address' => 'required|max:1000',
                'status' => 'required',
            ],
            [
                'name.required' => 'Bạn hãy nhập tên khách hàng',
                'name.unique' => 'Tên  khách hàng đã tồn tại! Hãy nhập tên khác.',
                'email.required' => 'Bạn hãy nhập email',
                'phone.required' => 'Bạn hãy nhập phone',
                'email.required' => 'Bạn hãy nhập mô tả',
                'address.required' => 'Bạn hãy nhập địa chỉ',
            ]
        );
        
        $customer = Customer::find($id);
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->address = $data['address'];
        $customer->status = $data['status'];
        $customer->save();
        return redirect()->route('customer.create')->with('message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $customer = Customer::withTrashed()->find($id);
        $customer->forceDelete(); 
        return redirect()->route('customer.trash')->with('message', 'Xóa hoàn toàn thành công');
    }
}
