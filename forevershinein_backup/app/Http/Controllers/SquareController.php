<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SquareController extends Controller
{
    public function __construct()
    {
        
    }

    public function refund($paymentId)
    {
        
    }

    public function addCustomer() {

        
        return "";
    }

    public function addCard(Request $request)
    {
        
        return redirect()->back();

    }

    public function charge($customerId, $cardId)
    {

        

    }
}

