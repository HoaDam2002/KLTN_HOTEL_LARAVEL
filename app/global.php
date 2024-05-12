<?php

function search_available_room($checkin, $checkout, $action = null)
{
    $booked_rooms = DB::table('booking')->select('id_room', 'quantity')
        ->where(function ($query) use ($checkin, $checkout) {
            $query->where(function ($q) use ($checkin, $checkout) {
                $q->where('check_in', '>=', $checkin)
                    ->where('check_in', '<', $checkout);
            })
                ->orWhere(function ($q) use ($checkin, $checkout) {
                    $q->where('check_out', '>', $checkin)
                        ->where('check_out', '<=', $checkout);
                })
                ->orWhere(function ($q) use ($checkin, $checkout) {
                    $q->where('check_in', '<=', $checkin)
                        ->where('check_out', '>=', $checkout);
                });
        })
        ->whereIn('status', ['pending'])
        ->get();

    $realtime_booked_rooms = DB::table('booking_realtime')->select('id_roomDetail')
        ->where(function ($query) use ($checkin, $checkout) {
            $query->where(function ($q) use ($checkin, $checkout) {
                $q->where('check_in', '>=', $checkin)
                    ->where('check_in', '<', $checkout);
            })
                ->orWhere(function ($q) use ($checkin, $checkout) {
                    $q->where('check_out', '>', $checkin)
                        ->where('check_out', '<=', $checkout);
                })
                ->orWhere(function ($q) use ($checkin, $checkout) {
                    $q->where('check_in', '<=', $checkin)
                        ->where('check_out', '>=', $checkout);
                });
        })
        ->whereIn('status', ['pending', 'checkin'])
        ->pluck('id_roomDetail');

    $all_rooms = DB::table('rooms')
        ->join('room_detail', 'rooms.id', '=', 'room_detail.id_room')
        ->select('room_detail.*')
        ->get();

    $available_rooms = $all_rooms->reject(function ($room) use ($realtime_booked_rooms) {
        return $realtime_booked_rooms->contains($room->id);
    })->values();
    $available_rooms_grouped = $available_rooms->groupBy('id_room');

    foreach ($available_rooms_grouped as $key => $room) {
        $available_rooms_grouped[$key]->quantity = count($room);
    }

    foreach ($available_rooms_grouped as $key => $value) {
        $quantity_room_null = count($available_rooms_grouped[$key]);
        if ($booked_rooms) {
            foreach ($booked_rooms as $key_booked => $value_booked) {
                $id_room_booking = $booked_rooms[$key_booked]->id_room;
                if ($id_room_booking == $key) {
                    $quantity_room_booking = $booked_rooms[$key_booked]->quantity;
                    $quantity_room_null = $quantity_room_null - $quantity_room_booking;
                    if ($quantity_room_null == 0) {
                        unset($available_rooms_grouped[$key]);
                    } else {
                        $available_rooms_grouped[$key]->quantity = $quantity_room_null;
                    }
                }
            }
        }
    }

    if($action == "search"){
        return $available_rooms_grouped;
    }else{
        return $available_rooms;
    }
}