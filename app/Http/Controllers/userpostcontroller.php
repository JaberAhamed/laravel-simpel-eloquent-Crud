<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class userpostcontroller extends Controller
{
    //
  public function userPost(Request $request){
        
        $validatedData = $request->validate([
        'title' => 'required|max:250',
        'details' => 'required|max:450',
        'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1000',
        
        ]);

        $data=array();
        $data['category_id']=$request->category_id;
        $data['title']=$request->title;
        $data['details']=$request->details;  
        $image = $request->file('image');

        if($image){
            $uni_image_name=uniqid();
            $extention= $image->getClientOriginalExtension();
            $image_fullname = $uni_image_name.'.'.$extention;

            $path = "public/front/image/"; 
            $image_url=$path.$image_fullname;
            $imagemove=$image->move($path,$image_fullname);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);

                $notification = array(
                    'message' => 'Category inserted successfully!',
                    'alert-type' => 'success'
                );

              
        }
        else{
              $post = DB::table('posts')->insert($data);

                $notification = array(
                    'message' => 'Category inserted successfully!',
                    'alert-type' => 'success'
                );

                
        }

        return Redirect()->back()->with($notification);

        
   
    
               
       } 

  public function allpostegory(){

  	 $all_post = DB::table('posts')
  	                    ->join('categories','posts.category_id','categories.id')
                        ->select('posts.*','categories.name')
                        ->get();

  	 return view('post.allpost',compact('all_post'));

  }



  public function singlepost($id){

  	 $all_post_view = DB::table('posts')
  	                    ->join('categories','posts.category_id','categories.id')
                        ->select('posts.*','categories.name')
                        ->where('posts.id',$id)
                        ->first();

  	 return view('post.singlepostview',compact('all_post_view'));

  }

  public function singlepostedit($id){

  	 $allcat = DB::table('categories')->get();
  	 $allpost =  DB::table('posts')->where('id',$id)->first();

  	 return view('post.singlepostEdit',compact('allpost','allcat'));
  }

  public function updatepost(Request $request,$id)
  {
      $validatedData = $request->validate([
        'title' => 'required|max:250',
        'details' => 'required|max:450',
        'image' => 'mimes:jpeg,png,jpg,gif,svg|max:1000',
        
        ]);

        $data=array();
        $data['category_id']=$request->category_id;
        $data['title']=$request->title;
        $data['details']=$request->details;  
        $image = $request->file('image');

        if($image){
            $uni_image_name=uniqid();
            $extention= $image->getClientOriginalExtension();
            $image_fullname = $uni_image_name.'.'.$extention;

            $path = "public/front/image/"; 
            $image_url=$path.$image_fullname;
            $imagemove=$image->move($path,$image_fullname);

            $data['image']=$image_url;
            unlink($request->old_image);
            DB::table('posts')->where('id',$id)->update($data);

                $notification = array(
                    'message' => 'Category update successfully!',
                    'alert-type' => 'success'
                );

              
        }
        else{
        	   $data['image'] = $request->old_image;
                DB::table('posts')->where('id',$id)->update($data);

                $notification = array(
                    'message' => 'Category update successfully!',
                    'alert-type' => 'success'
                );

                
        }

        return Redirect()->route('all.post')->with($notification);

  }

  public function deletepost($id){

        $getimage = DB::table('posts')->where('id',$id)->first();
         $getimagepath = $getimage->image;
        

        $delete =  DB::table('posts')->where('id',$id)->delete();
        if($delete){
        	unlink( $getimagepath);
              $notification = array(
                    'message' => 'Delete Post successfully!',
                    'alert-type' => 'success'
                );
        }
        else{

        	$notification = array(
                    'message' => 'Something is wrong!',
                    'alert-type' => 'success'
                );

        }
        return Redirect()->route('all.post')->with($notification);
  }

}
