@extends('layouts.Admin')


@section('content')

<form action="{{route('processPaypal')}}" class="form" method="get">
    @csrf
       @if(\Session::has('error'))
        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
        @endif


        @if(\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
        {{ \Session::forget('success') }}
        @endif

    <label for="">Payment</label>
    <input type="text" name="Payment" ><br><br>

    <button>Submit</button>

</form>





{{-- <a href="{{route('processPaypal')}}" id="addmember">PaY 100</a> --}}




@endsection