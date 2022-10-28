@extends('layouts.Admin')


@section('content')

<form action="/editstatesave/{{$editstate->id}}" class="form" method="POST">
    @if(session()->has('Editstatename'))
<div class="alert alert-error">
{{ session()->get('Editstatename') }}
</div> 
@endif
<h2>EDIT STATE</h2>
@csrf
    <label ><b>Name</b></label>
    <br>
    <input type="text" placeholder="Enter State Name" name="Editstatename" value="{{$editstate->name}}">
    <br><br>
    <button>Submit</button>
</form>

@endsection