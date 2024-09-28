<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Invoice</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        .invoice-header {
            background-color: #f5f5f5;
            padding: 10px;
            text-align: center;
        }

        .invoice-body {
            margin-top: 20px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .invoice-total {
            margin-top: 20px;
            text-align: right;
        }

        .invoice-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>

<body>

    <div class="invoice-header">
        <h2>Billing Invoice</h2>
    </div>

    <div class="invoice-body">
        <p><strong>Customer Details:</strong></p>
        <p>Name: {{$userDetails['name']}}</p>
        <p>Email: {{$userDetails['email']}}</p>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Payment Status</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$order->no}}</td>
                    <td>{{$order->infomation}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->amount}}</td>
                    <td>{{$order->amount}}</td>
                </tr>
            </tbody>
        </table>

        <div class="invoice-total">
            <p><strong>Total Amount: ${{$order->amount}}.00</strong></p>
        </div>
    </div>

    <div class="invoice-footer">
        <p>Thank you for your business!</p>
    </div>

</body>

</html>
