@extends('layouts.Admin')


@section('content')

<a href="/addcity"id="addmember">Add City</a>
@if(session()->has('sucess'))
<div class="alert alert-success">
{{ session()->get('sucess') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-success">
{{ session()->get('error') }}
</div>
@endif

<div class="container table-member">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Sn</th>
            <th scope="col">City</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
             <?php $counter = 1; ?>
            @foreach ($citys as $city)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$city->name}}</td>
                        <td><a href="/editcity/{{$city->id}}"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp; &nbsp;
                          <a href="/deletecity/{{$city->id}}"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      </tr>
                      <?php   $counter++; ?>
                    @endforeach
        </tbody>
      </table>
    </div>
    


@endsection