<?php

namespace Image\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Post\Models\Post;

class ImageUpload extends Model
{
    protected $table = 'images';
    protected $fillables = [
        'imageName','imageType','imageExt','imageSize','post_id','imagePath',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
