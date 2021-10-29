<?php

namespace User\Repositories;

use Illuminate\Support\Facades\Auth;
use User\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class UserRepository implements UserInterface
{
    public function index(){

        return view('User::backend.users.index',compact('users'));
    }

    public function getUsers(){
        // $auth_id = Auth()->id();
        $users = User::where('id','!=', 1)
                ->whereNotIn('name',['admin'])
                ->with('roles')
                ->get();
        $view = view('User::backend.users.getUsers',compact('users'))->render();
        return response()->json([
            'view' =>  $view,
        ]);
    }

    public function create(){
        return view('User::backend.users.create');
    }

    public function store($request){
        //dd($request->get('role'));
        $user= new User();
        $user->name = ucwords($request->get('name'));
        $user->email = $request->get('email');
        $user->status = $request->get('status');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        $user->assignRole($request->get('role'));
        return true;
    }

    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('User::backend.users.edit',compact('user'));
    }

    public function update($request, $id){
        // dd( $request->all());
        $user = User::where('id',$id)->first();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->status = $request->get('status');
        $user->save();
        $user->syncRoles($request->get('role'));
        return true;
    }

    public function destroy($id){
        User::where('id',$id)->delete();
        return true;
    }

    public function undoDelete($id){
        User::withTrashed()
            ->where('id',$id)
            ->restore();
        return true;
    }

    public function trashUser(){
        return view('User::backend.users.trash');
    }

    public function getTrashUsers(){
        $trashUsers = User::onlyTrashed()->get();
        $view = view('User::backend.users.getTrashUsers',compact('trashUsers'))->render();
        return response()->json([
             'view' => $view,
        ]);
    }

    public function permanentDelete($id){
        User::onlyTrashed()
            ->where('id',$id)
            ->forceDelete();
        return true;
        // return redirect()->route('backend.users.trash');
    }

    public function statusUpdate($request, $id){
        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();
        $success = true;
        if($user->status == 1){
            $message = "User's Account is Active Now.";
        }
        else{
            $message = "User's Account Is Inactive Now.";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function changePassword($id){
        $user = User::where('id',$id)->first();
        return view('User::backend.users.changePassword',compact('user'));
    }

    public function passwordSubmit($request, $id){
        $user = User::where('id', $id)->first();
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        return true;
    }

}
