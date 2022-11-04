@extends('layouts.Admin')


@section('content')

<form action="/saveemail" class="form" method="POST">


   
    
    @if(session()->has('error'))
    <div class="alert alert-error">
    {{ session()->get('error') }}
    </div>
    @endif

@csrf
    <label><b>Subject</b></label>
    <br>
    <textarea  cols="101" rows=""  name="subject" ></textarea>
   
    <br><br>
    <label><b>Message</b></label>
    <br>
    <textarea   rows=""  name="pagedescription" ></textarea>
    <br><br>
    <label><b>Email</b></label><br>
          <select name="email[]" class="js-example-basic-multiple" multiple="multiple" id="with-email"> &nbsp;&nbsp;&nbsp;
            <option value="">-----------</option>   

            @foreach ($email as $emails)
             <option value="{{$emails->id}}">{{$emails->email}}</option>   
            @endforeach
         
          </select> &nbsp; <br><br>
 <label for=""><b>Group</b> </label><br>
  <select name="group"  id="with-email">
  <option value="">-----------</option>   


   <option value="">Admin</option>   
   <option value="">Supplier</option> 
   <option value="">User</option> 

</select> &nbsp; <br><br>


    {{-- <br>
    <input type="text" placeholder="Enter Email" name="email" >
    <br><br> --}}
    <button>Submit</button>
</form>

    


@endsection