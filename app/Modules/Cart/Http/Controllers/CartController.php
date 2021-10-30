<?php

namespace Cart\Http\Controllers;

use App\Http\Controllers\Controller;
use App\GlobalService\ResponseService;
use Cart\Repositories\CartInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $response;
    public $cart;

    public function __construct(ResponseService $response, CartInterface $cart ){
        $this->response = $response;
        $this->cart = $cart;
    }
    public function index(){
        try{
            return $this->cart->index();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }


    public function getAllCart(){
        try{
            return $this->cart->getAllCart();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getCart(){
        try {
            return $this->cart->getCart();
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function store(Request $request){
        try {
            return $this->cart->store($request);
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function update(Request $request){
        try {
            return $this->cart->update($request);
        }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            return $this->cart->destroy($request);
       }catch (\Exception $e){
              $this->response->responseBladeError($e->getMessage());
        }
    }

}

