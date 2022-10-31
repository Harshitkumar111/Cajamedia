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

<form action="/saveseo" class="form" method="POST">

@csrf

    <label ><b>Analytics</b></label>
    <br>
    <textarea name="Analytics"  cols="101" >{{$seo->Analytics}}</textarea>
    <br><br>
    <label ><b>Header Code</b></label>
    <br>
    <textarea name="Header_Code"  cols="101" >{{$seo->Header_Code}}</textarea>
    <br><br>
    <label ><b>Footer Code</b></label>
    <br>
    <textarea name="Footer_Code"  cols="101" >{{$seo->Footer_Code}}</textarea>
    <br><br>
    <button>Submit</button>
</form>


@endsection