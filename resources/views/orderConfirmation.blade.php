{{-- /resources/views/orderConfirmation.blade.php --}}
@extends('master')

@section('title')
    Order Confirmation
@endsection

@section('content')
    <h1>Order Confirmation</h1>

    <div>
        Your order of 1 {{ $size }} {{ $primate }} shirt is being processed.<br>
        
        <br>
        Delivery Address:<br>
        {{ $name }}<br>
        {{ $address }}<br>
        {{ $city }}, {{ $state }} {{ $zip }}<br>
        
        <br>
        It will arrive by {{ $deliveryDate }}<br>
        
        <br>
        Total: ${{ $price }} is being processed on your {{ $payment }}.        
    </div>
    
@endsection