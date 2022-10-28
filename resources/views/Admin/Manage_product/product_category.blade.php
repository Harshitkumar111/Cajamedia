@extends('layouts.Admin')


@section('content')

<a href="/add_Product_category" id="addmember">Add Product Category</a>

@if(session()->has('successs'))
<div class="alert alert-success">
{{ session()->get('successs') }}
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
            <th scope="col">Product Category Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
             <?php $counter = 1; ?>
            @foreach ($product as $products)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$products->name}}</td>
                        <td>{{$products->desc}}</td>
                        <td><a href="/editcategory/{{$products->id}}"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp; &nbsp;
                          <a href="/deletecategory/{{$products->id}}"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      </tr>
                      <?php   $counter++; ?>
                    @endforeach
        </tbody>
      </table>
    </div>

@endsection