<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{

    // read
    public function index(Request $request){
        $posts=Posts::all() ;
        return view('index' )->with('posts' , $posts) ;
    }
    public function create(){
        
        return view('addPost');
    }

    // create
    public function store(Request $request){
       
        $request->validate([
            'title' =>'required|string',
            'content'=>'required',
            'img'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2084',
        ]);
 
      
        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('images', 'public');
        }
        
        Posts::create([
            'title' => $request->title,
            'content' => $request->content,
            'img' => $imgPath, 
        ]);
        
        return redirect()->route('posts.index' );
    }


    // update
    public function edit($id){
        $post=Posts::find($id) ;

        return view('editPost',['post'=>$post]) ;
        
    }
    public function update(Request $request ,$id){
        
        $post=Posts::findOrFail($id);

        $request->validate([
            'title' =>'required|string',
            'content'=>'required',
            'img'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2084',
        ]);
         
        if($request->hasFile('img')){
           if($post->img){
              storage::disk('public')->delete($post->img) ;
           }
           $imgPath =$request->file('img')->store('images','public') ;
           $post->img=$imgPath ;
        }

        $post->update([
            'title'=>$request->input('title') ,
            'content' => $request->input('content'),
            'img' => $post->img ,

        ]) ;

        return redirect()->route('posts.index' );
    }


    // delete
    public function destroy($id){

       $post=Posts::findOrFail($id);
       $post->delete();

       return redirect()->route('posts.index' );

    }

    // show  post
     public function show($id){
        $post=Posts::findOrFail($id) ;

        return view('showPost',['post'=>$post]) ;
        
    }
   
}

