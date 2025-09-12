@extends('layouts.userView');

@section('style')
    .re-container{
        min-height:fit-content;
        height: 40vh;
        display:flex;
        justify-content:center;
        align-content:center;
        flex-direction:column;
        width:100%;
    }

    a.btn-redirect{
        height:fit-content;
        margin:2rem auto;
    }
@endSection

@section('content')

<div class="re-container">
    <h3 style="text-align:center;display:inline;">Your order is <span class="highlight">complete </span> (order id #{{$order->id}})</h3>
    <a href="/{{$user->id}}" class="secondary-btn btn-redirect" style="height:fit-content;"  >go to home &rarr;</a>
</div>
@endsection