<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     *  GET '/'
     *
     */
    public function showOrderForm() {
        return view('orderForm');
    }
    
    /**
     *  POST '/orderProcessing'
     *
     */
    public function processOrder(Request $request) {
    
        # Validate the request data
            $this->validate($request, [
                'primate' => 'required',
                
                # http://stackoverflow.com/questions/34099777/laravel-5-1-validation-rule-alpha-cannot-take-whitespace
                #http://stackoverflow.com/questions/26720865/laravel-validate-only-letters-numbers-and-spaces-using-regex
                #/(^[A-Za-z0-9 ]+$)+/'
                #/^[A-Za-z0-9 ]+$/u'
                #/^[\pL\s\-]+$/u'
                'name' => 'required|regex:/^[A-Za-z ]+$/u',
                'address' => 'required|regex:/^[A-Za-z0-9 .]+$/u',
                'city' => 'required|regex:/^[A-Za-z ]+$/u',
                'state' => 'size:2',
                'zip' => 'required|numeric|digits:5',
                'payment' => 'min:2',
            ]);
    
    	$primate = $request->input('primate');
    	$size = $request->input('size');
    	$name = $request->input('name');
    	$address = $request->input('address');
    	$city = $request->input('city');
    	$state = $request->input('state');
    	$zip = $request->input('zip');
    	$twoDay = $request->input('twoDay');
    	$payment = $request->input('payment');
    	
    	if($state == 'ct'){
    	    $tax = 1.0635;
    	} else if($state == 'ma'){
    	    $tax = 1.0625;
    	} else if($state == 'me'){
    	    $tax = 1.055;
    	} else if($state == 'nh'){
    	    $tax = 1;
    	} else if($state == 'ri'){
    	    $tax = 1.07;
    	} else {
    	    $tax = 1.0614;
    	}
    	
    	$price = 19.95 * $tax;
    	if($twoDay) {
    	    $price += 4.95;
    	}
    	
    	date_default_timezone_set('America/New_York');
    	$deliveryTime = ($twoDay) ? 2 : 28;
    	$deliveryTimecode = 
    	    mktime(0, 0, 0, date("m"), date("d") + $deliveryTime, date("Y") );
    	$deliveryDate = date("F jS", $deliveryTimecode);
    	
    	
    	
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
            'price' => $price]);
    }
    
     /**
     *  GET '/orderConfirmation'
     *
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
        $price = session('price');
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
            'payment' => $payment]);
    }
}
