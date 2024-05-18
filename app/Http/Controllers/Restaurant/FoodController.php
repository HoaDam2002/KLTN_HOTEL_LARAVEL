<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddFood;
use App\Http\Requests\addfoodRequest;
use App\Models\Booking_realtime;
use App\Models\Customer;
use App\Models\Food;
use App\Models\InvoiceFood;
use App\Models\InvoiceFoodDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $id_account = Auth::id();
            $id_user = Customer::where("id_account", $id_account)->value('id_user');
            $name_user = User::where('id', $id_user)->value('name');
            return view('pages.food_service.food_home',compact('name_user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function food_manager()
    {
        $food = Food::paginate(5);

        return view('pages.food_service.food_manation', compact('food'));
    }

    public function add_food(addfoodRequest $request)
    {
        $data = $request->all();

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));

        $file = $data['image'];

        $data['image'] =  $date . '_' . $file->getClientOriginalName();

        $data['status'] = 'available';

        if (!is_dir('restaurant/food/')) {
            mkdir('restaurant/food/', 0777, true);
        }

        if (Food::create($data)) {
            $file->move('restaurant/food/', $date . '_' . $file->getClientOriginalName());
            return redirect()->back()->with('success', __('ADD Food Success'));
        }
        return redirect()->back()->withErrors('ADD Food Fail');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function food_order(Request $request)
    {
        $customer = User::whereHas('booking_realtime', function ($query) {
            $query->where('status', 'checkin');
        })->with(['customer', 'customer_no_acc', 'booking_realtime' => function ($query) {
            $query->where('status', 'checkin');
        }])->get()->toArray();

        dd($customer);

        return view('pages.food_service.food_order', compact('customer'));
    }

    public function food_order_post(Request $request)
    {

        try {
            // Kiểm tra dữ liệu có tồn tại và hợp lệ không
            if (!$request->has('arr') || !$request->has('id_user') || !$request->has('name_user') || !$request->has('id_booking_realtime')) {
                throw new \Exception('Invalid request data.');
            }

            $data = $request->all();

            $items = json_decode($data['arr']);
            $infor = json_decode($data['infor']);

            $id_user = $data['id_user'];
            $name_user = $data['name_user'];
            $id_booking_realtime = $data['id_booking_realtime'];

            $data_pdf['name_user'] = $name_user;

            if ($invoice_food = InvoiceFood::create(['id_user' => $id_user])) {
                $id_invoice_food = $invoice_food->id;
                $i = 0;
                foreach ($items as $key => $value) {    
                    $invoice_detail = InvoiceFoodDetail::create(['id_booking_realtime' => $id_booking_realtime, 'id_invoice_food' => $id_invoice_food, 'id_food' => key($value), 'quantity' => reset($value),'name_food' => key($infor[$i]), 'price' => reset($infor[$i])]);
                    $food = Food::find(key($value));
                    if ($food) {
                        $data_pdf['food'][] = [$food->toArray(), reset($value)];
                    } else {
                        throw new \Exception('Food not found.');
                    }
                    $i++;
                }

                $pdf = PDF::loadView('pages.invoice.last_invoice', ['data_pdf' => $data_pdf]);

                return $pdf->download("invoice_" . time() . "$name_user.pdf");
            } else {
                throw new \Exception('Failed to create invoice food.');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function search_customer(Request $request)
    {
        $infor = $request->all()['infor'];

        $customer = User::whereHas('booking_realtime', function ($query) {
            $query->where('status', 'checkin');
        })->with(['customer', 'customer_no_acc', 'booking_realtime' => function ($query) {
            $query->where('status', 'checkin');
        }])->where('name', 'like', '%' . $infor . '%')->paginate(5);

        return view('pages.food_service.food_order', compact('customer'));
    }


    /**
     * Display the specified resource.
     */
    public function food_detail(string $id)
    {
        $user = User::whereHas('booking_realtime', function ($query) {
            $query->where('status', 'checkin');
        })->with(['customer', 'customer_no_acc', 'booking_realtime' => function ($query) {
            $query->where('status', 'checkin');
        }])->where('id', $id)->get()->toArray();

        $food = Food::where('status', 'available')->get()->toArray();

        return view('pages.food_service.food_detail_order', compact('user', 'food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function change_status(Request $request)
    {
        $data = $request->all();

        $id_food = $data['id_food'];
        $status = $data['status'];

        $food = Food::findOrFail($id_food);

        $food->status = $status;

        $food->save();
    }

    /**
     * Update the specified resource in storage.
     */
    public function delete_food(Request $request)
    {
        $data = $request->all()['id_food'];

        $food = Food::where('id', $data)->first();

        $image = $food->image;
        $delete = $food->delete();

        if ($delete) {
            unlink('restaurant/food/' . $image);
            return response()->json(['mess' => 'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function fill_modal(Request $request)
    {
        $id_food = $request->all()['id_food'];

        $food = Food::findOrFail($id_food)->toArray();

        return response()->json(['food' => $food]);
    }

    public function edit_food(Request $request, string $id)
    {
        $data = $request->all();

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));

        $food = Food::findOrFail($id);
        $image_old = $food->image;
        $check_image = false;

        if (!empty($data['image'])) {
            $file = $data['image'];
            $data['image'] =  $date . '_' . $file->getClientOriginalName();
            $check_image = true;
            // unlink('customer/avatar/' . $imageOld);
        } else {
            $file = $food->image;
            $data['image'] =  $file;
        }

        if ($food->update($data)) {
            if ($check_image) {
                unlink('restaurant/food/' . $image_old);
                $file->move('restaurant/food/', $date . '_' . $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Edit Food Success'));
        }

        return redirect()->back()->withErrors('ADD Food Fail');
    }

    public function search_food(Request $request)
    {
        $data = $request->all()['infor'];

        $food = Food::where('name', 'like', '%' . $data . '%')->paginate(5);

        return view('pages.food_service.food_manation', compact('food'));
    }

    public function ordered_list()
    {
        $data = InvoiceFood::with(['invoice_detail.food', 'user.booking_realtime' => function ($query) {
            $query->where('status', 'checkin');
        }])->paginate(6);

        return view('pages.food_service.food_ordered_list', compact('data'));
    }

    public function ordered_list_search(Request $request)
    {
        $infor = $request->all()['infor'];

        $data = InvoiceFood::whereHas('user', function ($query) use ($infor) {
            $query->where('name', 'like', '%' . $infor . '%')->orwhere('phone', 'like' , '%' . $infor . '%');
        })
            ->with(['invoice_detail.food', 'user.booking_realtime' => function ($query) {
                $query->where('status', 'checkin');
            }])
            ->paginate(5);

        return view('pages.food_service.food_ordered_list', compact('data'));
    }

    public function printpdf(Request $request)
    {
        $id_invoice = $request->all()['id_invoice'];

        $name_user = $request->all()['name_user'];

        $invoice = InvoiceFood::with('invoice_detail.food')->where('id', $id_invoice)->first()->toArray();

        $data_pdf['name_user'] = $name_user;

        foreach ($invoice['invoice_detail'] as $key => $value) {
            $data_pdf['food'][] = [$value['food'], $value['quantity']];
        }

        $pdf = PDF::loadView('pages.invoice.last_invoice', ['data_pdf' => $data_pdf]);

        return $pdf->download("invoice_$name_user.pdf");
    }

    public function order_detail_search_food(Request $request){
        $name_food = $request->all()['name_food'];

        $food = Food::where('name','like', '%' . $name_food . '%')->get()->toArray();

        return response()->json(['foods' => $food]);
    }

}
