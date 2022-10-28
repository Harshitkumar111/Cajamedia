@extends('layouts.Admin')


@section('content')
<a href="/addstate"id="addmember">Add State</a>
@if(session()->has('Deletestate'))
<div class="alert alert-error">
{{ session()->get('Deletestate') }}
</div> 
@endif
@if(session()->has('addstateyname'))
<div class="alert alert-error">
{{ session()->get('addstateyname') }}
</div> 
@endif
<div class="container table-member">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Sn</th>
            <th scope="col">State</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
             <?php $counter = 1; ?>
            @foreach ($state as $states)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$states->name}}</td>
                        <td><a href="/editstate/{{$states->id}}"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp; &nbsp;
                          <a href="/deletestate/{{$states->id}}"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      </tr>
                      <?php   $counter++; ?>
                    @endforeach
        </tbody>
      </table>
    </div>
    

@endsection