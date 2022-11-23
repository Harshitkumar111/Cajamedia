@extends('layouts.Admin')


@section('content')

<a href="/addemail"id="addmember">Add Blog</a>
    @if(session()->has('success'))
    <div class="alert alert-success">
    {{ session()->get('success') }}
    </div>
    @endif
    


@endsection