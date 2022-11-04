@extends('layouts.Admin')


@section('content')

<a href="/addemail"id="addmember">Add Blog</a>
@if(session()->has('sucess'))
<div class="alert alert-success">
{{ session()->get('sucess') }}
</div>
@endif
    


@endsection