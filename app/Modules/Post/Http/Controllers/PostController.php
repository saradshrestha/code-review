<?php

namespace Post\Http\Controllers;
use App\Http\Controllers\Controller;
use Post\Http\Requests\Post\PostStoreRequest;
use Post\Http\Requests\Post\PostUpdateRequest;
use App\GlobalService\ResponseService;
use Post\Repositories\PostInterface;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public $response, $post;

    public function __construct( ResponseService $response, PostInterface $post ){
        $this->response = $response;
        $this->post = $post;
    }
    public function index(){
        try{
            return $this->post->index();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getPosts(){
        try{
            return $this->post->getPosts();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function show($id){
        try{
            return $this->post->show($id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function create(){
        try {
            return $this->post->create();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }

    }

    public function store(PostStoreRequest $request){
        try {
            $postStore = $this->post->store($request);
            if ($postStore === true){
                return $this->response->responseSuccessMsg('Successfully Created');
            }
            return $this->response->responseError("Unable To Create Post");
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }

    }

    public function edit($id){
        try{
            return $this->post->edit($id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function update(PostUpdateRequest $request, $id){
        try {
            $postUpdate = $this->post->update($request,$id);
            if ($postUpdate === true){
                return $this->response->responseSuccessMsg('Successfully Updated');
            }
            return $this->response->responseError("Unable To Update Post");
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }


    public function destroy($id){
        try{
            $postDelete = $this->post->destroy($id);
            if( $postDelete === true){
                return $this->response->responseSuccessMsg("Post Deleted Successfully.");
            }
            return  $this->response->responseError("Unable To Delete Post");
       }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function undoDelete($id){
        try{
            $undoDelete = $this->post->undoDelete($id);
            if($undoDelete === true){
                return $this->response->responseSuccessMsg('Post Restored Successfully.');
            }
            return $this->response->responseError("Unable To Restore The Post");
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getTrashPosts(){
        try {
            return $this->post->getTrashPosts();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function permanentDelete($id){
        try {
            $permaDelete = $this->post->permanentDelete($id);
            if($permaDelete === true){
                return $this->response->responseSuccessMsg('Post Deleted Permanently.');
            }
            return $this->response->responseError('Unable To Delete Post.');
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function statusUpdate(Request $request, $id){
        try {
            return $this->post->statusUpdate($request, $id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function publishUpdate(Request $request, $id){
        try {
            return $this->post->publishUpdate($request, $id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function filterByDate( Request $request){
        try{
            return $this->post->filterByDate($request);
        }catch (\Exception  $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

}

