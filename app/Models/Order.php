<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','user_id','delivery_name','delivery_email','delivery_phone','delivery_address','status','created_at','updated_at','note','created_by','updated_by'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'order';

    public function user()
    {
        return $this -> belongsTo('App\Models\User','user_id','id');
    }
    protected static function booted()
    {
        static::deleting(function ($order) {
            // Xóa mềm các bản ghi Orderdetail tương ứng
            $order->orderdetails()->delete();
        });
        static::restoring(function ($order) {
            // Khôi phục mềm các bản ghi Orderdetail tương ứng
            $order->orderdetails()->withTrashed()->restore();
        });
    }
    

    public function orderdetails()
    {
        return $this->hasMany(Orderdetail::class, 'order_id', 'id');
    }
}
