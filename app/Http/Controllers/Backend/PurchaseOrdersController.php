<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurchaseOrders;


class PurchaseOrdersController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrders::orderBy('id', 'DESC')->get();
        return view('backend.purchaseOrders.index')->with(compact('purchaseOrders'));     
    }

    public function create()
    {
        $purchaseOrders = PurchaseOrders::orderBy('id', 'DESC')->get();
        return view('backend.purchaseOrders.create', compact('purchaseOrders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'supplier' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'supplier.required' => 'Bạn hãy nhập tên nhà cung cấp',
                'supplier.unique' => 'Tên nhà cung cấp đã tồn tại! Hãy nhập tên khác.',
            ]
        );
        
        $purchaseOrders = new PurchaseOrders();
        $purchaseOrders->supplier = $data['supplier'];
        $purchaseOrders->status = $data['status'];
        $purchaseOrders->save();
        return redirect()->route('purchaseOrders.create')->with('message', 'Thêm thành công');
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
        $purchaseOrders = PurchaseOrders::withTrashed()->find($id);
        $purchaseOrders->forceDelete(); 
        return redirect()->route('purchaseOrders.trash')->with('message', 'Xóa hoàn toàn thành công');
    }

    public function delete($id)
    {
        $purchaseOrders = PurchaseOrders::find($id);
        $purchaseOrders->delete(); // Thực hiện soft delete
        return redirect()->back()->with('message', 'Đơn nhập hàng đã được đưa vào thùng rác!');
    }
    public function trash()
    {
    $purchaseOrders = PurchaseOrders::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.purchaseOrders.trash', compact('purchaseOrders'));
    }
    public function restore($id)
    {
            $purchaseOrders = PurchaseOrders::withTrashed()->find($id);
            $purchaseOrders->restore();
            return redirect()->route('purchaseOrders.trash')->with('message', 'Khôi phục thành công');
            
    }

}
