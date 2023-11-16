<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','user_id','name','email','phone','title','content','created_at','updated_at'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'contact';

    public function user()
    {
        return $this -> belongsTo('App\Models\User','user_id','id');
    }
}
