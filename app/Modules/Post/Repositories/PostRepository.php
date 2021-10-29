<?php

namespace Post\Repositories;

use App\GlobalService\ResponseService;
use Post\Models\Post;
use Illuminate\Support\Str;
use Image\Repositories\ImageInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class PostRepository implements PostInterface
{
    public $imageInterface ,$response;

    public function __construct(ImageInterface $imageInterface, ResponseService $responseService )
    {
         $this->imageInterface = $imageInterface;
          $this->response =  $responseService;
    }
    public function index(){
        return view('Post::backend.posts.index',compact('posts'));
    }

    public function getPosts()
    {
        $posts = Post::latest()->get();
        $view = view('Post::backend.posts.getPosts',compact('posts'))->render();
        return response()->json([
            'view' => $view
        ]);
    }

    public function show($id){
        $post = Post::with('postImages')->where('id',$id)->first();
        return view('Post::backend.posts.show',compact('post'));
    }

    public function create(){
        return view('Post::backend.posts.create');
    }

    public function store($request){
        //dd ($request->imageNames);
        $post= new Post();
        $post->post_title = ucwords($request->get('post_title'));
        $post->post_slug = Str::slug($request->get('post_title'));
        $post->post_status = $request->get('post_status');
        $post->is_published = $request->get('is_published');
        $post->post_content = $request->get('post_content');
        $post->user_id = 1 ;
        $post->save();
        $this->imageInterface->imagesStore($request->imageNames, $post->id);
        return true;
    }

    public function edit($id){
        $post = Post::with('postImages')->where('id',$id)->first();
        return view('Post::backend.posts.edit',compact('post'));
    }

    public function update($request, $id){
        // dd( $request->all());
        // dd($id);
        $post=Post::where('id', $id)->first();
        $post->post_title = ucwords($request->get('post_title'));
        $post->post_slug = Str::slug($request->get('post_title'));
        $post->post_status = $request->get('post_status');
        $post->is_published = $request->get('is_published');
        $post->post_content = $request->get('post_content');
        $post->user_id = 1;
        $post->save();
        if( $request->has('imageNames')){
            foreach($post->postImages as $postImage){
                if(file_exists(Storage::path( 'public/'.$postImage->imagePath.$postImage->imageName)))
                {
                    unlink(Storage::path('public/'.$postImage->imagePath.$postImage->imageName));
                }
            }
            $post->postImages()->delete();
            $this->imageInterface->imagesStore($request->imageNames, $id);
        }
        return true;
    }

    public function destroy($id){
        Post::where('id',$id)->delete();
        $posts = Post::latest()->get();
        return true;
    }

    public function undoDelete($id){
        Post::withTrashed()
            ->where('id',$id)
            ->restore();
        return true;
    }

    public function trashPost(){
        // return view('Post::backend.posts.trash');
    }

    public function getTrashPosts(){
        $trashPosts = Post::onlyTrashed()->get();
         $view = view('Post::backend.posts.getTrashPosts',compact('trashPosts'))->render();
         return response ()->json([
            'view' =>  $view
         ]);
    }

    public function permanentDelete($id){
        //$this->imageInterface->imagesDelete($id);
        Post::onlyTrashed()
            ->where('id',$id)
            ->forceDelete();
        return true;
    }

    public function statusUpdate($request, $id){
        $post = Post::where('id',$id)->first();
        $post->post_status = $request->post_status;
        // dd  ( $request->post_status);
        $post->save();
        $success = true;

        if($post->post_status === 1){
            $post_status_1 =  $post->post_status;
            $message = "The Post Is Active Now.";
        }else{
            $post_status_1 =  $post->post_status;
            $message = "The Post Is Inactive Now.";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
            'post_status_1' =>  $post_status_1,
        ]);
    }
    public function publishUpdate($request, $id){
        $post = Post::where('id',$id)->first();
        $post->is_published = $request->post_publish;
        $post->save();
        $success = true;
        if($post->is_published == 1){
            $message = "The Post Is Now Published.";
        }else{
            $message = "The Post Is Now Unpublished.";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function filterByDate($request){
        // dd( $request->all());
        $from =Carbon::parse ($request->start_date)->toDateTimeString();
        $to =  Carbon::parse ($request->end_date)->toDateTimeString();
        // dd  ($start_date);
        $posts = Post::whereDate('created_at','<=', $to)
                    ->whereDate('created_at','>=', $from)
                    ->get();
        $view = view('Post::backend.posts.postFilterDate',compact('posts'))->render();
        return response()->json([
             'view' => $view
        ]);
    }

}
