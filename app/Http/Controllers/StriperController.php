<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Stripe\Stripe;

class StriperController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function checkout(Request $request)
    {

        $data = $request->all();

        if (!auth()->check()) {
            // session(['checkout_after_login' => true]);

            return redirect()->route('login');
        } else {
            session()->put('deposit',$data);

            $courseItems = [];

            Stripe::setApiKey(config('stripe.sk'));

            $courseItems[] = [
                'price_data' => [
                    'currency' => 'USD',
                    'unit_amount' => $data['price'] * 100,
                    'product_data' => [
                        'name' => $data['name'],
                    ],
                ],
                'quantity' => $data['quantity'],
            ];
    
            $checkoutSession = \Stripe\Checkout\Session::create([
                'line_items' => $courseItems,
                'mode' => 'payment',
                'allow_promotion_codes' => true,
                'metadata' => [
                    'user_id' => auth()->user()->id,
                ],
                'customer_email' => !empty(auth()->user()) ? auth()->user()->email : null,
                'success_url' => route('success'),
                'cancel_url' => route('cancel'),
            ]);

            return redirect()->away($checkoutSession->url);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function success()
    {
        $data = session('deposit');

        $data['id_user'] = auth()->user()->id;
        $data['status'] = 'pending'; 

        if(!empty($data)){
            if(Booking::create($data)){
                return redirect()->route('list_booking');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}