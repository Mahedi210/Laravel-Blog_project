<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Fqsen;

class CategoryController extends Controller
{
    public function index(){

        return view('admin.category.add-category');
    }

    public function saveCategoryInfo(Request $request){
        $category=new category();

        $category->category_name=$request->category_name;
        $category->category_description=$request->category_description;
        $category->publication_status=$request->publication_status;

        $category->save();

        return redirect('/category/add-category')->with('message','category Info add sucessfully');


    }

    public function manageCategoryInfo(){
        $categories=category::all();

        return view('admin.category.manage-category',['categories'=>$categories]);
    }

    public function unpublishedCategoryInfo($id){
        $categoryByID=category::find($id);
        $categoryByID->publication_status=0;
        $categoryByID->save();

        return redirect('/category/manage-category')->with('message','category info unpublished successfully');


    }
    public function publishedCategoryInfo($id){
        $categoryByID=category::find($id);
        $categoryByID->publication_status=1;
        $categoryByID->save();

        return redirect('/category/manage-category')->with('message','category info published successfully');


    }

public function editCategoryInfo($id){

        $category=category::find($id);


        return view('admin.category.edit-category',['category'=>$category]);

}

public function updateCategoryInfo(Request $request){

        $categoryByID =category::find($request->category_id);

        $categoryByID->category_name=$request->category_name;
        $categoryByID->category_description=$request->category_description;
        $categoryByID->publication_status=$request->publication_status;
        $categoryByID->save();

        return redirect('/category/manage-category')->with('message','category info update successfully');

}

public function deleteCategoryInfo($id){

        $categoryById=category::find($id);
        $categoryById->delete();

        return redirect('/category/manage-category')->with('massage','category info delete successfully');



}


    }
