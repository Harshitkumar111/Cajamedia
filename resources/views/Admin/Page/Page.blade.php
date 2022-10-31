@extends('layouts.Admin')


@section('content')
<a href="/Addpage"id="addmember">Add Page</a>
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
            <th scope="col">Title</th>
            {{-- <th scope="col">Description</th> --}}
            <th scope="col">Meta title</th>
            <th scope="col">Meta Description</th>
            <th scope="col">Meta Keyword</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
             <?php $counter = 1; ?>
            @foreach ($page as $pages)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$pages->Title}}</td>
                        {{-- <td>{{$pages->Description}}</td> --}}
                        <td>{{$pages->Meta_title}}</td>
                        <td>{{$pages->Meta_Description}}</td>
                        <td>{{$pages->Meta_Keyword}}</td>
                        <td><a href="/editpage/{{$pages->id}}"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp; &nbsp;
                          <a href="/deletepage/{{$pages->id}}"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      </tr>
                      <?php   $counter++; ?>
                    @endforeach
        </tbody>
      </table>
    </div>


@endsection