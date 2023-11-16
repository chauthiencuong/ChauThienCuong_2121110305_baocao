<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','name','slug','meta_desc','meta_key','status','created_at','updated_at','category_id','brand_id','price','image'
    ];
    protected $primaryKey = 'id';
    protected $table = 'product';

    public function category()
    {
        return $this -> belongsTo('App\Models\Category','category_id','id');
    }
    public function brand()
    {
        return $this -> belongsTo('App\Models\Brand','brand_id','id');
    }
}
    