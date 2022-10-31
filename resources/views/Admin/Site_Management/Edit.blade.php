@extends('layouts.Admin')


@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-error">
{{ session()->get('error') }}
</div>
@endif

<form action="/updatesite/{{$site->id}}" class="form" method="POST">

@csrf
    <label ><b>Site Name</b></label>
    <br>
    <input type="text" placeholder="Enter Stie Name" name="Site_name" value="{{$site->Site_name}}">
    <br><br>
    <label ><b>Phone number</b></label>
    <br>
    <input type="text" placeholder="Enter Phone number" name="Phone_number" value="{{$site->Phone_number}}">
    <br><br>
    <label ><b>Email address</b></label>
    <br>
    <input type="email" placeholder="Enter Email address" name="Email_address" value="{{$site->Email_address}}">
    <br><br>
    <label ><b>Address</b></label>
    <br>
    <textarea name="Address"  cols="101" >{{$site->Address}}</textarea>
    <br><br>
    <label ><b>About us info</b></label>
    <br>
    <textarea name="About_us_info"  cols="101" >{{$site->About_us_info}}</textarea>
    <br><br>
    <label ><b>Copyright</b></label>
    <br>
    <textarea name="Copyright"  cols="101" >{{$site->Copyright}}</textarea>
    <br><br>
    <button>Submit</button>
</form>


@endsection