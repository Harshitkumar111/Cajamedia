@extends('layouts.Admin')


@section('content')

<form action="/savestate" class="form" method="POST">


    @if(session()->has('addstatenameerror'))
    <div class="alert alert-success">
    {{ session()->get('addstatenameerror') }}
    </div>
    @endif
    
    

<h2>ADD STATE</h2>
@csrf
    <label ><b>Name</b></label>
    <br>
    <input type="text" placeholder="Enter State Name" name="State_name" required>
    <br><br>
    <button>Submit</button>
</form>
@endsection