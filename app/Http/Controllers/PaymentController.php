<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function show(Request $request)
    {
        $plan   = $request->query('plan');
        $amount = $request->query('amount');
        return view('payment', compact('plan', 'amount'));
    }

    public function process(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'amount'      => 'required|numeric|min:1',
            'name_on_card'=> 'required|string|max:255',
            'card_number' => 'required|string|min:13|max:19',
            'expiry_date' => 'required|string',
            'cvc'         => 'required|string|min:3|max:4',
        ]);

        // Set Stripe API Key
        Stripe::setApiKey(config('services.stripe.secret'));

        // Create a fake token from card inputs manually (if you are not using Stripe.js)
        $token = \Stripe\Token::create([
            'card' => [
                'number'    => $request->card_number,
                'exp_month' => explode('/', $request->expiry_date)[0],
                'exp_year'  => explode('/', $request->expiry_date)[1],
                'cvc'       => $request->cvc,
            ],
        ]);

        // Create a charge
        $charge = Charge::create([
            'amount'      => $request->amount * 100, // Stripe expects cents
            'currency'    => 'usd',
            'description' => 'Property Purchase',
            'source'      => $token->id,
        ]);

        // Save payment only if successful
        if ($charge->status == 'succeeded') {
            $payment = Payment::create([
                'name_on_card'      => $request->input('name_on_card'),
                'card_last_four'    => substr($request->input('card_number'), -4),
                'amount'            => $request->input('amount'),
                'payment_status'    => 'success',
                'stripe_payment_id' => $charge->id,
            ]);

            return redirect()->route('payment.form')->with('success', 'Payment successful!');
        } else {
            return redirect()->route('payment.form')->with('error', 'Payment failed, try again.');
        }
    }
}
