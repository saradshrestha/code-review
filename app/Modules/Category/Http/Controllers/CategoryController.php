<?php

namespace Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Category\Http\Requests\Category\CategoryStoreRequest;
use Category\Http\Requests\Category\CategoryUpdateRequest;
use App\GlobalService\ResponseService;
use Category\Repositories\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $response;
    public $task;

    public function __construct(ResponseService $response, CategoryInterface $task ){
        $this->response = $response;
        $this->task = $task;
    }
    public function index(){
        try{
            return $this->task->index();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getCategories(){
        try{
            return $this->task->getCategories();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function show($id){
        try{
            return $this->task->show($id);
        }catch (\Exception $e){
             $this->response->responseBladeError($e->getMessage());
        }
    }

    public function create(){
        try {
            return $this->task->create();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function store(CategoryStoreRequest $request){
        try {
            $categoryStore = $this->task->store($request);
            if ($categoryStore == true){
                return  $this->response->responseSuccessMsg("Category Created Successfully.");
            }
            $this->response->responseError("Unable To Create Category");
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function edit($id){
        try{
            return $this->task->edit($id);
        }catch (\Exception $e){
             $this->response->responseBladeError($e->getMessage());
        }
    }

    public function update(CategoryUpdateRequest $request, $id){
        try {
            $categoryUpdate = $this->task->update($request, $id);
            if( $categoryUpdate == true){
                return  $this->response->responseSuccessMsg("Category Updated Successfully.");
            }
            $this->response->responseError("Unable To Update Category");
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function destroy($id){
        try{
            $categoryDelete = $this->task->destroy($id);
            if( $categoryDelete == true){
                return  $this->response->responseSuccessMsg("Category Deleted Successfully.");
            }
            $this->response->responseError("Unable To Delete Category");
       }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function undoDelete($id){
        try {
            $categoryRestore = $this->task->undoDelete($id);
            if( $categoryRestore == true){
                return  $this->response->responseSuccessMsg("Category Restored Successfully.");
            }
            $this->response->responseError("Unable To Restore Category");
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function trashCategory(){
        try {
            return $this->task->trashCategory();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getTrashCategories(){
        try {
            return $this->task->getTrashCategories();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function permanentDelete($id){
        try {
            $categoryPermaDelete = $this->task->permanentDelete($id);
            if( $categoryPermaDelete == true){
                return  $this->response->responseSuccessMsg("Category Deleted Permanently.");
            }
            $this->response->responseError("Unable To Delete Category Permanently");
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function statusUpdate(Request $request,$id){
        try {
            return $this->task->statusUpdate($request,$id);
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }
}

