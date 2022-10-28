@extends('layouts.Admin')


@section('content')
<a href="/adddiscount"id="addmember">Add Discount</a>

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
            <th scope="col">Product Discount</th>
            <th scope="col">Description </th>
            <th scope="col">Discount Percent</th>
            <th scope="col">Active Discount</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
             <?php $counter = 1; ?>
            @foreach ($discount as $discounts)
                    <tr>
                        <td>{{$counter}}</td>
                        <td>{{$discounts->name}}</td>
                        <td>{{$discounts->desc}}</td>
                        <td>{{$discounts->discount_percent}}</td>
                        <td>
                            <?php if($discounts->active==0) {echo "Active";} ?>
                            <?php if($discounts->active==1) {echo "Inactive";} ?>
                        
                        </td>
                        <td><a href="/editdiscount/{{$discounts->id}}"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp; &nbsp;
                          <a href="/deletediscount/{{$discounts->id}}"><i class="fa-solid fa-trash"></i></a>
                      </td>
                      </tr>
                      <?php   $counter++; ?>
                    @endforeach
        </tbody>
      </table>
    </div>
    

    


@endsection