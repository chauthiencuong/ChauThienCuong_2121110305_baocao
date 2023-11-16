<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipmentDetails extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','shipments_id','status','created_at','updated_at','product_id','qty'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'shipmentdetails';

    public function order()
    {
        return $this -> belongsTo('App\Models\Shipments','shipments_id','id');
    }
    public function product()
    {
        return $this -> belongsTo('App\Models\Product','product_id','id');
    }
}
