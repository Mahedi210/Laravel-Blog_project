<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\blog;
use Illuminate\Support\Facades\Auth;
use DB;

class BlogController extends Controller
{
    public function index(){

        $publishedCategories=category::where('publication_status',1)->get();

        return view('admin.blog.add-blog',['publishedCategories'=> $publishedCategories]);
    }


    public function saveBlogInfo(Request $request){

        $this->validate($request,[

            'blog_title'=>'required|alpha'
        ]);

        $blogImage=$request->file('blog_image');

        $imageName=$blogImage->getClientOriginalName();
        $directory='blog-image/';
        $blogImage->move($directory,$imageName);
        $imageUrl=$directory.$imageName;



        $blog=new blog();
        $blog->blog_title=$request->blog_title;
        $blog->category_id=$request->category_id;
        $blog->author_name=$request->author_name;
        $blog->blog_description=$request->blog_description;
        $blog->blog_image=$imageUrl;
        $blog->publication_status=$request->publication_status;
        $blog->save();

        return redirect('/blog/add-blog')->with('message','blog Info add sucessfully');

//        $blog->author_name=Auth::user()->name;

    }


    public function manageBlogInfo(){

        $blogs=DB::table('blogs')
        ->join('categories','blogs.category_id','=','categories.id')
        ->select('blogs.blog_title','categories.category_name')
        ->get();
        return $blogs;


        return view('admin.blog.manage-blog',['blogs'=>$blogs]);
    }

    public function unpublishedBlogInfo($id){

        $blogByID=blog::find($id);
        $blogByID->publication_status=0;
        $blogByID->save();

        return redirect('/blog/manage-blog')->with('message','Blog unpublished successfully');



    }
 public function publishedBlogInfo($id){

        $blogByID=blog::find($id);
        $blogByID->publication_status=1;
        $blogByID->save();

        return redirect('/blog/manage-blog')->with('message','Blog published successfully');



    }

    public function editBlogInfo($id){

     $blog= blog::find($id);

      return view('admin.blog.edit-blog',['blog'=>$blog]);


    }

    public function updateBlogInfo(Request $request){

        $blogById=blog::find($request->blog_id);
        $blogById->blog_title=$request->blog_title;
        $blogById->author_name=$request->author_name;
        $blogById->category_name=$request->category_name;
        $blogById->blog_description=$request->blog_description;
        $blogById->publication_status=$request->publication_status;

        $blogById->save();

        return redirect('/blog/manage-blog')->with('message','Blog info update successfully');
    }


    public function deleteBlogInfo($id){

        $blogById=blog::find($id);
        $blogById->delete();

        return redirect('/blog/manage-blog')->with('message','blog info delete successfully');
    }



}
