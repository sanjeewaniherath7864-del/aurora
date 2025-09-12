@extends('layouts.staffView')

@section('header')
<script src="../../js/orderController.js" type="module"></script>
@endsection

@section('table')

<div class="option_bar" >
    <button class="create">create +</button>
    
        <input type="search" placeholder="Search by #Id" data-search="orders"/>

    <div class="filter" >
        sort by 
        <select value="{{$sortBy}}" s name="filter" id="filter" data-search="orders">
            <option {{$sortBy == "id" ? 'selected' :''}} value="id">
                order id
            </option>

            <option value="status" {{$sortBy=='status'?'selected':''}} >
                status
            </option>

            <option value="vehicle_no" {{$sortBy=='vehicle_no'?'selected':''}} >
                vehicle no
            </option>


            <option value="price" {{$sortBy=='price'?'selected':''}}>
                price
            </option>
        </select>
    </div>
</div>

<table class="staff-view-table">
    <tr>
        <th>order id</th>
        <th>customer</th>
        <th>status</th>
        <th>vehicle no</th>
        <th>distance</th>
        <th>order placed</th>            
        <th>price</th>
    </tr>
    @foreach ($orders as $order )
        <tr data-id="{{$order->id}}">
                <td>{{$order->id}}</td>

                <td>{{$order->customer_name}}</td>

                <td class="txt--{{$order->status}}">{{$order->status}}</td>

                <td>{{$order->vehicle_no ? $order->vehicle_no : "-"}}</td>

                <td>{{$order->distace_traveled}}</td>
                <td>{{$order->place_at}}</td>

                <td class="util-lkr">{{$order->price}}</td>
            </tr>
    @endforeach
</table>

@endsection
