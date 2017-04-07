{{-- /resources/views/orderConfirmation.blade.php --}}
@extends('master')

@section('title')
    Order Form
@endsection

@section('content')
    <h1>Order Form</h1>
    
    <p>Show everyone who your favorite animal friend is with a special T-Shirt!<br>
        Our all-cotton T's can be shipped anywhere in the 6 state New England area.<br>
        Only &#36;19.95 &#43; sales tax. Free 4 week shipping included.
    </p>
    
    <p>Who is your Prime Mate?</p>

    <form method='POST' action='/orderProcessing'>
    
        {{ csrf_field() }}

        @if($errors->get('primate'))
            <span class='error'>{{ $errors->get('primate')[0] }}</span>
        @endif
        <br>
        
        <input type="radio" name="primate" value="gibbon" id="gibbon"
                @if (old("primate")=='gibbon') {{ 'checked' }} @endif>
        <label for="gibbon">Gibbon</label><br>
        <input type="radio" name="primate" value="lemur" id="lemur"
                @if (old("primate")=='lemur') {{ 'checked' }} @endif>
        <label for="lemur">Lemur</label><br>
        <input type="radio" name="primate" value="marmoset" id="marmoset"
                @if (old("primate")=='marmoset') {{ 'checked' }} @endif>
        <label for="marmoset">Marmoset</label><br>
        <input type="radio" name="primate" value="orangutan" id="orangutan"
                @if (old("primate")=='orangutan') {{ 'checked' }} @endif>
        <label for="orangutan">Orangutan</label><br>
        <input type="radio" name="primate" value="tarsier" id="tarsier"
                @if (old("primate")=='tarsier') {{ 'checked' }} @endif>
        <label for="tarsier">Tarsier</label>
        <br>
        
        <br>
        <label for="size">Select Size</label>
        <br>
        
        <select name="size" id="size">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large" selected>Large</option>
            <option value="xlarge">X Large</option>
        </select>
        <br>
        
        <br>
        <label for='name'>Name</label>
        <input type='text' name='name' id='name' value='{{ old("name") }}'>
        @if($errors->get('name'))
            <span class='error'>{{ $errors->get('name')[0] }}</span>
        @endif
        <br>
        
        <label for='address'>Address</label>
        <input type='text' name='address' id='address' value='{{ old("address") }}'>
        @if($errors->get('address'))
            <span class='error'>{{ $errors->get('address')[0] }}</span>
        @endif
        <br>
        
        <label for='city'>City/Town</label>
        <input type='text' name='city' id='city' value='{{ old("city") }}'>
        @if($errors->get('city'))
            <span class='error'>{{ $errors->get('city')[0] }}</span>
        @endif
        <br>
        
        <label for="state">State</label>
        <select name="state" id="state">
            <option value="">-</option>
            <option value="ct" @if(old("state")=='ct') {{ 'selected' }} @endif>CT</option>
            <option value="ma" @if(old("state")=='ma') {{ 'selected' }} @endif>MA</option>
            <option value="me" @if(old("state")=='me') {{ 'selected' }} @endif>ME</option>
            <option value="nh" @if(old("state")=='nh') {{ 'selected' }} @endif>NH</option>
            <option value="ri" @if(old("state")=='ri') {{ 'selected' }} @endif>RI</option>
            <option value="vt" @if(old("state")=='vt') {{ 'selected' }} @endif>VT</option>
        </select>
        @if($errors->get('state'))
            <span class='error'>{{ $errors->get('state')[0] }}</span>
        @endif
        <br>
        
        <label for='zip'>Zip Code</label>
        <input type='text' name='zip' id='zip' value='{{ old("zip") }}'>
        @if($errors->get('zip'))
            <span class='error'>{{ $errors->get('zip')[0] }}</span>
        @endif
        <br>
        
        <br>
        <input type="checkbox" name="twoDay" id="twoDay" value="twoDay">
        <label for="twoDay">Include 2 Day Shipping for $4.99</label><br>
        
        <label for="payment">Payment Type</label>
        <select name="payment" id="payment">
            <option value="">-</option>
            <option value="vista" 
                    @if(old("payment")=='vista') {{ 'selected' }} @endif>Vista</option>
            <option value="misterCard" 
                    @if(old("payment")=='misterCard') {{ 'selected' }} 
                            @endif>MisterCard</option>
            <option value="payBuddy" 
                    @if(old("payment")=='payBuddy') {{ 'selected' }} 
                            @endif>PayBuddy</option>
        </select>
        @if($errors->get('payment'))
            <span class='error'>{{ $errors->get('payment')[0] }}</span>
        @endif
        <br>

        <br>
        <input type='submit' class='button' value='Place Order'>

    </form>
    
@endsection