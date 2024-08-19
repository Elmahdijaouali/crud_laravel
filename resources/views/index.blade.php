
@extends('layouts.master') 

@section('title','index')   

@section('main')
<style>
   table tr th , td{
    width:15%;
    text-align: center
   }
   table tr td:first-child,
   table tr th:first-child{
    width: 8%;
   }
   table tr td:last-child ,
   table tr th:last-child{
    width: 30%;
   }
   table tr td:last-child form{
     display: inline;

   }
   a{
    all: unset;
   }
</style>
       <h1 class="text-center my-5">the posts</h1>
       <button type="submit" class="btn btn-info mb-3"><a href={{route('post.add')}}>add post</a></button>
       <table class="table table-striped ">
          <tr >
           <th>id</th>
           <th>title</th>
           <th>content</th>
           <th>image</th>
           <th>create at</th>
           <th>action</th>
          </tr>
       
             @foreach ($posts as $post)
                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->content}}</td>
                  <td><img src="{{ asset('storage/' . $post->img) }}" style="width:100px;height:60px;"  alt="image"></td>
                  <td>{{$post->created_at}}</td>
                  <td>
       
                    <form action={{ route('post.show', ['id'=>$post->id]) }}  >
                      @csrf 
                       <button type="submit" class="btn btn-info">Show</button> 
                    </form>
                     
                    <form action={{ route('post.edit', ['id'=>$post->id]) }} >
                       @csrf 
                        <button type="submit" class="btn btn-info">Edit</button> 
                     </form>
                    
                     <form action={{ route('post.destroy', ['id'=>$post->id]) }} method='POST'>
                       @csrf 
                       @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                     </form>
                    
                  </td>
                 </tr>
             @endforeach
       
       </table>
@endsection