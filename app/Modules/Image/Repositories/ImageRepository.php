<?php

namespace Image\Repositories;

use Image\Models\ImageUpload;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Session;
use Post\Models\Post;


class ImageRepository implements ImageInterface
{
    public function imagesStore($imageNames, $id){
        //dd($imageNames);
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $imagePath ='upload/'.$year.'/'.$month.'/';
        if (!Storage::path('public/'.$imagePath)) {
            Storage::makeDirectory($imagePath,0777,true,true);
        }
        foreach($imageNames as $imageName){
            $originalImage =  $imageName;
            $imageExt = strtolower($originalImage->getClientOriginalExtension());
            $imageSize = filesize($originalImage);
            $imageType = "image"; //Using Manual way to define file type for image
            $editedImage = Image::make($originalImage);
            $editedImage->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put('public/'.$imagePath.time().$originalImage->getClientOriginalName(), $editedImage->stream());
            $imageStore= new ImageUpload();
            $imageStore->imageType = $imageType;
            $imageStore->imageSize = $imageSize;
            $imageStore->imageExt =  $imageExt;
            $imageStore->post_id = $id;
            $imageStore->imagePath = $imagePath;
            $imageStore->imageName = time().$originalImage->getClientOriginalName();
            $imageStore->save();
        }
    }


    public function imagesDelete($id){
        $post= Post::onlyTrashed()->where('id', $id)->first();
        foreach($post->postImages as $postImage){
            if(file_exists(Storage::path( 'public/'.$postImage->imagePath.$postImage->imageName))){
                unlink(Storage::path('public/'.$postImage->imagePath.$postImage->imageName));
                }
        }
    }

}
