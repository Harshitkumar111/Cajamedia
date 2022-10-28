@extends('layouts.Admin')


@section('content')

<form action="/updatecategory/{{$product->id}}" class="form" method="POST">

    @if(session()->has('error'))
    <div class="alert alert-error">
    {{ session()->get('error') }}
    </div>
    @endif

<h2>EDIT PRODUCT CATEGOEY</h2>
@csrf
    <label>Product Category Name</label>
    <br>
    <input type="text" placeholder="Product Category Name" name="product_category_name"  value="{{$product->name}}">
    <br><br>
    <label>Description</label><br>
    <textarea name="product_description_name"  cols="99" rows="3"  >{{$product->desc}} </textarea>

    <br><br>
    <button>Submit</button>
</form>

    


@endsection