@extends('layouts.Admin')


@section('content')


<form action="/savepost" class="form" method="POST">
    @if(session()->has('error'))
    <div class="alert alert-error">
    {{ session()->get('error') }}
    </div>
    @endif
<h2>ADD POST</h2>
@csrf
    <label ><b> Title</b></label>
    <br>
    <input type="text" placeholder="Title" name="Title" required>
    <br><br>
    <label ><b>Meta title</b></label>
    <br>
    <input type="text" placeholder="Meta title" name="Meta_title" required>
    <br><br> 
     <label ><b>Meta Description</b></label>
    <br>
    <input type="text" placeholder="Meta Description" name="Meta_Description" required>
    <br><br> 
     <label ><b>Meta Keyword</b></label>
    <br>
    <input type="text" placeholder="Meta Keyword" name="Meta_Keyword" required>
    <br><br>
    <label ><b>Description</b></label>
    <textarea  name="pagedescription"  ></textarea><br><br>

    <button>Submit</button>
</form>


@endsection