@extends('layouts.Admin')


@section('content')
<a href="/Addpost"id="addmember">Add Post</a>
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
            @foreach ($post as $posts)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$posts->Title}}</td>
                        {{-- <td>{{$pages->Description}}</td> --}}
                        <td>{{$posts->Meta_title}}</td>
                        <td>{{$posts->Meta_Description}}</td>
                        <td>{{$posts->Meta_Keyword}}</td>
                        <td><a href="/editpost/{{$posts->id}}"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp; &nbsp;
                          <a href="/deletepost/{{$posts->id}}"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      </tr>
                      <?php   $counter++; ?>
                    @endforeach
        </tbody>
      </table>
    </div>



@endsection