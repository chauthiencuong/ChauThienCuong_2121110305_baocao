<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShipmentDetails;
use App\Models\Shipments;
use App\Models\Product;


class ShipmentDetailsController extends Controller
{
    public function index()
    {
        $shipmentDetails = ShipmentDetails::orderBy('id', 'DESC')->get();
        return view('backend.shipmentDetails.index')->with(compact('shipmentDetails'));     
    }

    public function create()
    {
        $shipments = Shipments::orderBy('id', 'DESC')->get();
        $product = Product::orderBy('id', 'DESC')->get();
        return view('backend.shipmentDetails.create', compact('shipments','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'qty' => 'required',
            'status' => 'required',
            'product' => 'required',
            'shipments' => 'required',
        ]);
    
        $shipmentDetails = new ShipmentDetails();
        $shipmentDetails->qty = $data['qty'];  
        $shipmentDetails->status = $data['status'];
        $shipmentDetails->product_id = $data['product'];
        $shipmentDetails->shipments_id = $data['shipments'];
        $shipmentDetails->save();
    
        return redirect()->route('shipmentDetails.create')->with('message', 'Thêm thành công');
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
        //$purchaseOrders = PurchaseOrders::withTrashed()->find($id);
       // $purchaseOrders->forceDelete(); 
       // return redirect()->route('purchaseOrders.trash')->with('message', 'Xóa hoàn toàn thành công');
    }

    public function delete($id)
    {
        $shipmentDetails = ShipmentDetails::find($id);
$shipmentDetails->delete(); // Thực hiện soft delete
        return redirect()->back()->with('message', 'Đơn nhập hàng đã được đưa vào thùng rác!');
    }
    public function trash()
    {
    $shipmentDetails = ShipmentDetails::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.shipmentDetails.trash', compact('shipmentDetails'));
    }
    public function restore($id)
    {
            $shipmentDetails = ShipmentDetails::withTrashed()->find($id);
            $shipmentDetails->restore();
            return redirect()->route('shipmentDetails.trash')->with('message', 'Khôi phục thành công');
            
    }
}
