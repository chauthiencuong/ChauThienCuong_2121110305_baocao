<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','name','link','level','parent_id','created_at','updated_at','created_by','updated_by','type','table_id','status'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'menu';
}
