<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ __('Report Booking') }}</title>

        <style>
            * {
                font-family: "roboto", sans-serif;
            }
            .container {
                width: 80%;
                margin: 0 auto;
            }

            .invoice-header {
                text-align: center;
                margin-bottom: 20px;
            }

            .invoice-details {
                margin-bottom: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            th,
            td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            .total {
                font-weight: bold;
            }

            .date_report {
                margin-bottom: 5px;
            }

            .text-right {
                text-align: right;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="invoice-header">
                <h2>DANA Hotel Report</h2>
            </div>
            {{-- <div class="invoice-details">
                <h3>Hotel Information</h3>
                <p><strong>Hotel Name:</strong> DANA Hotel</p>
                <p><strong>Address:</strong> Da Nang, Viet Nam</p>
            </div> --}}
            @if (!empty($data_pdf))
            <div class="invoice-details">
                <h3>Report Booking</h3>
                <div class="date_report">Report from {{ $data_pdf['start_date'] }} to {{ $data_pdf['end_date'] }}</div>
                    <table>
                        <tr>
                            <th>{{ __('Customer') }}</th>
                            <th>{{ __('Room') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Check in') }}</th>
                            <th>{{ __('Check out') }}</th>
                            <th>{{ __('Date book') }}</th>
                            <th>{{ __('Deposit') }}</th>
                            <th>{{ __('Price') }}</th>
                        </tr>
                        <!-- Change restaurant details according to your data -->
                        @foreach ($data_pdf['booking'] as $item)
                            <tr>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->room->name }}</td>
                                <td class="text-right">{{ $item->quantity ?? 1}}</td>
                                <td>{{ $item->check_in }}</td>
                                <td>{{ $item->check_out }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="text-right">{{ $item->deposits ?? $item->deposit_customer->deposit }}$</td>
                                <td class="text-right">{{ $item->price }}$</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>
    </body>

</html>
