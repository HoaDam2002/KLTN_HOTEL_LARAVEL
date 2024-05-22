@php
    use Carbon\Carbon;
@endphp
@extends('pages.manager.manager')
@section('css')
    <style>
        .card_custom {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            height: 100px;
        }

        .icon_card {
            padding: 0 15px;
            width: 50px;
        }

        .icon_card i {
            font-size: 20px;
            line-height: 100px;
        }

        .card_user {
            background-color: rgb(242, 79, 124);
            color: #fff;
        }

        .card_icon_user {
            background-color: #F77B9D;
        }

        .card_bookings {
            color: #fff;
            background-color: #716CB0;
        }

        .card_icon_bookings {
            background-color: #9591C4;
        }

        .card_revenue {
            color: #fff;
            background-color: #33B0E0;
        }

        .card_icon_revenue {
            background-color: #66C4E8;
        }

        .card_service {
            color: #fff;
            background-color: #3BC0C3;
        }

        .card_icon_service {
            background-color: #6CD0D2;
        }

        .card_restaurant {
            color: #fff;
            background-color: #ff9a9e;
        }

        .card_icon_restaurant {
            background-color: #fad0c4;
        }

        .card-text {
            font-size: 20px;
        }

        .card-title {
            color: #fff;
        }

        .table_report th {
            font-size: 17px !important;
        }

        .table_report th,
        td {
            padding: 5px 10px !important;
        }

        .btn_export {
            padding: 10px 20px;
            border-radius: 15px;
        }

        .btn_pdf {
            background-color: #0079CF;
            border: 1px solid #0079CF;
            margin-right: 5px;
            color: #fff
        }

        .btn_pdf:hover {
            box-shadow: 0 8px 25px -8px #0079cf
        }

        .btn_excel {
            border: 1px solid #0079CF;
            color: #0079CF;
        }

        .btn_excel:hover {
            background-color: rgba(115, 103, 240, .08);
        }

        .btn_filter {
            background: var(--main-gradient);
            color: #fff;
            padding: 8px 20px;
        }

        .filter_booking form {
            position: relative;
        }

        .filter_booking input {
            width: 100%;
            padding: 8px 15px;
            outline: none;
        }

        .btn_search_booking {
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .report {
            cursor: pointer;
        }
    </style>
@endsection

@php
    $currentDate = Carbon::now()->format('d/m/Y');
    $nextDate = Carbon::now()->addDays(1)->format('d/m/Y');
@endphp

@section('content')
    <div class="col-12 col-xl-9 col-lg-8 search-sidebar">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="filter_booking mb-3">
                <div class="filter_booking d-flex mb-3" style="">
                    <form action="/manager/statistical/search" method="POST" class="w-50">
                        @csrf
                        <input type="text" name="search_date"
                            value="{{ isset($start_date) && isset($end_date) ? $start_date . ' - ' . $end_date : $currentDate . ' - ' . $nextDate }}" />
                        <button type="submit" class="btn_search_booking"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>
            <div class="row mb-5">
                <form action="/manager/report/user_booking" method="GET" class="col-12 col-sm-6 col-md-4 report">
                    @csrf
                    <input type="hidden" name="start_date" value="{{ isset($start_date) ? $start_date : $currentDate }}">
                    <input type="hidden" name="end_date" value="{{ isset($end_date) ? $end_date : $nextDate }}">
                    <div class="card card_user mb-3 card_custom">
                        <div class="card-body">
                            <h5 class="card-title">{{ $statisticalData['quantity_user'] }}</h5>
                            <p class="card-text">{{ __('User') }}</p>
                        </div>
                        <div class="icon_card card_icon_user"><i class="fa-regular fa-circle-user"></i></div>
                    </div>
                </form>

                <form action="/manager/report/bookings" method="GET" class="col-12 col-sm-6 col-md-4 report">
                    @csrf
                    <input type="hidden" name="start_date" value="{{ isset($start_date) ? $start_date : $currentDate }}">
                    <input type="hidden" name="end_date" value="{{ isset($end_date) ? $end_date : $nextDate }}">
                    <div class="card card_bookings mb-3 card_custom">
                        <div class="card-body">
                            <h5 class="card-title">{{ $statisticalData['total_bookings'] }}</h5>
                            <p class="card-text">{{ __('Bookings') }}</p>
                        </div>
                        <div class="icon_card card_icon_bookings"><i class="fa-solid fa-hotel"></i></div>
                    </div>
                </form>

                <div class="col-12 col-sm-6 col-md-4 report">
                    <input type="hidden" name="start_date" value="{{ isset($start_date) ? $start_date : $currentDate }}">
                    <input type="hidden" name="end_date" value="{{ isset($end_date) ? $end_date : $nextDate }}">
                    <div class="card card_revenue mb-3 card_custom">
                        <div class="card-body">
                            <h5 class="card-title">${{ $statisticalData['revenue'] }}</h5>
                            <p class="card-text">{{ __('Revenue') }}</p>
                        </div>
                        <div class="icon_card card_icon_revenue"><i class="fa-solid fa-chart-simple"></i></div>
                    </div>
                </div>

                <form action="/manager/report/food" method="GET" class="col-12 col-sm-6 col-md-4 report">
                    @csrf
                    <input type="hidden" name="start_date" value="{{ isset($start_date) ? $start_date : $currentDate }}">
                    <input type="hidden" name="end_date" value="{{ isset($end_date) ? $end_date : $nextDate }}">
                    <div class="card card_restaurant mb-3 card_custom">
                        <div class="card-body">
                            <h5 class="card-title">{{ $statisticalData['quantity_food'] }}</h5>
                            <p class="card-text">{{ __('Dish is ordered') }}</p>
                        </div>
                        <div class="icon_card card_icon_restaurant"><i class="fa-solid fa-utensils"></i></div>
                    </div>
                </form>

                <form action="/manager/report/service" method="GET" class="col-12 col-sm-6 col-md-4 report">
                    @csrf
                    <input type="hidden" name="start_date" value="{{ isset($start_date) ? $start_date : $currentDate }}">
                    <input type="hidden" name="end_date" value="{{ isset($end_date) ? $end_date : $nextDate }}">
                    <div class="card card_service mb-3 card_custom">
                        <div class="card-body">
                            <h5 class="card-title">{{ $statisticalData['quantity_service'] }}</h5>
                            <p class="card-text">{{ __('service is booked') }}</p>
                        </div>
                        <div class="icon_card card_icon_service"><i class="fa-solid fa-spa"></i></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(function() {
                $('input[name="search_date"]').daterangepicker({
                    opens: 'left',
                    autoApply: true,
                    locale: {
                        format: 'DD/MM/YYYY'
                    }

                }, function(start, end, label) {
                    console.log("A new date selection was made: " + start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY'));
                });
            });

            $('.report').click(function() {
                $(this).submit();
            })
        })
    </script>
@endsection
