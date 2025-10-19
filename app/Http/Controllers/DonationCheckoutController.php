<?php
namespace App\Http\Controllers;

use App\Models\Cause;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;

class DonationCheckoutController extends Controller
{
    public function create(Request $request, Cause $cause)
    {
        if (in_array($cause->status, ['completed','canceled'], true)) {
            return back()->with('error','Donations are closed for this cause.');
        }

        $rules = ['amount' => 'required|numeric|min:0.5', 'message' => 'nullable|string|max:1000'];
        if (!auth()->check()) $rules['donor_name'] = 'required|string|max:255';
        $data = $request->validate($rules);

        $donorName = auth()->check() ? auth()->user()->name : $data['donor_name'];
        $amountCents = (int) round($data['amount'] * 100);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = CheckoutSession::create([
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'customer_email' => auth()->check() ? auth()->user()->email : null,
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Donation: '.$cause->title,
                        'description' => 'Cause #'.$cause->id,
                    ],
                    'unit_amount' => $amountCents,
                ],
                'quantity' => 1,
            ]],
            'metadata' => [
                'cause_id' => (string)$cause->id,
                'donor_name' => $donorName,
                'message' => $data['message'] ?? '',
                'user_id' => auth()->id() ?: '',
            ],
            'success_url' => route('donations.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('donations.cancel', ['cause' => $cause->id]),
        ]);

        // redirect to Stripe Checkout
        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        return view('donations.success');
    }

    public function cancel(Request $request)
    {
        $causeId = $request->query('cause');
        return redirect()->route('causes.show', $causeId)->with('info','Donation canceled.');
    }
}
