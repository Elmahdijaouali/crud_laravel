@extends('layouts.master') 

@section('title','add')   

@section('main')

     <h1 class="text-center mt-5">add post </h1>
   
     <form action={{ route('post.store') }}  method="POST" class="card col-6 mx-auto py-5 px-3 mt-5 text-white" style="background:#333;" enctype="multipart/form-data" >
         @csrf
         @method('post')
         <div class="mb-3">
             <label class="form-label">title</label>
             <input type="text" class="form-control" name="title"  >
           </div>
           <div class="mb-3">
             <label  class="form-label">content post</label>
             <textarea class="form-control"   name="content" rows="5"></textarea>
           </div>
           <div class="mb-3">
            <label class="form-label">image post</label>
            <input type="file" class="form-control"  name="img"  >
          </div>
           
   
           <button type="submit" class="btn btn-primary">Add</button>
     </form>

@endsection
         

     
