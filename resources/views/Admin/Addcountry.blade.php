@extends('layouts.Admin')


@section('content')

<form action="/savecountry" class="form" method="POST">


   
    
    @if(session()->has('addcountrynameerror'))
    <div class="alert alert-error">
    {{ session()->get('addcountrynameerror') }}
    </div>
    @endif

<h2>ADD COUNTRY</h2>
@csrf
    <label for="uname"><b>Name</b></label>
    <br>
    <input type="text" placeholder="Enter Counrty Name" name="counrty_name" required>
    <br><br>
    <button>Submit</button>
</form>
@endsection