@extends('layouts.Admin')


@section('content')


<a href="/member"id="addmember">Add Member</a>
@if(session()->has('sucess'))
<div class="alert alert-success">
{{ session()->get('sucess') }}
</div>
@endif

@if(session()->has('update_error'))
<div class="alert alert-error">
{{ session()->get('update_error') }}
</div>
@endif
<div class="container table-member">
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Sn</th>
        <th scope="col">Name</th>
        
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Role</th>
        <th scope="col">City</th>
        <th scope="col">State</th>
        <th scope="col">Country</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $counter = 1; ?>
        @foreach ($alluser as $allusers)
        
                <tr>
                    <td>{{$counter}}</td>
                    <td>{{$allusers->first_name}} {{$allusers->last_name}}</td>
                
                    <td>{{$allusers->email}}</td> 
                    <td>{{$allusers->phone_number}}</td> 
                    <td><?php if($allusers->user_type==0){
                      echo "User";
                    }else if($allusers->user_type==1){
                      echo "Supplier";
                    }else{
                      echo "Admin";
                    }
                     ?>
                    </td> 
                    <td>{{Helper::get_city($allusers->city) }}</td> 
                    <td>{{Helper::get_state($allusers->state) }}</td> 
                    <td>{{Helper::get_country($allusers->country) }}</td> 
                    <td><a href="/editmember/{{$allusers->id}}"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp; &nbsp;
                        <a href="/deletemember/{{$allusers->id}}"><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php   $counter++; ?>
                @endforeach
    </tbody>
  </table>
</div>
<div style="text-align: center; margin-top:20px;">
  {{ $alluser->links() }}
</div>

@endsection