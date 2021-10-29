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
    public $response;
    private $repo;

    public function __construct( ResponseService $response, PostInterface $repo ){
        $this->response = $response;
        $this->repo = $repo;
    }
    public function index(){
        try{
            return $this->repo->index();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getPosts(){
        try{
            return $this->repo->getPosts();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function show($id){
        try{
            return $this->repo->show($id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function create(){
        try {
            return $this->repo->create();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }

    }

    public function store(PostStoreRequest $request){
        // dd( $request->all());
        try {
            $postStore =  $this->repo->store($request);
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
            return $this->repo->edit($id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function update(PostUpdateRequest $request, $id){
        //dd( $request->all());
        try {
            $postUpdate = $this->repo->update($request,$id);
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
            $postDelete = $this->repo->destroy($id);
            if( $postDelete === true){
                return $this->response->responseSuccessMsg("Post Deleted Successfully.");
            }
            return  $this->response->responseError("Unable To Delete Post");
       }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function undoDelete($id){
        try {
             $undoDelete = $this->repo->undoDelete($id);
             {
                if( $undoDelete === true){
                    return $this->response->responseSuccessMsg('Post Restored Successfully.');
                }
                return $this->response->responseError("Unable To Restore The Post");
             }
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function trashPost(){
        try{
            return $this->repo->trashPost();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getTrashPosts(){
        try {
            return $this->repo->getTrashPosts();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function permanentDelete($id){
        try {
            $permaDelete = $this->repo->permanentDelete($id);
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
            return $this->repo->statusUpdate($request, $id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function publishUpdate(Request $request, $id){
        try {
            return $this->repo->publishUpdate($request, $id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function filterByDate( Request $request){
        try{
            return $this->repo->filterByDate($request);
        }catch (\Exception  $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

}

