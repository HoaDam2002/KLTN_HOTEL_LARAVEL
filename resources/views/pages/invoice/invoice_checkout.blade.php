<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__("Invoice")}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="invoice-header">
            <h2>Consolidated Invoice</h2>
        </div>
        <div class="invoice-details">
            <h3>Hotel Information</h3>
            <p><strong>Hotel Name:</strong> DANA Hotel</p>
            <p><strong>Address:</strong> Da Nang, Viet Nam</p>
        </div>
        <div class="invoice-details">
            <h3>Customer Information</h3>

            <p><strong>Customer Name:</strong> {{ $data_pdf['name_user'] ? $data_pdf['name_user'] : '' }}</p>
        </div>
        @if (!empty($data_pdf['room']))
            <div class="invoice-details">
                <h3>Room Details</h3>
                <table>
                    <tr>
                        <th>Room Type</th>
                        <th>Number of Nights</th>
                        <th>Number of Room</th>
                        <th>Price/Night</th>
                        <th>Deposited</th>
                        <th>Total</th>
                    </tr>
                    @foreach ($data_pdf['room']['rooms'] as $key => $item)
                        <tr>
                            <td>{{ $item['room_detail']['type_room']['name'] }}</td>
                            <td>{{ $data_pdf['room']['quantity_night'] }} Nights</td>
                            <td>{{ !empty($item['quantity']) ? $item['quantity'] . ' Rooms' : '1' . ' Room' }}
                            </td>
                            <td>{{ $item['price'] }}$</td>
                            <td>{{ $data_pdf['room']['deposits'] }}$</td>
                            <td>{{ $data_pdf['room']['total'] }}$</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif

        @if (!empty($data_pdf['food']))
            <div class="invoice-details">
                <h3>Restaurant Details</h3>
                <table>
                    <tr>
                        <th>Food Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    <!-- Change restaurant details according to your data -->
                    @foreach ($data_pdf['food']['invoice'] as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->total_quantity }}</td>
                            <td>{{ $item->price }}$</td>
                            <td>{{ $item->total }}$</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
        @if (!empty($data_pdf['service']))
            <div class="invoice-details">
                <h3>Outdoor Services Details</h3>
                <table>
                    <tr>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    <!-- Change restaurant details according to your data -->
                    @foreach ($data_pdf['service']['invoice'] as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}$</td>
                            <td>{{ $item->quantity }}$</td>
                            <td>{{ $item->total }}$</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
        <div class="invoice-total">
            <h3>Total Amount: ${{ $data_pdf['final_total'] }}</h3>
        </div>
    </div>
</body>

</html>
