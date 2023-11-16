<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','name','email','phone','status','created_at','updated_at','address'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'customer';
}
