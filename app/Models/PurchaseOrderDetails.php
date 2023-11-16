<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrderDetails extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','purchaseOrder_id','status','created_at','updated_at','product_id','qty','price'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'purchaseOrderDetails';

    public function product()
    {
    return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
public function purchaseOrders()
    {
        return $this -> belongsTo('App\Models\PurchaseOrders','purchaseOrders_id','id');
    }

}
