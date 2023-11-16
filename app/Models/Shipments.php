<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipments extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','order_id','status','created_at','updated_at'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'shipments';

    protected static function booted()
    {
        static::deleting(function ($shipments) {
            $shipments->ShipmentDetails()->delete();
        });
        static::restoring(function ($shipments) {
            $shipments->ShipmentDetails()->withTrashed()->restore();
        });
    }
    

    public function ShipmentDetails()
    {
        return $this->hasMany(ShipmentDetails::class, 'shipments_id', 'id');
    }

    
}
