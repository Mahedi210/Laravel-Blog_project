<?php

namespace App\Http\Controllers;

use App\Blog;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
  public function index(){

      $blogs=Blog::where('publication_status',1)->paginate(1);

   return view('front.home.home-content',['blogs'=>$blogs]);

  }


  public function support(){

      return view('front.support.support-content');
  }

  public function about(){

      return view('front.about.about-content');
  }

  public function blog(){

      return view('front.blog.blog-content');
  }

  public function contact(){
      return view('front.contact.contact-content');
  }
}
