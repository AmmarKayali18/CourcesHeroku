<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tap\TapPayment\Facade\TapPayment;


class TestController extends Controller
{
   public function test()
   {
       # code...
    //    4111 1111 1111 1111
    try {
		$payment = TapPayment::createCharge();
		$payment->setCustomerName("John Doe");
		$payment->setCustomerPhone("965", "123456789");
		$payment->setDescription("Some description");
		$payment->setAmount(123);
		$payment->setCurrency("KWD");
		$payment->setSource("4111 1111 1111 1111");
		$payment->setRedirectUrl("https://www.google.com");

		$invoice = $payment->pay();
	} catch( \Exception $exception ) {
		return $exception;
	}
    
    $payment->isSuccess(); // check if TapPayment has successfully handled request.
   }
}
