<?php

namespace Category\Repositories;
use Category\Models\Category;
use Session;
use Illuminate\Support\Str;


class CategoryRepository implements CategoryInterface
{
    public function index(){
        return view('Category::backend.categories.index',compact('categories'));
    }

    public function getCategories(){
        $categories = Category::latest()->get();
        $view = view('Category::backend.categories.getCategories',compact('categories'))->render();
        return response()->json([
            'view' =>  $view
        ]);
    }

    public function create(){
        $categories = Category::where('parent_id','0')->get();
        return view('Category::backend.categories.create',compact('categories'));
    }

    public function store($request){
        $category= new Category();
        $category->title = ucwords($request->get('title'));
        $category->slug = Str::slug($request->get('title'));
        $category->status = $request->get('status');
        $category->parent_id = $request->get('parent_id');
        $category->save();
        return true;
    }

    public function show($id){
        $category = Category::where('id',$id)->first();
        return view ('Category::backend.categories.show',compact('category'));
    }

    public function edit($id){
        $category = Category::where('id',$id)->first();
        $categories = Category::where('parent_id','0')->get();
        return view('Category::backend.categories.edit',compact('category','categories'));
    }

    public function update($request, $id){
        $category=Category::where('id', $id)->first();
        $category->title = ucwords($request->get('title'));
        $category->slug = Str::slug($request->get('title'));
        $category->status = $request->get('status');
        $category->parent_id = $request->get('parent_id');
        $category->save();
        return true;
    }


    public function destroy($id){
        Category::where('id',$id)->delete();
        return true;
    }

    public function undoDelete($id){
        Category::withTrashed()
            ->where('id',$id)
            ->restore();
         return true;
    }

    public function trashCategory(){
        return view('Category::backend.categories.trash');
    }

    public function getTrashCategories(){
        $trashCategories = Category::onlyTrashed()->get();
        $view = view('Category::backend.categories.getTrashCategories',compact('trashCategories'))->render();
        return response()->json([
             'view' =>  $view
        ]);
    }

    public function permanentDelete($id){
        Category::onlyTrashed()
            ->where('id',$id)
            ->forceDelete();
        return true;
    }

    public function statusUpdate($request,$id){
        $category = Category::where('id',$id)->first();
        $category->status = $request->status;
        $category->save();
        $success = true;
        if ( $category->status == 1)
        $message = "The Category Is Active Now.";
        else
         $message = "The Category Is Inactive Now.";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

}
