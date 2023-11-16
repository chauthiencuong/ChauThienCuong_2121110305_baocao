<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','name','slug','meta_desc','status','created_at','updated_at'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'category';// nếu đặt tên table là DanhMucTruyen thì không cần khai báo dòng này
}
