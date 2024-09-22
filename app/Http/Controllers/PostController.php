<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function createPost (){
        return view('create');
    }
    public function postData (Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png',
        ]);
        // upload image
        $imageName=null;
        if(isset($request->image)){
             $imageName=time().'.'.$request->image->extension();
             $request->image->move(public_path('images'),$imageName);
        }

        // add new post
        $data = new Post;
        $data -> name =  $request->name;
        $data -> desc =  $request->desc;
        // $data -> image =  $request->image;
        $data -> image = $imageName;
        $data ->save();
       // return redirect()->back();
        return redirect()->route('home')->with('success',"create successfully!");
        // return $request->all();
    }
    public function editData ($id){
        // dd($id);
        $findData = Post::findOrFail($id);
        return view("edit",['postData'=>$findData]);
    }
    public function updateData($id,Request $request){
         // add new post
         $validated = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png',
        ]);
       
        // update new post
        $data = Post::findOrFail($id);
        $data -> name =  $request->name;
        $data -> desc =  $request->desc;

         // upload image
         if(isset($request->image)){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $data -> image = $imageName;
       }
        $data ->save();
      
        return redirect()->route('home')->with('success',"Updated successfully!");
         // return redirect()->back();
    }
    public function deleteData($id){
        
        $data = Post::findOrFail($id);
        $data->delete();
        return redirect()->route('home')->with('success',"deleted successfully!");
    }
}
