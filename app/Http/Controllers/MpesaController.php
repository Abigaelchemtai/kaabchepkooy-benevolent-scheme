<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Safaricom\Mpesa\Mpesa;
use App\Models\Contribution;
use Illuminate\Support\Facades\Auth;

class MpesaController extends Controller
{
    public function stkPush(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'amount' => 'required|numeric|min:10'
        ]);

        $mpesa = new Mpesa();

        $BusinessShortCode = env('MPESA_SHORT_CODE');
        $PartyA = $request->phone;
        $PartyB = env('MPESA_SHORT_CODE');
        $AccountReference = "Kaabchepkooy Fund";
        $TransactionDesc = "Membership Tier Contribution";
        $Amount = $request->amount;
        $CallBackURL = env('MPESA_CALLBACK_URL');
        $PhoneNumber = $request->phone;

        $response = $mpesa->STKPushSimulation(
            $BusinessShortCode,
            env('MPESA_PASSKEY'),
            $Amount,
            $PartyA,
            $PartyB,
            $PhoneNumber,
            $CallBackURL,
            $AccountReference,
            $TransactionDesc
        );

        // Save as pending
        if (json_decode($response)->ResponseCode == "0") {
            Contribution::create([
                'user_id' => Auth::id(),
                'amount' => $Amount,
                'frequency' => 'monthly',
                'status' => 'pending',
                'payment_method' => 'mpesa',
                'notes' => 'STK request sent.'
            ]);
            return back()->with('success', 'STK Push sent successfully. Complete payment on your phone.');
        } else {
            return back()->with('error', 'Failed to send STK push. Try again.');
        }
    }

    // M-Pesa Callback
    public function callback(Request $request)
    {
        \Log::info('MPESA CALLBACK:', $request->all());

        // You can parse and confirm the payment from here and update contributions
    }
}
