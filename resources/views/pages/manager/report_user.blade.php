@php
    use Carbon\carbon;
@endphp
@extends('pages.manager.manager')

@section('css')
    <style>
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

        .title_report {
            text-align: center;
        }

        .date_report {
            color: #333;
        }

        th,
        td {
            text-align: center !important;
        }

        thead th {
            font-weight: 600 !important;
        }

        .row_name {
            text-align: left !important;
        }
    </style>
@endsection

@section('content')
    <div class="col-12 col-xl-9 col-lg-8 search-sidebar">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="row">
                <div class="col-12">
                    <h5 class="">DANA Hotel Report</h5>
                    <div class="mb-3 date_report">Report from {{ $start_date }} to {{ $end_date }}</div>
                    <h6 class="">List of customers booked</h6>
                    <div class="mb-3">
                        <form action="/manager/report/user_booking_pdf" method="post">
                            @csrf
                            <input type="hidden" name="start_date" value="{{ $start_date }}">
                            <input type="hidden" name="end_date" value="{{ $end_date }}">
                            <button type="submit" class="btn_export btn_pdf">
                                Export PDF
                            </button>
                        </form>
                    </div>
                    <div style="overflow: auto">
                        <table class="table table_report table-striped table-hover" style="color: #333; padding: 0 10px; font-size: 16px">
                            <thead>
                                <tr>
                                    <th scope="col" class="row_name">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Phone') }}</th>
                                    <th scope="col">{{ __('Room') }}</th>
                                    <th scope="col">{{ __('Quantity') }}</th>
                                    <th scope="col">{{ __('Date Book') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($merged_grouped_users_booking))
                                    @foreach ($merged_grouped_users_booking as $user)
                                        @php
                                            $name = $user[0]->user->name;

                                            $phone = $user[0]->user->phone;

                                            $date_string = $user[0]->created_at;
                                            $date = Carbon::parse($date_string);
                                            $date_book = $date->format('d/m/Y');

                                            $room = $user[0]->room->name;

                                            $quantity = $user[0]->quantity ?? 1;

                                        @endphp
                                        <tr>
                                            <th class="row_name">{{ $name }}</th>
                                            <td>{{ $phone }}</td>
                                            <td>{{ $room }}</td>
                                            <td>{{ $quantity }}</td>
                                            <td>{{ $date_book }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
