<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // protected $fillable=[
    //     'title',
    //     'body'
    // ];
    protected $guarded=[];
    public function path(){
        return route('posts.show',$this);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
