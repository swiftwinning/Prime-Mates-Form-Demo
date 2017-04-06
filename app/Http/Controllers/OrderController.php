<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     *  GET '/'
     *  Simply returns Order Form view on page load.
     */
    public function showOrderForm() {
        return view('orderForm');
    }
    
    /**
     *  POST '/orderProcessing'
     *  Does all the calculations for the App:
     *  Calculates price based on sales tax of state and whether 2 day shipping is checked
     *  Calculates delivery date based on whether 2 day shipping is checked
     *  Formats form input to be displayed, e.g. capitalization and round price to cents
     */
    public function processOrder(Request $request) {
    
        # Validate the request data
        # Regular expressions modified from Stack Overflow forum response:
        #   http://stackoverflow.com/questions/26720865/laravel-validate-only-letters-numbers-and-spaces-using-regex
            $this->validate($request, [
                'primate' => 'required',
                'name' => 'required|regex:/^[A-Za-z ]+$/u',
                'address' => 'required|regex:/^[A-Za-z0-9 .]+$/u',
                'city' => 'required|regex:/^[A-Za-z ]+$/u',
                'state' => 'size:2',
                'zip' => 'required|numeric|digits:5',
                'payment' => 'min:2',
            ]);
    
        # Assign each form input to a variable
    	$primate = $request->input('primate');
    	$size = $request->input('size');
    	$name = $request->input('name');
    	$address = $request->input('address');
    	$city = $request->input('city');
    	$state = $request->input('state');
    	$zip = $request->input('zip');
    	$twoDay = $request->input('twoDay');
    	$payment = $request->input('payment');
    	
    	# Determine tax rate corresponding to state it is being shipped to
    	if($state == 'ct'){
    	    $taxRate = 0.0635;
    	} else if($state == 'ma'){
    	    $taxRate = 0.0625;
    	} else if($state == 'me'){
    	    $taxRate = 0.055;
    	} else if($state == 'nh'){
    	    $taxRate = 0;
    	} else if($state == 'ri'){
    	    $taxRate = 0.07;
    	} else {
    	    $taxRate = 0.0614;
    	}
    	
    	# Calculate tax, shipping, and total price
    	$tax = 19.95 * $taxRate;
    	$shipping = ($twoDay) ? 4.95 : 0;
    	$price = 19.95 + $tax + $shipping;
    	
    	# Calculate delivery date using New England's time zone
    	# and using date() to get current date and to format correctly.
    	date_default_timezone_set('America/New_York');
    	$deliveryTime = ($twoDay) ? 2 : 28;
    	$deliveryTimecode = 
    	        mktime(0, 0, 0, date("m"), date("d") + $deliveryTime, date("Y") );
    	$deliveryDate = date("F jS", $deliveryTimecode);
    	
    	# Format $primate, $size, $state, $payment, and all dollar amounts.
    	$primate = ucfirst($primate);
    	$size = ucfirst($size);
    	$payment = ucfirst($payment);
    	$state = strtoupper($state);
    	$tax = number_format($tax, 2);
    	$shipping = number_format($shipping, 2);
    	$price = number_format($price, 2);
    	
    	
        return redirect('orderConfirmation')->with([
            'primate' => $primate,
            'size' => $size,
            'name' => $name,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'deliveryDate' => $deliveryDate,
            'payment' => $payment,
            'tax' => $tax,
            'shipping' => $shipping,
            'price' => $price]);
            
            
            
    }
    
     /**
     *  GET '/orderConfirmation'
     *  Retreive all original form input, calculated totals, and formatted input
     *  from Session storage and pass along to Order Confirmation view for display
     */
    public function confirmOrder() {
        $primate = session('primate');
        $size = session('size');
        $name = session('name');
        $address = session('address');
        $city = session('city');
        $state = session('state');
        $zip = session('zip');
        $deliveryDate = session('deliveryDate');
        $payment = session('payment');
        $tax = session('tax');
        $price = session('price');
        $shipping = session('shipping');
        return view('orderConfirmation')->with([
            'primate' => $primate,
            'size' => $size,
            'name' => $name,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'deliveryDate' => $deliveryDate,
            'price' => $price,
            'tax' => $tax,
            'shipping' => $shipping,
            'payment' => $payment]);
    }
}
