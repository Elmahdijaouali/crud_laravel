
@extends('layouts.master') 

@section('title','show')   

@section('main')

       <h1 class="text-center my-5">show post </h1>
  
      
       <div class="card col-4 m-auto">
        <div class="card-header">        
          <h5 class="card-title">  {{$post->title}}</h5>
        </div>
       
        <img class="card-img-top w-100" src="{{ asset('storage/' . $post->img) }}" alt="Card image cap">
        <div class="card-body">   
          <p class="card-text">  {{$post->content}}</p>
          <p>create at: {{$post->created_at}}</p>
        </div>
      </div>
@endsection