<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ __('Report User Booking') }}</title>
        <style>
            body {
                font-family: 'DejaVu Sans', sans-serif;
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
                <h3>Report User Booking</h3>
                <div class="date_report">Report from {{ $data_pdf['start_date'] }} to {{ $data_pdf['end_date'] }}</div>
                    <table>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Room') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Date Book') }}</th>
                        </tr>
                        <!-- Change restaurant details according to your data -->
                        @foreach ($data_pdf['user_booking'] as $item)
                            <tr>
                                <td>{{ $item[0]->user->name }}</td>
                                <td>{{ $item[0]->user->phone }}</td>
                                <td>{{ $item[0]->room->name }}</td>
                                <td class="text-right">{{ $item[0]->quantity ?? 1 }}</td>
                                <td>{{ $item[0]->created_at }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>
    </body>

</html>
