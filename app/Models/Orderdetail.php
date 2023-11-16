<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orderdetail extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','order_id','product_id','price','status','created_at','updated_at'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'orderdetail';

    public function order()
    {
        return $this -> belongsTo('App\Models\Order','order_id','id');
    }
    public function product()
    {
        return $this -> belongsTo('App\Models\Product','product_id','id');
    }
}
