@extends('layouts.Admin')


@section('content')

<form action="/saveproduct" class="form" method="POST" >

    {{-- ------add product---  message--------- --}}
    
    
    
    @if(session()->has('error'))
    <div class="alert alert-error">
    {{ session()->get('error') }}
    </div>
    @endif

              @csrf
              <label>Product Name</label><br>
              <input type="text" name="product_name" placeholder="Enter Product Name" ><br><br>
              <label> Description </label><br>
              
              <textarea name="desc"  cols="99" rows="3" placeholder="Enter Product Description"  ></textarea>

              <br>
              <label>SKU</label><br>
              <input type="text" name="sku" placeholder="SKU"  ><br><br>
           
              <label>Price</label><br>
              <input type="text" name="product_price" placeholder="Enter Price"  ><br><br>
              <label>Product Quantity</label><br>
              <input type="text" name="product_quantity" placeholder="Product Quantity"><br><br>
              <label>Discount Offer</label>
              <select name="discount_id" > &nbsp;&nbsp;&nbsp;
               <option value="">------- </option>
               @foreach ($Product_discount as $Product_discounts)
               <option value="{{$Product_discounts->id}}">{{$Product_discounts->name}}</option>
               
             @endforeach
          </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <label>Product Category</label>
              <select name="product_category_id" > &nbsp;&nbsp;&nbsp;
                   <option value="">------- </option>
                   @foreach ($Product_category as $product_categorys)
                   <option value="{{$product_categorys->id}}">{{$product_categorys->name}}</option>
                   
                 @endforeach
              </select><br><br>
            
              <button >Submit</button>
         </form>
    


@endsection