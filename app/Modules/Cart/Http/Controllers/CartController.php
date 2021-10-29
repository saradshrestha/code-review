<?php

namespace Cart\Http\Controllers;

use App\Http\Controllers\Controller;
use App\GlobalService\ResponseService;
use Cart\Repositories\CartInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $response;
    public $task;

    public function __construct(ResponseService $response, CartInterface $task ){
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


    public function getAllCart(){
        try{
            return $this->task->getAllCart();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getCart(){
        try {
            return $this->task->getCart();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function store(Request $request){
        try {
            return $this->task->store($request);
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function update(Request $request){
        try {
            return $this->task->update($request);
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            return $this->task->destroy($request);
       }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

}

