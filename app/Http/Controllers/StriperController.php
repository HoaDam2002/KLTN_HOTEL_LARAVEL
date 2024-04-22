<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Stripe\Stripe;
use Carbon\Carbon;

class StriperController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function checkout(Request $request)
    {

        $data = $request->all();

        if (!auth()->check()) {
            return redirect()->route('login');
        } else {
            session()->put('deposit',$data);

            $courseItems = [];

            Stripe::setApiKey(config('stripe.sk'));

            $courseItems[] = [
                'price_data' => [
                    'currency' => 'USD',
                    'unit_amount' => $data['deposits'] * 100,
                    'product_data' => [
                        'name' => $data['name'],
                    ],
                ],
                'quantity' => 1,
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
        session()->forget('deposit');

        $checkin = Carbon::parse($data['check_in'])->setTime(14, 0, 0);
        $checkout = Carbon::parse($data['check_out'])->setTime(12, 0, 0);


        $data['check_in'] = $checkin;
        $data['check_out'] = $checkout;

        $id_account = Auth::id();
        $customer = Customer::with('account', 'user')->where('id_account', $id_account)->first()->toArray();
        $id_user = $customer['id_user'];
        $data['id_user'] = $id_user;
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
    public function cancel(Request $request)
    {
        return Redirect()->back()->withErrors('Your booking have been canceled!');
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
