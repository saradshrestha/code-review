<?php

namespace User\Http\Controllers;

use App\Http\Controllers\Controller;
use User\Http\Requests\User\UserStoreRequest;
use User\Http\Requests\User\UserUpdateRequest;
use User\Http\Requests\User\PasswordChangeRequest;
use App\GlobalService\ResponseService;
use User\Repositories\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $response;
    public $user;

    public function __construct(ResponseService $response, UserInterface  $user ){
        $this->response = $response;
        $this->user = $user;
    }
    public function index(){
        try{
            return $this->user->index();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getUsers(){
        try{
            return $this->user->getUsers();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }


    public function create(){
        try {
            return $this->user->create();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function store(UserStoreRequest $request){
        try {
             $userStore = $this->user->store($request);
             if ($userStore === true){
                return  $this->response->responseSuccessMsg('User Added Successfully.');
             }
            return $this->response->responseError("Unable To Add New User");
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function edit($id){
        try{
            return $this->user->edit($id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function update(UserUpdateRequest $request, $id){
        try {
             $userUpdate = $this->user->update($request, $id);
             {
                if($userUpdate){
                    return $this->response->responseSuccessMsg('User Data Updated.');
                }
                return $this->response->responseError('Unable To Update UserData');
             }
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function destroy($id){
        try{
            $userDelete = $this->user->destroy($id);
            if( $userDelete == true){
                return $this->response->responseSuccessMsg('User Account Deleted.');
            }
            return $this->response->responseError('Unable To Delete User Account');
       }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function undoDelete($id){
        try {
            $restore = $this->user->undoDelete($id);
            if  ($restore == true){
                return  $this->response->responseSuccessMsg('User Account Restored.');
            }
            return $this->response->responseBladeError("Unable To Restore User's Account");
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function trashUser(){
        try {
            return $this->user->trashUser();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function getTrashUsers(){
        try {
            return $this->user->getTrashUsers();
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function permanentDelete($id){
        try {
             $permaDelete = $this->user->permanentDelete($id);
            if  ($permaDelete == true){
                return  $this->response->responseSuccessMsg('User Account Deleted Permanently.');
            }
            return $this->response->responseBladeError("Unable To Delete User's Account");
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function statusUpdate(Request $request,$id){
        try {
            return $this->user->statusUpdate($request,$id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }

    public function changePassword($id){
        try {
            return $this->user->changePassword($id);
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }


    public function passwordSubmit(PasswordChangeRequest $request,$id){
        try {
            $changePw = $this->user->passwordSubmit($request, $id);
            if ($changePw == true){
                return $this->response->responseSuccessMsg("Password Changed Successfully");
            }
            return $this->response->responseError("Something Went Wrong");
        }catch (\Exception $e){
            return $this->response->responseBladeError($e->getMessage());
        }
    }
}

