<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderdetail = Orderdetail::orderBy('id', 'DESC')->get();
        return view('backend.orderdetail.index')->with(compact('orderdetail'));
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = Order::orderBy('id', 'DESC')->get();
        $product = Product::orderBy('id', 'DESC')->get();
        return view('backend.orderdetail.create', compact('order','product'));
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $data = $request->validate(
            [
                'price' => 'required',
                'status' => 'required',
                'product' => 'required',
                'order' => 'required',
            ],
            
        );
        
        $orderdetail = new Orderdetail();
        $orderdetail->price = $data['price'];
        $orderdetail->status = $data['status'];
        $orderdetail->product_id = $data['product'];
        $orderdetail->order_id = $data['order'];
        $orderdetail->save();
        return redirect()->route('orderdetail.create')->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $orderdetail = Orderdetail::withTrashed()->find($id);
        $orderdetail->forceDelete(); 
        return redirect()->route('orderdetail.trash')->with('message', 'Xóa hoàn toàn thành công');
    }

    public function delete($id)
    {
        $orderdetail = Orderdetail::find($id);
        $orderdetail->delete(); // Thực hiện soft delete
        return redirect()->back()->with('message', 'Đơn hàng đã được đưa vào thùng rác!');
    }
public function trash()
    {
    $orderdetail = Orderdetail::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.orderdetail.trash', compact('orderdetail'));
    }
    public function restore($id)
    {
            $orderdetail = Orderdetail::withTrashed()->find($id);
            $orderdetail->restore();
            return redirect()->route('orderdetail.trash')->with('message', 'Khôi phục thành công');
            
    }

}