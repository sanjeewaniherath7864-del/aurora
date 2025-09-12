@extends('layouts.staffView')
@section('style')
    .table-img{
        aspect-ratio:1;
        object-fit:contain;
        height:100%;
        border-radius:.5rem;
        background-color:var(--color-green-light-1);
    }
@endsection

@section('header')
    <script defer type="module" src="/js/createBtnHandle.js"></script>

@endsection

@section('table')

<div class="option_bar" >
        <button class="create" data-id="{{$user?$user->id : ' '}}" data-path="products">create +</button>
    
        <input type="search" placeholder="Search by #Id" data-search="products"/>

    <div class="filter" >
        sort by 
        <select value="{{$sortBy}}" s name="filter" id="filter" data-search="products">
            <option {{$sortBy == "id" ? 'selected' :''}} value="id">product id</option>
            <option value="name" {{$sortBy=='name'?'selected':''}} >
                name
            </option>
            <option value="stoke" {{$sortBy=='stoke'?'selected':''}}>stoke</option>
            <option value="price" {{$sortBy=='price'?'selected':''}}>price</option>
        </select>
    </div>
</div>

<table class="staff-view-table">
    <tr>
        <th>product id</th>
        <th>image</th>
        <th>product name</th>
        <th>unit</th>
        <th>stoke</th>            
        <th>price</th>
    </tr>
    @foreach ($products as $product )
    <tr>
            <td>{{$product->id}}</td>

            <td><img src="{{$product->img}}" class="table-img"></td>

            <td>{{$product->name}}</td>

            <td>{{$product->unit}}</td>
            <td>{{$product->stoke}}</td>
            <td class="util-lkr">{{$product->price}}</td>
        </tr>
    @endforeach
</table>

@endsection