@extends('layouts.Admin')


@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
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
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
             <?php $counter = 1; ?>
            @foreach ($Contact as $contact)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone_number}}</td>
                        <td>{{$contact->address}}</td>
                        <td><a href="/deletecontact/{{$contact->id}}"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      </tr>
                      <?php   $counter++; ?>
                    @endforeach
        </tbody>
      </table>
    </div>
    
@endsection