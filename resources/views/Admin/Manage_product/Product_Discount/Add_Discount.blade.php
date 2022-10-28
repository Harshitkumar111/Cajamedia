@extends('layouts.Admin')


@section('content')
<form action="/savediscount" class="form" method="POST">

    @if(session()->has('error'))
    <div class="alert alert-error">
    {{ session()->get('error') }}
    </div>
    @endif

<h2>PRODUCT DISCOUNT</h2>
@csrf
    <label>Product Discount</label>
    <br>
    <input type="text" placeholder="Product Discount" name="product_discount_name"  >
    <br><br>
    <label>Description</label><br>
    <textarea name="product_description_name"  cols="99" rows="3"  placeholder="Enter Description "></textarea><br>
    <label>Discount Percent</label>
    <br>
    <input type="text" placeholder="Product Discount" name="product_percent"  >
    <br><br>
    <br><br>
    <button>Submit</button>
</form>

    
 
 
  

    


@endsection