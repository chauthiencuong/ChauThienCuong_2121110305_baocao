<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','name','slug','meta_desc','status','created_at','updated_at','meta_key','created_by','updated_by'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'topic';
}
