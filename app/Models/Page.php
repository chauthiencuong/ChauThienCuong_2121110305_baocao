<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Page extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','title','slug','content','status','created_at','updated_at','created_by','updated_by'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'page';
}
