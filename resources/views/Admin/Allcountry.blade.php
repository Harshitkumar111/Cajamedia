@extends('layouts.Admin')


@section('content')
<a href="/addcountry"id="addmember">Add Country</a>
@if(session()->has('Deletescounrty'))
<div class="alert alert-error">
{{ session()->get('Deletescounrty') }}
</div> 
@endif
@if(session()->has('EditCoutryname'))
<div class="alert alert-error">
{{ session()->get('EditCoutryname') }}
</div> 
@endif
@if(session()->has('addcountryname'))
<div class="alert alert-error">
{{ session()->get('addcountryname') }}
</div> 
@endif

<div class="container table-member">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Sn</th>
            <th scope="col">Country</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
             <?php $counter = 1; ?>
            @foreach ($countrys as $country)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$country->name}}</td>
                        <td><a href="/editcountry/{{$country->id}}"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp; &nbsp;
                          <a href="/deletecounrty/{{$country->id}}"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      </tr>
                      <?php   $counter++; ?>
                    @endforeach
        </tbody>
      </table>
    </div>
    

@endsection