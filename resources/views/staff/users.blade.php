@extends('layouts.staffView')

@section("style")
    .text-align-left{
        text-align:left;
    }
@endsection

@section('header')
    <script defer type="module" src="/js/createBtnHandle.js"></script>

@endsection

@section('table')

<div class="option_bar" >
    <button class="create" data-id="{{$user?$user->id : ' '}}" data-path="users">create +</button>
    
        <input type="search" placeholder="Search by #Id" data-search="users" data-id="{{$user?$user->id : ' '}}"/>

    <div class="filter" >
        sort by 
        <select value="{{$sortBy}}" name="filter" id="filter" data-search="users">
            <option {{$sortBy == "id" ? 'selected' :''}} value="id">
                user id
            </option>

            <option value="name" {{$sortBy=='name'?'selected':''}} >
                name
            </option>
            <option value="email" {{$sortBy=='email'?'selected':''}} >
                email
            </option>
        </select>
    </div>
</div>

<table class="staff-view-table">
    <tr>
        <th>user id</th>
        <th>name</th>
        <th>email</th>
        <th>role</th>
        <th>cleark</th>

    </tr>
    @foreach ($users as $user )
        <tr>
                <td>{{$user->id}}</td>

                <td class="text-align-left">{{$user->name}}</td>

                <td class="text-align-left">{{$user->email}}</td>
                
                <td>{{$user->role}}</td>
 
                <td>{{$user->clerk ? $user->clerk : "-"}}</td>

                
            </tr>
    @endforeach
</table>

@endsection