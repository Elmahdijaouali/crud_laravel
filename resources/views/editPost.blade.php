
@extends('layouts.master') 

@section('title','edit')   

@section('main')

       <h1 class="text-center my-5">edit post </h1>
       <form method="post" action={{ route('post.update' ,['id'=>$post->id])  }} class="card col-6 mx-auto py-5 px-3 mt-5 text-white" style="background:#333;" enctype="multipart/form-data">
         @csrf
         @method('put')
         <div class="mb-3">
             <label class="form-label" >title</label>
             <input type="text" class="form-control" name="title"  value={{$post->title}}>
           </div>
           <div class="mb-3">
             <label class="form-label">content post</label>
             <textarea class="form-control"  name="content" rows="5">{{$post->content}} </textarea>
           </div>
           <div class="mb-3">
            <label class="form-label">image post</label>
            <input type="file" class="form-control"  name="img" value={{$post->img}}  >
          </div>
           
       
           <button type="submit" class="btn btn-primary">Edit</button>
       </form>

@endsection