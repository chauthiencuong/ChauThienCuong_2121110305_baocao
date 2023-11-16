<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurchaseOrderDetails;
use App\Models\PurchaseOrder;
use App\Models\Product;
use App\Models\PurchaseOrders;

class PurchaseOrderDetailsController extends Controller
{
    public function index()
    {
        $purchaseOrderDetails = PurchaseOrderDetails::orderBy('id', 'DESC')->get();
        return view('backend.purchaseOrderDetails.index')->with(compact('purchaseOrderDetails'));     
    }

    public function create()
    {
        $purchaseOrders = PurchaseOrders::orderBy('id', 'DESC')->get();
        $product = Product::orderBy('id', 'DESC')->get();

        return view('backend.purchaseOrderDetails.create', compact('purchaseOrders','product'));
    }
    public function store(Request $request)
{
    $data = $request->validate([
        'qty' => 'required',
        'price' => 'required',  
        'status' => 'required',
        'product' => 'required',
        'purchaseOrders' => 'required',
    ]);

    $purchaseOrderDetails = new PurchaseOrderDetails();
    $purchaseOrderDetails->qty = $data['qty'];  // Corrected from 'price'
    $purchaseOrderDetails->price = $data['price'];
    $purchaseOrderDetails->status = $data['status'];
    $purchaseOrderDetails->product_id = $data['product'];
    $purchaseOrderDetails->purchaseOrders_id = $data['purchaseOrders'];
    $purchaseOrderDetails->save();

    return redirect()->route('purchaseOrderDetails.create')->with('message', 'Thêm thành công');
}


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
        $purchaseOrderDetails = PurchaseOrderDetails::withTrashed()->find($id);
        $purchaseOrderDetails->forceDelete(); 
        return redirect()->route('purchaseOrderDetails.trash')->with('message', 'Xóa hoàn toàn thành công');
    }

    public function delete($id)
    {
        $purchaseOrderDetails = PurchaseOrderDetails::find($id);
        $purchaseOrderDetails->delete(); // Thực hiện soft delete
        return redirect()->back()->with('message', 'Đơn nhập hàng đã được đưa vào thùng rác!');
    }
    public function trash()
    {
    $purchaseOrderDetails = PurchaseOrderDetails::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.purchaseOrderDetails.trash', compact('purchaseOrderDetails'));
    }
    public function restore($id)
    {
            $purchaseOrderDetails = PurchaseOrderDetails::withTrashed()->find($id);
            $purchaseOrderDetails->restore();
            return redirect()->route('purchaseOrderDetails.trash')->with('message', 'Khôi phục thành công');
            
    }
}
