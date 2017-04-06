{{-- /resources/views/orderConfirmation.blade.php --}}
@extends('master')

@section('title')
    Order Confirmation
@endsection

@section('content')
    <h1>Order Confirmation</h1>

    <div>
        Your order of 1 {{ $size  }} {{ $primate }} shirt is being processed.<br>
        
        <br>
        Delivery Address:<br>
        {{ $name }}<br>
        {{ $address }}<br>
        {{ $city }}, {{ $state }} {{ $zip }}<br>
        
        <br>
        It will arrive by {{ $deliveryDate }}<br>
        
        <br>
        &#36;19.95<br>
        &#36; {{ $tax }} {{ $state }} sales tax<br>
        &#36; {{ $shipping }} shipping<br>
        <br>
        &#36;{{ $price }} will being processed on your {{ $payment }}.        
    </div>
    
@endsection