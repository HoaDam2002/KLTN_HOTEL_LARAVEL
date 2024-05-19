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
                            <img src="{{ asset('assets/customer/images/logo/logohotel.jpg') }}" alt="" class="image_customer_booking col-4">
                            <div class="title_booking col-8">
                                <h6>{{__("Booking code")}}: #{{ $booking['id'] }}</h6>
                                <h6>{{__("Customer")}}: {{ $booking['user']['name'] }}</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="title_inf_booking">{{__("Request")}}</h6>
                            <div class="row mb-4">
                                <div class="col-6"><strong>{{__("Check in")}}</strong>
                                    <p>{{ $booking['check_in'] }}</p>
                                </div>
                                <div class="col-6"><strong>{{__("Check out")}}</strong>
                                    <p>{{ $booking['check_out'] }}</p>
                                </div>
                            </div>
                            <div class="mb-4">
                                <strong>{{__("Room name")}}:</strong>
                                <span>{{ $booking['room']['name'] }}</span>
                            </div>
                            <div class="mb-4">
                                <strong>{{__("Daily price")}}:</strong>
                                <strong class="price_booking">$4{{ $booking['price'] }}</strong>
                            </div>
                            <div class="mb-4">
                                <form class="row g-3 needs-validation" novalidate>
                                    <strong class="mb-2 d-block">{{__("Please choose the room for guests")}}</strong>
                                    @if ($booking['quantity'] > 0)
                                        @for ($i = 0; $i < $booking['quantity']; $i++)
                                            <div class="mb-3 col-4">
                                                <label for="exampleFormControlInput1" class="form-label">{{__("Room")}}
                                                    {{ $i + 1 }}</label>
<<<<<<< HEAD
                                                <select class="form-select form-select-lg room_booking_realtime"
                                                    required>
                                                    <option value="">{{__("Please choose the room")}}</option>
=======
                                                <select class="form-select form-select-lg room_booking_realtime" required>
                                                    <option value="">Please choose the room</option>
>>>>>>> 25415f6fc6710770d332b637421fbb98e06c095f
                                                    @if (!empty($list_empty_room_booking))
                                                        @foreach ($list_empty_room_booking as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $booking['room']['name'] }} {{ $item->type_name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                   {{__("Please select a valid room.")}}
                                                </div>
                                            </div>
                                        @endfor
                                    @endif
                                    <div class="card-footer" style="padding: 15px 0">
                                        <button type="submit" class="btn btn-success"
                                            id="btn_confirm_booking">{{__("Confirm")}}</button>
                                    </div>
                                </form>
                            </div>
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
                    <h6 class="modal-title fs-5" id="exampleModalLabel">{{__("Cancel this booking?")}}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{__("You definitely want to cancel this booking. Once you confirm the cancellation, you will not be able to return to the original status.")}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("Close")}}</button>
                    <button type="button" class="btn btn-primary" id="btn_cancel_booking">{{__("Agree to cancel")}}</button>
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

        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    } else {
                        event.preventDefault();
                        var selectedValuesArray = [];

                        $(".room_booking_realtime").each(function() {
                            var selectedValueRoom = $(this).find('option:selected').val();
                            if (selectedValueRoom) {
                                selectedValuesArray.push(selectedValueRoom);
                            }
                        });
                        $.ajax({
                            url: '/recep/info-booking/{{ $booking['id'] }}',
                            method: 'POST',
                            data: {
                                id_booking: {{ $booking['id'] }},
                                id_room: {{ $booking['room']['id'] }},
                                values: selectedValuesArray,
                                check_in: '{{ $booking['check_in'] }}',
                                check_out: '{{ $booking['check_out'] }}',
                                price: {{ $booking['price'] }},
                                status: 'pending',
                                id_user: {{ $booking['user']['id'] }},
                                id_tour: {{ $booking['id'] }}
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
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

        $(document).ready(function() {
            $('select.room_booking_realtime').change(function() {
                disableSelectedOptions(this);
            });
        })

        var selectedValues = [];

        function disableSelectedOptions(selectedOption) {
            var previousValue = selectedOption.dataset.previousValue;
            var currentValue = selectedOption.value;

            selectedOption.dataset.previousValue = currentValue;

            if (previousValue) {
                var index = selectedValues.indexOf(previousValue);
                if (index !== -1) {
                    selectedValues.splice(index, 1);
                }
            }
            if (currentValue) {
                selectedValues.push(currentValue);
            }

            var selects = $('select.form-select');
            for (var i = 0; i < selects.length; i++) {
                var options = $(selects[i]).find('option');
                for (var j = 0; j < options.length; j++) {
                    if (selectedValues.includes(options[j].value) && options[j].value !== selects[i].value) {
                        options[j].disabled = true;
                    } else {
                        options[j].disabled = false;
                    }
                }
            }
        }

        $(document).ready(function() {
            var selects = $('select.form-select');
            selects.each(function() {
                var currentSelect = this;
                currentSelect.dataset.previousValue = currentSelect.value;

                $(currentSelect).on('change', function() {
                    disableSelectedOptions(currentSelect);
                });

                disableSelectedOptions(currentSelect);
            });
        });
    </script>
@endsection
