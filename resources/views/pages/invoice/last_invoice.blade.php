<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .hotel-info {
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
    <div class="header">
        <span>Invoice</span>
    </div>
    <div class="hotel-info">
        <p><strong>Hotel Name:</strong>DANAHOTEL</p>
        <p><strong>Address:</strong> Da Nang, Viet Nam</p>
    </div>
    <div class="customer-info">
        <p><strong>Customer Name:</strong>{{ $data_pdf['name_user'] ? $data_pdf['name_user'] : '' }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $final_total = 0;
            @endphp
            @if (!empty($data_pdf))
                @if (!empty($data_pdf['service']))
                    @foreach ($data_pdf['service'] as $item)
                        @php
                            $total = $item[0]['price'] * $item[1];
                            $final_total += $total;
                        @endphp
                        <tr>
                            <td>{{ $item[0]['name'] }}</td>
                            <td>{{ $item[0]['price'] }}$</td>
                            <td>{{ $item[1] }}</td>
                            <td>{{ $total }}</td>
                        </tr>
                    @endforeach
                @else
                    @foreach ($data_pdf['food'] as $item)
                        @php
                            $total = $item[0]['price'] * $item[1];
                            $final_total += $total;
                        @endphp
                        <tr>
                            <td>{{ $item[0]['name'] }}</td>
                            <td>{{ $item[0]['price'] }}$</td>
                            <td>{{ $item[1] }}</td>
                            <td>{{ $total }}$</td>
                        </tr>
                    @endforeach
                @endif
            @endif
            <!-- Add more rows as needed -->
        </tbody>
    </table>
    <div class="total">
        Total: ${{ $final_total }}
    </div>
</body>

</html>
