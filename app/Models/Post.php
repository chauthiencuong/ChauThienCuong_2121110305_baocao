<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id','topic_id','title','slug','detail','status','image','created_at','updated_at','created_by','updated_by'
    ];//gán giá trị
    protected $primaryKey = 'id';
    protected $table = 'post';

    public function topic()
    {
        return $this -> belongsTo('App\Models\Topic','topic_id','id');
    }
}


