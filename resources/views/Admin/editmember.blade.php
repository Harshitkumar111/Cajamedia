@extends('layouts.Admin')


@section('content')
<form action="/updatemember/{{$editmember->id}}" class="form" method="POST">
{{-- @if(session()->has('message'))
<div class="alert alert-success">
{{ session()->get('message') }}
</div>
@endif
--}}
@if(session()->has('error'))
<div class="alert alert-error">
{{ session()->get('error') }}
</div> 
@endif
    @csrf
    <label>First Name</label><br>
    <input type="text" name="update_first_name"  value="{{$editmember->first_name}}"><br><br>
    <label>Last Name</label><br>
    <input type="text" name="update_last_name" value="{{$editmember->last_name}}" ><br><br>
    <label>Email</label><br>
    <input type="email" name="update_email" value="{{$editmember->email}}" readonly ><br><br>
    <label>Phone Number</label><br>
    <input type="text" name="update_phone_number" value="{{$editmember->phone_number}}" ><br><br>
    <label>Mamber</label>
    <select name="update_user_type" > &nbsp;&nbsp;&nbsp;
      
      <option value="2" <?php if($editmember->user_type=='2'){ echo "selected";} ?> >Admin</option>
      <option value="1" <?php if($editmember->user_type=='1'){ echo "selected";} ?>>Supplier</option>
      <option value="0" <?php if($editmember->user_type=='0'){ echo "selected";} ?>>User</option>
    </select>
    <label>City</label>
    <select name="update_city" > &nbsp;&nbsp;&nbsp;
         <option value="">------- </option>
      @foreach ($city as $citys)
        <option value="{{$citys->id}}" <?php if($citys->id==$editmember->state){ echo "selected";} ?>>{{$citys->name}}</option>  
      @endforeach
    </select>
    <label>State</label>
    <select name="update_state" > &nbsp;&nbsp;&nbsp;
         <option value="">------- </option>
         @foreach ($state as $state)
         <option value="{{$state->id}}" <?php if($state->id==$editmember->state){ echo "selected";} ?>  >{{$state->name}}</option>   
       @endforeach
    </select><br><br>
    <label>Country</label>
    <select name="update_country" > &nbsp;&nbsp;&nbsp;
         <option value="">------- </option>
         @foreach ($country as $country)
         <option value="{{$country->id}}" <?php if($country->id==$editmember->state){ echo "selected";} ?> >{{ $country->name }} </option>   
       @endforeach
    </select><br><br>
    <button>Submit</button>
</form>
@endsection