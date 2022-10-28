@extends('layouts.Admin')


@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
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
            <th scope="col">Order_id</th>
            <th scope="col">Amount</th>
            <th scope="col">Provider</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            <?php $counter = 1; ?>
            @foreach ($Payment_detail as $Payment_details)
            <tr>
                <td>{{$counter}}</td>
                <td>{{$Payment_details->order_id}}</td>
                <td>{{$Payment_details->amount}}</td>
                <td>{{$Payment_details->provider}}</td>
                <td>{{$Payment_details->status}}</td>

                <td><a href="/edit_payment/{{$Payment_details->id}}"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp; &nbsp;
                <a href="/delete_payment/{{$Payment_details->id}}"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>
            <?php   $counter++; ?>
            @endforeach
            </tbody>
       </table>
</div>
@endsection