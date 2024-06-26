<?php

namespace App\Http\Controllers;

use App\Http\Requests\addserviceRequest;
use App\Models\Booking_realtime;
use App\Models\Customer;
use App\Models\InvoiceService;
use App\Models\InvoiceServiceDetail;
use App\Models\Service;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $id_account = Auth::id();
            $id_user = Staff::where("id_account", $id_account)->value('id_user');
            $name_user = User::where('id', $id_user)->value('name');
            return view('pages.service_outside.service_home', compact('name_user'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function service_manager()
    {
        $service = Service::paginate(5);

        return view('pages.service_outside.outside_service_manation', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function service_order(Request $request)
    {
        $customer = User::whereHas('booking_realtime', function ($query) {
            $query->where('status', 'checkin');
        })->with(['customer', 'customer_no_acc', 'booking_realtime' => function ($query) {
            $query->where('status', 'checkin');
        }])->orderByDesc('created_at')->paginate(5);

        return view('pages.service_outside.outside_service_order', compact('customer'));
    }

    /**
     * Display the specified resource.
     */
    public function add_service(addserviceRequest $request)
    {
        $data = $request->all();

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));

        $file = $data['image'];

        $data['image'] =  $date . '_' . $file->getClientOriginalName();

        $data['status'] = 'available';

        if (!is_dir('service/')) {
            mkdir('service/', 0777, true);
        }

        if (Service::create($data)) {
            $file->move('service/', $date . '_' . $file->getClientOriginalName());
            return redirect()->back()->with('success', __('ADD Service Success'));
        }
        return redirect()->back()->withErrors('ADD Service Fail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete_service(Request $request)
    {
        $data = $request->all()['id_service'];

        $food = Service::where('id', $data)->first();

        $image = $food->image;
        $delete = $food->delete();

        if ($delete) {
            unlink('service/' . $image);
            return response()->json(['mess' => 'success']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function change_status(Request $request)
    {
        $data = $request->all();

        $id_food = $data['id_service'];
        $status = $data['status'];

        $food = Service::findOrFail($id_food);

        $food->status = $status;

        $food->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function fill_modal(Request $request)
    {
        $id_service = $request->all()['id_service'];

        $service = Service::findOrFail($id_service)->toArray();

        return response()->json(['service' => $service]);
    }

    public function edit_service(Request $request, string $id)
    {
        $data = $request->all();

        // dd($data);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = strtotime(date('Y-m-d H:i:s'));

        $service = Service::findOrFail($id);
        $image_old = $service->image;
        $check_image = false;

        if (!empty($data['image'])) {
            $file = $data['image'];
            $data['image'] =  $date . '_' . $file->getClientOriginalName();
            $check_image = true;
            // unlink('customer/avatar/' . $imageOld);
        } else {
            $file = $service->image;
            $data['image'] =  $file;
        }

        if ($service->update($data)) {
            if ($check_image) {
                unlink('service/' . $image_old);
                $file->move('service/', $date . '_' . $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Edit Service Success'));
        }

        return redirect()->back()->withErrors('Edit Service Fail');
    }

    public function search_service(Request $request)
    {
        $data = $request->all()['infor'];

        $service = Service::where('name', 'like', '%' . $data . '%')->paginate(5);

        return view('pages.service_outside.outside_service_manation', compact('service'));
    }

    public function search_customer(Request $request)
    {
        $infor = $request->all()['infor'];

        $customer = User::whereHas('booking_realtime', function ($query) {
            $query->where('status', 'checkin');
        })->with(['customer', 'customer_no_acc', 'booking_realtime' => function ($query) {
            $query->where('status', 'checkin');
        }])->where('name', 'like', '%' . $infor . '%')->paginate(5);

        return view('pages.service_outside.outside_service_order', compact('customer'));
    }

    public function service_detail(string $id)
    {
        $user = User::whereHas('booking_realtime', function ($query) {
            $query->where('status', 'checkin');
        })->with(['customer', 'customer_no_acc', 'booking_realtime' => function ($query) {
            $query->where('status', 'checkin');
        }])->where('id', $id)->get()->toArray();

        $service = Service::all()->toArray();

        return view('pages.service_outside.outside_service_detail_order', compact('user', 'service'));
    }

    public function service_order_post(Request $request)
    {
        try {
            // Kiểm tra dữ liệu có tồn tại và hợp lệ không
            if (!$request->has('arr') || !$request->has('id_user') || !$request->has('name_user') || !$request->has('id_booking_realtime')) {
                throw new \Exception('Invalid request data.');
            }

            $data = $request->all();

            // dd($data);

            $items = json_decode($data['arr']);
            $infor = json_decode($data['infor']);

            $id_user = $data['id_user'];
            $name_user = $data['name_user'];
            $id_booking_realtime = $data['id_booking_realtime'];

            $data_pdf['name_user'] = $name_user;

            if ($invoice_service = InvoiceService::create(['id_user' => $id_user])) {
                $id_invoice_service = $invoice_service->id;
                $i = 0;
                foreach ($items as $key => $value) {
                    $invoice_detail = InvoiceServiceDetail::create(['id_booking_realtime' => $id_booking_realtime, 'id_invoice_service' => $id_invoice_service, 'id_service' => key($value), 'name_serive' => key($infor[$i]), 'price' => reset($infor[$i])]);
                    $food = Service::find(key($value));
                    if ($food) {
                        $data_pdf['service'][] = [$food->toArray(), reset($value)];
                    } else {
                        throw new \Exception('Food not found.');
                    }
                    $i++;
                }

                $pdf = PDF::loadView('pages.invoice.last_invoice', ['data_pdf' => $data_pdf]);

                return $pdf->download("invoice_service_" . time() . "$name_user.pdf");
            } else {
                throw new \Exception('Failed to create invoice service.');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function ordered_list(Request $request)
    {
        $data = Booking_realtime::with(['invoice_detail_service.invoice', 'user', 'room_detail'])
            ->whereHas('invoice_detail_service.invoice.invoice_detail')
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($booking) {
                // Thu thập tất cả các invoices từ invoice_detail_food
                $invoices = $booking->invoice_detail_service->map(function ($detail) {
                    return $detail->invoice;
                })->flatten()->unique('id');

                $booking->invoices = $invoices;
                unset($booking->invoice_detail_service);
                return $booking;
            })->toArray();
        return view('pages.service_outside.service_ordered_list', compact('data'));
    }

    public function printpdf(Request $request)
    {
        $id_invoice = $request->all()['id_invoice'];

        $name_user = $request->all()['name_user'];

        $invoice = InvoiceService::with('invoice_detail.service')->where('id', $id_invoice)->first()->toArray();

        $data_pdf['name_user'] = $name_user;

        foreach ($invoice['invoice_detail'] as $key => $value) {
            $data_pdf['service'][] = [$value['service'], 1];
        }

        $pdf = PDF::loadView('pages.invoice.last_invoice', ['data_pdf' => $data_pdf]);

        return $pdf->download("invoice_" . time() . "$name_user.pdf");
    }

    public function ordered_list_search(Request $request)
    {
        $infor = $request->all()['infor'];

        $data = Booking_realtime::with(['invoice_detail_service.invoice','user', 'room_detail'])
            ->whereHas('invoice_detail_service.invoice.invoice_detail')
            ->whereHas('user' , function($query) use ($infor){
                $query->where('name','like', '%' . $infor . '%')->orwhere('phone','like', '%' . $infor . '%');
            })
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($booking) {
                // Thu thập tất cả các invoices từ invoice_detail_food
                $invoices = $booking->invoice_detail_service->map(function ($detail) {
                    return $detail->invoice;
                })->flatten()->unique('id');

                $booking->invoices = $invoices;
                unset($booking->invoice_detail_service);
                return $booking;
            })->toArray();

        return view('pages.service_outside.service_ordered_list', compact('data'));
    }

    public function order_detail_search_service(Request $request)
    {
        $name_service = $request->all()['name_service'];

        $service = Service::where('name', 'like', '%' . $name_service . '%')->get()->toArray();

        return response()->json(['services' => $service]);
    }
}
