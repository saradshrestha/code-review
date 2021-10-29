<?php

namespace Post\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use User\Models\User;
use Image\Models\ImageUpload;
use Illuminate\Support\Facades\Storage;




class Post extends Model
{
   use softDeletes;
    protected $fillable = [
        'post_title','post_slug','post_status','is_published','post_content','user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function postImages(){
        return $this->hasMany(ImageUpload::class);
    }
    public function getImagesPath($postImage){
        $imageName = $postImage->imageName;
        $imagePath = $postImage->imagePath.$imageName;
        return Storage::url($imagePath);
    }
}

