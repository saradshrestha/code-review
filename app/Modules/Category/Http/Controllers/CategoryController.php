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
    public $category;

    public function __construct(ResponseService $response, CategoryInterface $category ){
        $this->response = $response;
        $this->category = $category;
    }
    public function index(){
        try{
            return $this->category->index();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getCategories(){
        try{
            return $this->category->getCategories();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function show($id){
        try{
            return $this->category->show($id);
        }catch (\Exception $e){
             $this->response->responseBladeError($e->getMessage());
        }
    }

    public function create(){
        try {
            return $this->category->create();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function store(CategoryStoreRequest $request){
        try {
            $categoryStore = $this->category->store($request);
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
            return $this->category->edit($id);
        }catch (\Exception $e){
             $this->response->responseBladeError($e->getMessage());
        }
    }

    public function update(CategoryUpdateRequest $request, $id){
        try {
            $categoryUpdate = $this->category->update($request, $id);
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
            $categoryDelete = $this->category->destroy($id);
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
            $categoryRestore = $this->category->undoDelete($id);
            if( $categoryRestore == true){
                return  $this->response->responseSuccessMsg("Category Restored Successfully.");
            }
            $this->response->responseError("Unable To Restore Category");
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getTrashCategories(){
        try {
            return $this->category->getTrashCategories();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function permanentDelete($id){
        try {
            $categoryPermaDelete = $this->category->permanentDelete($id);
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
            return $this->category->statusUpdate($request,$id);
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }
}

