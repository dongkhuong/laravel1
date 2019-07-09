@extends('layout')
@section('content')
    <h1>Customer List</h1>
    <p><a href="customers/create">Add new Customer</a></p>
    <br/>
    <div class="row">
    <h2>All Customers</h2>
    <ul>
        @foreach ($customers as $customer)
    <li>{{$customer->name}} ({{$customer->email}}) - {{$customer->company->name}}</li>    
        @endforeach
    </ul>
    </div>
    <hr/>
    <div class="row">
        <div class="col-6">
            <h2>Active Customers</h2>
            <ul>
                @foreach ($activeCustomers as $customer)
                <li>{{$customer->name}} ({{$customer->email}})</li>    
                @endforeach
            </ul>
        </div>
        <div class="col-6">
            <h2>Inactive Customers</h2>
            <ul>
                @foreach ($inactiveCustomers as $customer)
                <li>{{$customer->name}} ({{$customer->email}})</li>    
                @endforeach
            </ul>
        </div>
    </div>
@endsection