@extends('layouts.Admin')


@section('content')

<form action="/savecity" class="form" method="POST">


   
    
    @if(session()->has('error'))
    <div class="alert alert-error">
    {{ session()->get('error') }}
    </div>
    @endif

<h2>ADD CITY</h2>
@csrf
    <label for="uname"><b>Name</b></label>
    <br>
    <input type="text" placeholder="Enter City Name" name="City_name" required>
    <br><br>
    <button>Submit</button>
</form>
@endsection