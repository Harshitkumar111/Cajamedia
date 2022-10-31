@extends('layouts.Admin')


@section('content')
<a href="/Addsite"id="addmember">Add</a>
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


<div class="container table-member">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Sn</th>
            <th scope="col">Site Name</th>
            <th scope="col">Phone number</th>
            <th scope="col">Email address</th>
            <th scope="col">Address</th>
            <th scope="col">About us info</th>
            <th scope="col">Copyright</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
             <?php $counter = 1; ?>
            @foreach ($site as $site)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$site->Site_name}}</td>
                        <td>{{$site->Phone_number}}</td>
                        <td>{{$site->Email_address}}</td>
                        <td>{{$site->Address}}</td>
                        <td>{{$site->About_us_info}}</td>
                        <td>{{$site->Copyright}}</td>
                        <td><a href="/editsite/{{$site->id}}"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp; &nbsp;
                          <a href="/deletesite/{{$site->id}}"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      </tr>
                      <?php   $counter++; ?>
                    @endforeach
        </tbody>
      </table>
    </div>


@endsection