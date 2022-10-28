@extends('layouts.Admin')


@section('content')


<div class="container table-member">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Sn</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">SKU</th>
            <th scope="col">Catagory_id</th>
            <th scope="col">Inventoey_id</th>
            <th scope="col">	Price</th>
            <th scope="col">	Discount_id</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
       
        <tbody>
             <?php $counter = 1; ?>
            @foreach ($order_items as $products)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$products->order_id}}</td>
                        <td>{{$products->product_id	}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>{{$products->category_id}}</td>
                        <td>{{$products->inventoey_id}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->discount_id}}</td>
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