<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrders extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','supplier','status','created_at','updated_at'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'purchaseOrders';

    protected static function booted()
    {
        static::deleting(function ($purchaseOrders) {
            $purchaseOrders->purchaseOrderDetails()->delete();
        });
        static::restoring(function ($purchaseOrders) {
            // Khôi phục mềm các bản ghi Orderdetail tương ứng
            $purchaseOrders->purchaseOrderDetails()->withTrashed()->restore();
        });
    }
    

    public function purchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetails::class, 'purchaseOrders_id', 'id');
    }
}
