{{-- /resources/views/orderConfirmation.blade.php --}}
@extends('master')

@section('title')
    Order Form
@endsection

@section('content')
    <h1>Order Form</h1>

    <form method='POST' action='/orderProcessing'>
    
        {{ csrf_field() }}

        <label for='testees'>Is this thing on?</label>
        <input type='text' name='testees' id='testees' value='{{ $testees or '' }}'>


        <br>
        <input type='submit' class='btn btn-primary btn-small'>

    </form>
    
@endsection