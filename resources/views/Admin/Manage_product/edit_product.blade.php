@extends('layouts.Admin')


@section('content')

<form action="/updateproduct/{{$product->id}}" class="form" method="POST">

    @if(session()->has('error'))
    <div class="alert alert-error">
    {{ session()->get('error') }}
    </div>
    @endif
    <h2>EDIT PRODUCT </h2>
    @csrf
    <label>Product Name</label><br>
    <input type="text" name="product_name" placeholder="Enter Product Name" value="{{$product->name}}" ><br><br>
    <label> Description </label><br>
    
    <textarea name="desc"  cols="99" rows="3" placeholder="Enter Product Description"   >{{$product->desc}}</textarea>

    <br>
    <label>SKU</label><br>
    <input type="text" name="sku" placeholder="SKU" value="{{$product->SKU}}" ><br><br>
 
    <label>Price</label><br>
    <input type="text" name="product_price" placeholder="Enter Price" value="{{$product->price}}" ><br><br>
    <label>Product Quantity</label><br>
    <input type="text" name="product_quantity" placeholder="Product Quantity" value="{{$product->inventoey_id}}"><br><br>
    <label>Discount Id</label><br>
    <input type="text" name="discount_id" placeholder="Enter Discount Prize" value="{{$product->discount_id}}"><br><br>
    <label>Product Category</label>
    <select name="product_category_id" > &nbsp;&nbsp;&nbsp;
         <option value="">------- </option>
         @foreach ($Product_category as $product_categorys)
         <option value="{{$product_categorys->id}}" <?php if($product->category_id==$product_categorys->id){ echo "selected";} ?>>{{$product_categorys->name}}</option>
         
       @endforeach
    </select><br><br>
  
    <button >Submit</button>

</form>

    


@endsection