@extends('layouts.Admin')


@section('content')
          
     <a href="/addproduct"id="addmember">Add Product</a>
     
     @if(session()->has('successs'))
     <div class="alert alert-success">
     {{ session()->get('successs') }}
     </div>
     @endif



     <div class="container table-member">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Sn</th>
                  <th scope="col">Product  Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">SKU</th>
                  <th scope="col">Catagory</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col">Discount Name</th>
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
                              <td>{{$products->SKU}}</td>
                              <td>{{Helper::get_category($products->category_id)}}</td>
                              <td>{{Helper::get_quantity($products->inventoey_id)}}</td>
                              <td>{{$products->price}}</td>
                              <td>{{Helper::get_discount($products->discount_id)}}</td>
                              <td><a href="/editproduct/{{$products->id}}"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp; &nbsp;
                                <a href="/deleteproduct/{{$products->id}}"><i class="fa-solid fa-trash"></i></a>
                            </td>
                            </tr>
                            <?php   $counter++; ?>
                          @endforeach
              </tbody>
            </table>
          </div>
  



@endsection