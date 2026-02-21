<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSuivi extends Model
{
    use HasFactory;    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id','id');
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class, 'lesson_id','id');
    }
}
