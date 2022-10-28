@extends('layouts.Admin')


@section('content')


     <form action="/addmember" class="form" method="POST" >

{{-- ------update---  message--------- --}}

          @if(session()->has('message'))
<div class="alert alert-success">
{{ session()->get('message') }}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-error">
{{ session()->get('error') }}
</div>
@endif

{{-- ---delete----message----- --}}


          @csrf
          <label>First Name</label><br>
          <input type="text" name="first_name" ><br><br>
          <label>Last Name</label><br>
          <input type="text" name="last_name" ><br><br>
       
          <label>Email</label><br>
          <input type="email" name="email" ><br><br>
          <label>Phone Number</label><br>
          <input type="text" name="phone_number" ><br><br>
          <label>Password</label><br>
          <input type="password"  name="password" id="password-field" >
          <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
          
          <br><br>
          <label>Member</label>
          <select name="user_type" > &nbsp;&nbsp;&nbsp;
            <option value="">------- </option>
            <option value="2">Admin</option>
            <option value="1">Supplier</option>
            <option value="0">User</option>
          </select> &nbsp;
          <label>City</label>
          <select name="city" > &nbsp;&nbsp;&nbsp;
               <option value="">------- </option>
            @foreach ($city as $citys)
              <option value="{{$citys->id}}">{{$citys->name}}</option>
              
            @endforeach
          </select>
          <label>State</label>
          <select name="state" > &nbsp;&nbsp;&nbsp;
               <option value="">------- </option>
               @foreach ($state as $state)
               <option value="{{$state->id}}">{{$state->name}}</option>
               
             @endforeach
          </select><br><br>
          <label>Country</label>
          <select name="country" > &nbsp;&nbsp;&nbsp;
               <option value="">------- </option>
               @foreach ($country as $country)
               <option value="{{$country->id}}">{{$country->name}}</option>
               
             @endforeach
          </select><br><br>
          <button >Submit</button>
     </form>


@endsection