{{-- /resources/views/orderConfirmation.blade.php --}}
@extends('master')

@section('title')
    Order Form
@endsection

@section('content')
    <h1>Order Form</h1>

    <form method='POST' action='/orderProcessing'>
    
        {{ csrf_field() }}

        <input type="radio" name="primate" value="gibbon" id="gibbon">
        <label for="gibbon">Gibbon</label><br>
        <input type="radio" name="primate" value="lemur" id="lemur">
        <label for="lemur">Lemur</label><br>
        <input type="radio" name="primate" value="marmoset" id="marmoset">
        <label for="marmoset">Marmoset</label><br>
        <input type="radio" name="primate" value="orangutan" id="orangutan">
        <label for="orangutan">Orangutan</label><br>
        <input type="radio" name="primate" value="tarsier" id="tarsier">
        <label for="tarsier">Tarsier</label><br>
        
        <label for="size">Select Size</label>
        <select name="size" id="size">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large" selected>Large</option>
            <option value="xlarge">X Large</option>
        </select><br>
        
        <br>
        <label for='name'>Name</label>
        <input type='text' name='name' id='name' value='{{ $name or '' }}'><br>
        
        <label for='address'>Address</label>
        <input type='text' name='address' id='address' value='{{ $address or '' }}'><br>
        
        <label for='city'>City/Town</label>
        <input type='text' name='city' id='city' value='{{ $city or '' }}'><br>
        
        <label for="state">State</label>
        <select name="state" id="state">
            <option value="ct">CT</option>
            <option value="ma">MA</option>
            <option value="me">ME</option>
            <option value="nh">NH</option>
            <option value="ri">RI</option>
            <option value="vt">VT</option>
        </select><br>
        
        <label for='zip'>Zip Code</label>
        <input type='text' name='zip' id='zip' value='{{ $zip or '' }}'><br>
        
        <br>
        <input type="checkbox" name="twoDay" value="twoDay">
        <label for="twoDay">Include 2 Day Shipping for $4.99</label><br>
        
        <label for="payment">Payment Type</label>
        <select name="payment" id="payment">
            <option value="vista">Vista</option>
            <option value="misterCard">Mister Card</option>
            <option value="payBuddy">Pay Buddy</option>
        </select><br>

        <br>
        <input type='submit' class='btn btn-primary btn-small'>

    </form>
    
@endsection