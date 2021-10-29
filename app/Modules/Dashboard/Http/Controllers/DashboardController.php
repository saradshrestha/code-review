<?php

namespace Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Dashboard\Repositories\DashboardInterface;
use App\GlobalService\ResponseService;
use Illuminate\Http\Request;
use Dashboard\Http\Requests\Dashboard\NewPasswordRequest;

class DashboardController extends Controller
{
    public $response;
    public $tasdashboardk;

    public function __construct(ResponseService $response, DashboardInterface $dashboard ){
        $this->response = $response;
        $this->dashboard = $dashboard;
    }
    public function index(){
        try{
            return $this->dashboard->index();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }
    public function passwordView($id){
        try{
            return $this->dashboard->passwordView($id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function checkPassword(Request $request){
        try{
            return $this->dashboard->checkPassword($request);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function userPasswordSubmit(NewPasswordRequest $request){
        try{
             $result = $this->dashboard->userPasswordSubmit($request);
             {
                if($result == true){
                    return  $this->response->responseSuccessMsg("New Password Updated.");
                }
                return response()->json([
                    'message' => 'Current Password Does Not Match'
                ],406);
             }
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }
}

