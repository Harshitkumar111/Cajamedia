<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
 public function index(){
     return view('Admin.PayPal.index');
 }
 public function processPaypal( Request $request){
    
    $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('processSuccess'),
                "cancel_url" => route('paypalCancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" =>  $request->input('Payment')
                    ]
                ]
            ]
        ]);
       
if (isset($response['id']) && $response['id'] != null) {

    // redirect to approve href
    foreach ($response['links'] as $links) {
        if ($links['rel'] == 'approve') {
            return redirect()->away($links['href']);
        }
    }

    return redirect()
        ->route('paypalCreate')
        ->with('error', 'Something went wrong.');

  }
   else {
    return redirect()
        ->route('paypalCreate')
        ->with('error', $response['message'] ?? 'Something went wrong.');
}
}


public function processSuccess(Request $request)
{

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('paypalCreate')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('paypalCreate')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }

}

 public function processCancel(Request $request)
    {
        return redirect()
            ->route('paypalCreate')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
 }
