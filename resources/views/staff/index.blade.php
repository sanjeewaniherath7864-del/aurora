@extends("layouts.staffView")
@section('table')


<div class="option_bar">
    <button class="create">create +</button>
    <input type="search" placeholder="Search by #Id"/>
    <div class="filter">
        sort by 
        <select name="filter" id="filter" value="order_date">
            <option value="order_id">order id</option>
            <option value="order_date">order date</option>
            <option value="vehicle_no">vehicle no </option>
        </select>
    </div>
</div>

<table class="staff-view-table">
    <tr>
        <th>order id</th>
        <th>customer name</th>
        <th>status</th>
        <th>order date</th>            
        <th>price</th>
    </tr>
    <tr>
        <td>OR09078676473</td>
        <td>chathura priyashan</td>
        <td class="txt--pending">pending</td>
        <td>12/09/2023</td>
        <td class="util-lkr">1600</td>
    </tr>
    <tr>
        <td>OR09078676473</td>
        <td>chathura priyashan</td>
        <td class="txt--issued">issued</td>
        <td>12/09/2023</td>
        <td class="util-lkr">1600</td>
    </tr>
    <tr>
        <td>OR09078676473</td>
        <td>chathura priyashan</td>
        <td class="txt--shipping">shipping</td>
        <td>12/09/2023</td>
        <td class="util-lkr">1600</td>
    </tr>
    <tr>
        <td>OR09078676473</td>
        <td>chathura priyashan</td>
        <td class="txt--successful">successful</td>
        <td>12/09/2023</td>
        <td class="util-lkr">1600</td>
    </tr>
    <tr>
        <td>OR09078676473</td>
        <td>chathura priyashan</td>
        <td class="txt--canceled">canceled</td>
        <td>12/09/2023</td>
        <td class="util-lkr">1600</td>
    </tr>
</table>

@endsection