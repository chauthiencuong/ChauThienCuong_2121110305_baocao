<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shipments;
use App\Models\Order;

class ShipmentsController extends Controller
{
    public function index()
    {
        $shipments = Shipments::orderBy('id', 'DESC')->get();
        return view('backend.shipments.index')->with(compact('shipments'));     
    }

    public function create()
    {
        $order = Order::orderBy('id', 'DESC')->get();
        return view('backend.shipments.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'status' => 'required',
                'order' => 'required',
            ],
            
        );
        
        $shipments = new Shipments();
        $shipments->status = $data['status'];
        $shipments->order_id = $data['order'];
        $shipments->save();
        return redirect()->route('shipments.create')->with('message', 'Thêm thành công');
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
        $shipments = Shipments::withTrashed()->find($id);
       $shipments->forceDelete(); 
        return redirect()->route('shipments.trash')->with('message', 'Xóa hoàn toàn thành công');
    }

    public function delete($id)
    {
        $shipments = Shipments::find($id);
$shipments->delete(); // Thực hiện soft delete
        return redirect()->back()->with('message', 'Đơn nhập hàng đã được đưa vào thùng rác!');
    }
    public function trash()
    {
    $shipments = Shipments::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
    return view('backend.shipments.trash', compact('shipments'));
    }
    public function restore($id)
    {
            $shipments = Shipments::withTrashed()->find($id);
            $shipments->restore();
            return redirect()->route('shipments.trash')->with('message', 'Khôi phục thành công');
            
    }
}
