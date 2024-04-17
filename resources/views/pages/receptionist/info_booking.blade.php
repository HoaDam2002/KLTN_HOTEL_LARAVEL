@extends('pages.receptionist.receptionist')

@section('css')
    <style>
        .title_booking {
            margin: auto;
        }

        .card-header {
            background-color: rgb(231, 231, 222) !important;
        }

        .card-body {
            padding: 0 60px !important;
        }

        .title_inf_booking {
            text-align: center;
            padding: 30px 0;
        }

        .price_booking {
            color: rgb(206, 46, 46);
        }
    </style>
@endsection
@section('content')
    <div class="col-xl-9 col-lg-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="">
                @if (!empty($booking))
                    <div class="card common-card">
                        <div class="card-header info_booking_header row">
                            <img src="{{ asset('assets/customer/images/logo/logohotel.jpg') }}" alt=""
                                class="image_customer_booking col-4">
                            <div class="title_booking col-8">
                                <h6>Booking code: #{{ $booking['id'] }}</h6>
                                <h6>Customer: {{ $booking['user']['name'] }}</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="title_inf_booking">Request</h6>
                            <div class="row mb-4">
                                <div class="col-6"><strong>Check in</strong>
                                    <p>{{ $booking['check_in'] }}</p>
                                </div>
                                <div class="col-6"><strong>Check out</strong>
                                    <p>{{ $booking['check_out'] }}</p>
                                </div>
                            </div>
                            <div class="mb-4">
                                <strong>Room name:</strong>
                                <span>{{ $booking['room']['name'] }}</span>
                            </div>
                            <div class="mb-4">
                                <strong>Daily price:</strong>
                                <strong class="price_booking">$4{{ $booking['price'] }}</strong>
                            </div>
                            <div class="mb-4">
                                <strong class="mb-2 d-block">Please choose the room for guests</strong>
                                <div class="row">
                                    @if ($booking['quantity'] > 0)
                                        @for ($i = 0; $i < $booking['quantity']; $i++)
                                            <div class="mb-3 col-4">
                                                <label for="exampleFormControlInput1" class="form-label">Room
                                                    {{ $i + 1 }}</label>
                                                <select class="form-select form-select-lg"
                                                    aria-label="Default select example">
                                                    <option selected>Please choose the room</option>
                                                    @if (!empty($list_empty_room_booking))
                                                        @foreach ($list_empty_room_booking as $item)
                                                            <option value="{{ $item->type_name }}">
                                                                {{ $booking['room']['name'] }} {{ $item->type_name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        @endfor
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" id="btn_confirm_booking">Confirm</button>
                            <button class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Cancel</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Cancel this booking?</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>You definitely want to cancel this booking. Once you confirm the cancellation, you will not be able to return to the original status.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn_cancel_booking">Agree to cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#btn_confirm_booking').on('click', function() {
                var selectedValues = [];
                $(".form-select.form-select-lg").each(function() {
                    selectedValues.push($(this).val());
                });

                $.ajax({
                    url: '/recep/info-booking/{id}',
                    method: 'POST',
                    data: {
                        id_booking: {{ $booking['id'] }},
                        id_room: {{ $booking['room']['id'] }},
                        values: selectedValues,
                        check_in: '{{ $booking['check_in'] }}',
                        check_out: '{{ $booking['check_out'] }}',
                        price: {{ $booking['price'] }},
                        status: 'pending',
                        id_user: {{ $booking['user']['id'] }},
                        id_tour: {{ $booking['id'] }}
                    },
                    success: function(response) {
                        console.log('Data inserted successfully:', response);
                    },
                    error: function(error) {
                        console.error('Error inserting data:', error);
                    }
                })
            })


            $('#btn_cancel_booking').on('click', function() {
                $.ajax({
                    url: '/recep/info-booking/cancel/{id}',
                    method: 'POST',
                    data: {
                        id_booking: {{ $booking['id'] }},
                    },
                    success: function(response) {
                        console.log('Data inserted successfully:', response);
                        window.location.href = '/recep/request-booking';
                    },
                    error: function(error) {
                        console.error('Error inserting data:', error);
                        window.location.href = '/recep/request-booking';
                    }
                })
            })
        })
    </script>
@endsection
