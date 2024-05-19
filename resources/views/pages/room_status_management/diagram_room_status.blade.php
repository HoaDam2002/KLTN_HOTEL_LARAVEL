@extends('pages.room_status_management.room_status_management')

@section('css')
    <style>
        .btn-primary {
            background: var(--main-gradient) !important;
        }

        .btn {
            padding: 15px 30px !important;
        }

        .wrapper_diagram {
            padding: 0;
            height: 110px;
            cursor: pointer;
        }

        .card {
            height: 110px;
        }

        .card-header {
            padding: 3px 16px;
        }

        .card-body {
            padding-bottom: 5px;
            padding-top: 5px;
        }

        .card-deposited {
            background-color: #FFE69C;
        }

        .card-using {
            background-color: rgb(224, 207, 252);
            color: #000;
        }

        .card-checkin {
            background-color: rgb(117, 183, 152)
        }

        .btn-action {
            color: #000 !important;
        }

        .btn-action-room-da {
            position: absolute;
            bottom: 16px;
        }

        .func_filter_status {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .btn_filter {
            min-width: 120px;
            text-decoration: none;
            padding: 10px 30px;
            border-radius: 30px;
            margin-bottom: 10px;
            text-align: center;
            /* color: #fff; */
        }

        .bg-deposit {
            background-color: rgb(224, 207, 252);
            color: #000;
        }

        .bg-deposit:hover {
            color: #000;
        }

        /* modal btn booking */
        .wrapper-btn-booking-modal {
            display: flex;
            justify-content: center;
        }

        .card-text {
            font-size: 14px;
        }

        /* modal */

        .wrapper_info_room {
            display: flex;
        }

        .wrapper_info_room span {
            min-width: 200px;
        }

        .info_room_item {
            border-bottom: 1px solid #333;
            padding-right: 80px;
            min-width: 200px;
        }

        .btn-status {
            display: flex;
            justify-content: center;
        }

        .status {
            margin: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="room_diagram container">
                <div class="row">
                    @foreach ($data as $room)
                        <div class="mb-1 col-4 col-md-3 col-lg-2 px-1 wrapper_diagram room" data-bs-toggle="modal"
                            data-bs-target="#modalEditStatusRoom">
                            <div class="card mb-3 {{ $room->status == 'Clean' ? 'text-bg-success' : ($room->status == 'Dirty' ? 'text-bg-danger' : ($room->status == 'Vacancy' ? 'text-bg-secondary' : ($room->status == 'Checkin' ? 'card-deposited' : ''))) }} {{ $room->type_name }}"
                                style="max-width: 14rem;">
                                <div class="card-header name">{{__(("Room")) . " "}}{{ $room->type_name }}</div>
                                <div class="card-body">
                                    <p class="card-text bold"><i class="fa-solid fa-calendar-days me-2"></i>{{__(("Status:"))}} <span
                                            class="font-weight-bold status">{{ $room->status }}</span></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- start modal deposits --}}
    <div class="modal fade" id="modalEditStatusRoom" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <strong class="modal-title fs-5 nameRoom_modal" id="staticBackdropLabel"></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 style="text-align: center;">{{__("Status Room Management")}}</h4>
                    <div class="btn-status">
                        <button class="status text-bg-danger p-2 w-25" id="Dirty">{{__("Dirty")}}</button>
                        <button class="status text-bg-success p-2 w-25" id="Clean">{{__("Clean")}}</button>
                        {{-- <button class="status card-deposited p-2 w-25" id="Checkin"
                            data-bs-dismiss="modal">Checkin</button> --}}
                        {{-- <button class="status text-bg-secondary p-2 w-25" id="Vacancy"
                            data-bs-dismiss="modal">Vacancy</button> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{__("Close")}}</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal info diposits --}}

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                <strong class="me-auto">{{__('Notification')}}</strong>
                {{-- <small>11 mins ago</small> --}}
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
               {{__(" Success!!!")}}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });




        $(document).ready(function() {
            let name_room = "";

            function updateButtonVisibility(stt) {
                switch (stt) {
                    case "Dirty":
                        $('button#Dirty').hide();
                        $('button#Clean').show();
                        $('button#Checkin').show();
                        $('button#Vacancy').show();
                        break;
                    case "Clean":
                        $('button#Dirty').show();
                        $('button#Clean').hide();
                        $('button#Checkin').show();
                        $('button#Vacancy').show();
                        break;
                    case "Checkin":
                        $('button#Dirty').show();
                        $('button#Clean').show();
                        $('button#Checkin').hide();
                        $('button#Vacancy').show();
                        break;
                    case "Vacancy":
                        $('button#Dirty').show();
                        $('button#Clean').show();
                        $('button#Checkin').show();
                        $('button#Vacancy').hide();
                        break;
                }
            }

            $(document).on('click', 'div.room', function() {
                name_room = $(this).find('div.name').text();
                let stt = $(this).find('span.status').text();

                console.log(name_room);

                updateButtonVisibility(stt);

                $('strong.nameRoom_modal').text(name_room);
            });

            $('#modalEditStatusRoom').on('shown.bs.modal', function() {
                let stt = $('strong.nameRoom_modal').text();

                updateButtonVisibility(stt);
            });

            $(document).on('click', 'button.status', function() {
                let status = $(this).text();
                let a = name_room.split(" ")[1];

                $.ajax({
                    type: "post",
                    url: "{{ url('/room_status_management') }}",
                    data: {
                        status: status,
                        name_room: a
                    },
                    dataType: "json",
                    success: function(response) {
                        let status_update = response.room;
                        let r = $('div.' + status_update.type_name);

                        r.removeClass(
                            'text-bg-success text-bg-danger text-bg-secondary card-deposited'
                        );

                        let status_class = status_update.status;

                        if (status_class == 'Dirty') {
                            r.addClass('text-bg-danger');
                            r.find('span.status').text('Dirty')
                        }

                        if (status_class == 'Clean') {
                            r.addClass('text-bg-success');
                            r.find('span.status').text('Clean')
                        }

                        if (status_class == 'Vacancy') {
                            r.addClass('text-bg-secondary');
                            r.find('span.status').text('Vacancy')
                        }

                        if (status_class == 'Checkin') {
                            r.addClass('card-deposited');
                            r.find('span.status').text('Checkin')
                        }

                        $('#modalEditStatusRoom').modal(
                            'hide');
                        var toast = new bootstrap.Toast(
                            document.getElementById(
                                'liveToast'));
                        toast.show();

                    }
                });
            });
        });
    </script>
@endsection
