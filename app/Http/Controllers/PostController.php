<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function writepost()
    {
        # code...
         $allcat = DB::table('categories')->get();
        ;
        return view('post.write',compact('allcat'));
    }

     public function addCategory()
    {
        # code...
        return view('post.category');
    }

    public function storecategory(Request $request){
        
        $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:255|min:4',
        'slug' => 'required|unique:categories|max:255|min:4',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;  
        $category = DB::table('categories')->insert($data);
        
        if($category){
                $notification = array(
                    'message' => 'Category inserted successfully!',
                    'alert-type' => 'success'
                );

                return Redirect()->back()->with($notification);
       }
        else{
                $notification = array(
                        'message' => 'Something is worng',
                        'alert-type' => 'error'
                    );

                    return Redirect()->route('all.category')->with($notification);

        }
    }



   public function allCategory()
    {
        # code...
          $allcat = DB::table('categories')->get();
        return view('post.allcategory',compact('allcat'));
    }

public function singlecategory($id)
    {
        # code...
          $singlecat = DB::table('categories')->where('id',$id)->first();
        return view('post.single')->with('cat',$singlecat);
    }

public function deletecategory($id){

    $singlecat = DB::table('categories')->where('id',$id)->delete();
     $notification = array(
                    'message' => 'Delete inserted successfully!',
                    'alert-type' => 'success'
                );
     return Redirect()->back()->with($notification);
}    

public function updatecategory($id){
  
  $updatecat = DB::table('categories')->where('id',$id)->first();
  return view('post.update', compact('updatecat'));
}

public  function upcat(Request $request,$id)
{
    # code...

        $validatedData = $request->validate([
        'name' => 'required|max:255|min:4',
        'slug' => 'required|max:255|min:4',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;  
        $category = DB::table('categories')->where('id',$id)->update($data);
        
        if($category){
                $notification = array(
                    'message' => 'Category update successfully!',
                    'alert-type' => 'success'
                );

                return Redirect()->route('all.category')->with($notification);
       }
        else{
                $notification = array(
                        'message' => 'Nothing to update',
                        'alert-type' => 'error'
                    );

                    return Redirect()->route('all.category')->with($notification);

        }
}


 

}
