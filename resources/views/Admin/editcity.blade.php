@extends('layouts.Admin')


@section('content')
@if(session()->has('Editcitynameerror'))
<div class="alert alert-error">
{{ session()->get('Editcitynameerror') }}
</div> 
@endif
<form action="/editcitysave/{{$editcity->id}}" class="form" method="POST">
<h2>EDIT CITY</h2>
@csrf
    <label ><b>Name</b></label>
    <br>
    <input type="text" placeholder="Enter City Name" name="Editcityname" value="{{$editcity->name}}">
    <br><br>
    <button>Submit</button>
</form>

@endsection