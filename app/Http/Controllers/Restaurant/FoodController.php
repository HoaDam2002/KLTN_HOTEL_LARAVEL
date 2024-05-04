<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddFood;
use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.food_service.food_home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function food_manager()
    {
        $food = Food::paginate(5);

        return view('pages.food_service.food_manation', compact('food'));
    }

    public function add_food(Request $request)
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
        $customer = User::whereHas('booking_realtime' , function($query){
            $query->where('status','checkin');
        })->with(['customer','customer_no_acc','booking_realtime' => function($query){
            $query->where('status','checkin');
        }])->paginate(5);

        // dd($customer);

        return view('pages.food_service.food_order',compact('customer'));
    }

    public function search_customer(Request $request)
    {
        $infor = $request->all()['infor'];
        
        $customer = User::whereHas('booking_realtime' , function($query){
            $query->where('status','checkin');
        })->with(['customer','customer_no_acc','booking_realtime' => function($query){
            $query->where('status','checkin');
        }])->where('name','like', '%' . $infor . '%')->paginate(5);

        return view('pages.food_service.food_order',compact('customer'));
    }

    /**
     * Display the specified resource.
     */
    public function food_detail(string $id)
    {
        return view('pages.food_service.food_detail_order');
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

    public function search_food(Request $request){
        $data = $request->all()['infor'];

        $food = Food::where('name','like', '%' . $data . '%')->paginate(5);

        return view('pages.food_service.food_manation', compact('food'));
    }
}



