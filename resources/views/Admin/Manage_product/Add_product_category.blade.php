@extends('layouts.Admin')


@section('content')

<form action="/savecatrgory" class="form" method="POST">

    @if(session()->has('error'))
    <div class="alert alert-error">
    {{ session()->get('error') }}
    </div>
    @endif

<h2>ADD PRODUCT CATEGOEY</h2>
@csrf
    <label>Product Category Name</label>
    <br>
    <input type="text" placeholder="Product Category Name" name="product_category_name" >
    <br><br>
    <label>Description</label><br>
    <textarea name="product_description_name"  cols="99" rows="3"  placeholder="Enter Description "></textarea>
    

    <br><br>
    <button>Submit</button>
</form>

    


@endsection