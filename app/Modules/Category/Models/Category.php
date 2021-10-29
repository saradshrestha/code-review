<?php

namespace Category\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;
    protected $fillables = [
        'title','slug','parent_id','status',
    ];

    public function parent(){
         return $this->belongsTo('Category\Models\Category','parent_id');
    }

    public function child(){
        return $this->hasMany('Category\Models\Category','parent_id');
   }

}
