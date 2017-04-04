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
    	$testees = $request->input('testees');
        return redirect('orderConfirmation')->with(['testees' => $testees]);
    }
    
     /**
     *  GET '/'
     *
     */
    public function confirmOrder() {
        $testees = session('testees');
        return view('orderConfirmation')->with(['testees' => $testees]);
    }
}
