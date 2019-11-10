<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class pagecontroller extends Controller
{
   
     public function contract()
    {
    	# code...
    	return view('pages.contact');
    }

     public function aboutus()
    {
    	# code...
    	return view('pages.about');
    }

    public function index(){
    
    $allpost = DB::table('posts')
               ->join('categories','posts.category_id','categories.id')
               ->select('posts.*','categories.name','categories.slug')->paginate(3);


        return view('post.index',compact('allpost'));    

      
    }
}
