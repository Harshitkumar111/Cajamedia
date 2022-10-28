@extends('layouts.Admin')


@section('content')

<form action="/editcountrysave/{{$editcountrys->id}}" class="form" method="POST">
    {{-- @if(session()->has('Editcitynameerror'))
<div class="alert alert-error">
{{ session()->get('Editcitynameerror') }}
</div> 
@endif --}}
<h2>EDIT COUNTRY</h2>
@csrf
    <label ><b>Name</b></label>
    <br>
    <input type="text" placeholder="Enter Counrty Name" name="EditCoutryname" value="{{$editcountrys->name}}">
    <br><br>
    <button>Submit</button>
</form>

@endsection