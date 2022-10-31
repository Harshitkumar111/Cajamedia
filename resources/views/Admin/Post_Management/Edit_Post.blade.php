@extends('layouts.Admin')


@section('content')

<form action="/updatepost/{{$post->id}}" class="form" method="POST">
    @if(session()->has('error'))
    <div class="alert alert-error">
    {{session()->get('error')}}
    </div>
    @endif
    <h2>Edit POST</h2>
    @csrf
        <label ><b> Title</b></label>
        <br>
        <input type="text" placeholder="Title" name="up_Title" value="{{$post->Title}}" >
        <br><br>
        <label ><b>Meta title</b></label>
        <br>
        <input type="text" placeholder="Meta title" name="up_Meta_title" value="{{$post->Meta_title}}">
        <br><br> 
        <label ><b>Meta Description</b></label>
        <br>
        <input type="text" placeholder="Meta Description" name="up_Meta_Description" value="{{$post->Meta_Description}}">
        <br><br> 
        <label ><b>Meta Keyword</b></label>
        <br>
        <input type="text" placeholder="Meta Keyword" name="up_Meta_Keyword" value="{{$post->Meta_Keyword}}" >
        <br><br>
        <label ><b>Description</b></label>
        <textarea  name="pagedescription">{{$post->Description}}</textarea><br><br>    
        <button>Submit</button>
    </form>
@endsection