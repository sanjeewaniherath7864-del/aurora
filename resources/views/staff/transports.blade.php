@extends('layouts.staffView')
@section('table')

<div class="option_bar" >
        <input type="search" placeholder="Search by #Id" data-search="transports"/>

    <div class="filter" >
        sort by 
        <select value="{{$sortBy}}"  name="filter" id="filter" data-search="transports">
            <option {{$sortBy == "id" ? 'selected' :''}} value="id">
                order id
            </option>
            <option {{$sortBy == "id" ? 'selected' :''}} value="id">
                shipped date
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
        <th>vehicle no</th>
        <th>status</th>
        <th>distance</th>
        <th>shipped date</th>            
        <th>customer name</th>            
        <th>price</th>
    </tr>
    @foreach ($orders as $order )
        <tr data-id="{{$order->id}}">
                <td>{{$order->id}}</td>

                <td>{{$order->vehicle_no ? $order->vehicle_no : "-"}}</td>

                <td class="txt--{{$order->status}}">{{$order->status}}</td>
            
                <td>{{$order->distace_traveled}}</td>
                
                <td>{{$order->shipped_date}}</td>

                <td>{{$order->customer_name}}</td>

                <td class="util-lkr">{{$order->price}}</td>
            </tr>
    @endforeach
</table>



@endsection