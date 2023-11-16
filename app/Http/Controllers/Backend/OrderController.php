<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Orderdetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::orderBy('id', 'DESC')->get();
        return view('backend.order.index')->with(compact('order'));  
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::orderBy('id', 'DESC')->get();
        return view('backend.order.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'delivery_name' => 'required|max:255',
                'delivery_email' => 'max:255',
                'delivery_phone' => 'required|max:11',
                'delivery_address' => 'required|max:1000',
                'status' => 'required',
                'user' => 'required',
                'note' => 'required',
            ],
            [
                'delivery_name.required' => 'Bạn hãy nhập tên người nhận',
                'delivery_name.unique' => 'Tên người nhận đã tồn tại! Hãy nhập tên khác.',
                'delivery_email.required' => 'Bạn hãy nhập email',
                'delivery_phone.required' => 'Bạn hãy nhập phone',
                'delivery_email.required' => 'Bạn hãy nhập mô tả',
                'delivery_address.required' => 'Bạn hãy nhập địa chỉ',
                'note.required' => 'Bạn hãy nhập ghi chú',
            ]
        );
        
        $order = new Order();
        $order->delivery_name = $data['delivery_name'];
        $order->delivery_email = $data['delivery_email'];
        $order->delivery_phone = $data['delivery_phone'];
        $order->delivery_address = $data['delivery_address'];
        $order->status = $data['status'];
        $order->user_id = $data['user'];
        $order->note = $data['note'];
        $order->save();
        return redirect()->route('order.create')->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order =  Order::find($id);
        return view('backend.order.show')->with(compact('order')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::withTrashed()->find($id);
        $order->forceDelete(); 
        return redirect()->route('order.trash')->with('message', 'Xóa hoàn toàn thành công');
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete(); // Thực hiện soft delete
        return redirect()->back()->with('message', 'Đơn hàng đã được đưa vào thùng rác!');
    }
    public function trash()
    {
    $order = Order::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.order.trash', compact('order'));
    }
    public function restore($id)
    {
            $order = Order::withTrashed()->find($id);
            $order->restore();
            return redirect()->route('order.trash')->with('message', 'Khôi phục thành công');
            
    }

}
