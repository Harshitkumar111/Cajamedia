@extends('layouts.Admin')


@section('content')
{{-- <a href="/Addajax"id="addmember">Add Page</a> --}}
{{-- @if(session()->has('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-error">
{{ session()->get('error') }}
</div>
@endif --}}

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="testcase" method="POST">
          @csrf 
        <div class="modal-body">
           
          <label for="">Name</label>
          <input type="text"  name="name"><br><br>
          <label for="">Email</label>
          <input type="text"  name="email"><br><br>
          <label for="">Number</label>
          <input type="text"  name="number">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onClick="add()">Save changes</button>
        </div>
     </form>
      </div>
    </div>
  </div>


  <div class="container table-member">
    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Sn</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
         
            <th scope="col">Action</th>
          </tr>
        </thead>
           
        <tbody id="hello">
            
        </tbody>
      </table>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="updateexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="uptestcase" method="POST">
          @csrf 
        <div class="modal-body">
           
          <label for="">Name</label>
          <input type="text"  name="upname"><br><br>
          <label for="">Email</label>
          <input type="text"  name="upemail"><br><br>
          <label for="">Number</label>
          <input type="text"  name="upnumber">
          <input type="hidden"  name="" id="hidden_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onClick="up()">Save changes</button>
        </div>
     </form>
      </div>
    </div>
  </div>


@endsection