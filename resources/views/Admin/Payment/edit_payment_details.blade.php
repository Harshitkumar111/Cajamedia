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

<form action="/update_payment_details/{{$Payment_detail->id}}" class="form" method="POST">
    <h2>EDIT PAYMENT</h2>    
    @csrf
       
        <label><b>Amount</b></label>
        <br>
        <input type="text" placeholder="Enter Amount" name="amount" value="{{$Payment_detail->amount}}">
        <br><br>
        <label><b>Provider</b></label>
        <br>
        <input type="text" placeholder="Enter Provider" name="provider" value="{{$Payment_detail->provider}}">
        <br><br>
        <label><b>Status</b></label>
        <br>
        <input type="text" placeholder="Enter Status" name="status" value="{{$Payment_detail->status}}">
        <br><br>
        <button>Submit</button>
</form>
@endsection