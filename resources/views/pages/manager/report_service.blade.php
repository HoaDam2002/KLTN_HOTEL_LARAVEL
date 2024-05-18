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

        .btn_pdf:hover {
            color: #fff !important;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="col-12 col-xl-9 col-lg-8 search-sidebar">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="row">
                <div class="col-12">
                    <h5 class="" style="text-align: center">DANA Hotel Report</h5>
                    <div class="mb-3 date_report">Report from {{ $start_date }} to {{ $end_date }}</div>
                    <h6 class="">Service</h6>
                    <div class="mb-3">
                        <form action="/manager/report/service_pdf" method="post">
                            @csrf
                            <input type="hidden" name="start_date" value="{{ $start_date }}">
                            <input type="hidden" name="end_date" value="{{ $end_date }}">
                            <button type="submit" class="btn_export btn_pdf">
                                Export PDF
                            </button>
                        </form>
                        {{-- <button class="btn_export btn_excel">
                            Export Excel
                        </button> --}}
                    </div>
                    <div style="overflow: auto">
                        <table class="table table_report table-striped table-hover" style="color: #333; padding: 0 10px; font-size: 16px">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Service') }}</th>
                                    <th scope="col">{{ __('Date order') }}</th>
                                    <th scope="col">{{ __('Price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($list_service))
                                    @foreach ($list_service as $service)
                                        @php
                                            $id_invoice = $service->id;
                                            $name = $service->service->name;

                                            $date_string = $service->created_at;
                                            $date = Carbon::parse($date_string);
                                            $date_order = $date->format('d/m/Y');

                                            $price = $service->service->price;
                                        @endphp
                                        <tr>
                                            <th>{{ $id_invoice }}</th>
                                            <td>{{ $name }}</td>
                                            <td>{{ $date_order }}</td>
                                            <td>${{ $price }}</td>
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
