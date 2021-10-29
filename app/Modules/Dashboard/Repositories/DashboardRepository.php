<?php

namespace Dashboard\Repositories;

use Category\Models\Category;
use Post\Models\Post;
use User\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;


class DashboardRepository implements DashboardInterface
{
    public function index(){
        $post_count= Post::where('post_status',1)->count();
        $category_count = Category::where ('status',1)->count();
        $posts_per_day = Post::where('post_status',1)->whereDate('updated_at',Carbon::today())->count();
        return view ('Dashboard::backend.dashboard.admin',compact('post_count','category_count','posts_per_day'));
    }

    public function passwordView($id){
        $user = User::where('id',$id)->first();
        if($user){
            return view('Dashboard::backend.dashboard.userPasswordChange');
        }
        return redirect()->route('backend.dashboard')->with('error','User Not Found');
    }

    public function checkPassword($request){
        $user = User::find(auth()->user()->id);
        // Check password string with hash string..
        if(!Hash::check($request->get('current_password'), $user->password)){
            return response ()->json ([
                'message' => 'Password Does Not Match'
            ],200);
        }else{
            return response()->json([
                'status' => 'success',
                'message' => 'Password Matched'
            ],200);
        }

    }
    public function userPasswordSubmit($request){
        $user = User::find(auth()->user()->id);
        if(!Hash::check($request->get('current_password'), $user->password)){
            return false;
        }else{
            $user->password = Hash::make($request->get('new_password'));
            $user->save();
            return true;
        }
    }

}
