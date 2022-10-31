@extends('layouts.Admin')


@section('content')

<form action="/updatepage/{{$page->id}}" class="form" method="POST">
    @if(session()->has('error'))
    <div class="alert alert-error">
    {{ session()->get('error') }}
    </div>
    @endif
    <h2>Edit PAGE</h2>
    @csrf
        <label ><b> Title</b></label>
        <br>
        <input type="text" placeholder="Title" name="up_Title" value="{{$page->Title}}" >
        <br><br>
        <label ><b>Meta title</b></label>
        <br>
        <input type="text" placeholder="Meta title" name="up_Meta_title" value="{{$page->Meta_title}}">
        <br><br> 
         <label ><b>Meta Description</b></label>
        <br>
        <input type="text" placeholder="Meta Description" name="up_Meta_Description" value="{{$page->Meta_Description}}">
        <br><br> 
         <label ><b>Meta Keyword</b></label>
        <br>
        <input type="text" placeholder="Meta Keyword" name="up_Meta_Keyword" value="{{$page->Meta_Keyword}}" >
        <br><br>
        <label ><b>Description</b></label>
        <textarea  name="pagedescription">{{$page->Description}}</textarea><br><br>
    
        <button>Submit</button>
    </form>
@endsection