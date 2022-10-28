@extends('layouts.Admin')


@section('content')
<form action="/updatediscount/{{$discount->id}}" class="form" method="POST">

    @if(session()->has('error'))
    <div class="alert alert-error">
    {{ session()->get('error') }}
    </div>
    @endif

<h2>EDIT DISCOUNT</h2>
@csrf
    <label>Product Discount</label>
    <br>
    <input type="text" placeholder="Product Discount" name="product_discount_name" value="{{$discount->name}}" >
    <br><br>
    <label>Description</label><br>
    <textarea name="product_description_name"  cols="99" rows="3"  placeholder="Enter Description ">{{$discount->desc}}</textarea><br>
    <label>Discount Percent</label>
    <br>
    <input type="text" placeholder="Product Discount" name="product_percent" value="{{$discount->discount_percent}}"  >
    <br><br>
    <label>Active</label>
    <select name="active" > &nbsp;&nbsp;&nbsp;
      
        
         <option value="0" <?php if($discount->active==0){ echo "selected";} ?> >Active</option>   
         <option value="1" <?php if($discount->active==1){ echo "selected";} ?> >Inactive</option>   

    </select><br><br>

    <br><br>
    <button>Submit</button>
</form>

    
 
 
  

    


@endsection