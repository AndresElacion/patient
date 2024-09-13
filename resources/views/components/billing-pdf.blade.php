<!DOCTYPE html>
<html>
<head>
    <title>Billing Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }
        #invoice-POS {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            max-width: 800px;
            background: #fff;
        }
        #top, #mid, #bot {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
        #top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            height: 60px;
            width: 60px;
            background: #3498db;
            border-radius: 50%;
        }
        .info {
            margin-left: 20px;
        }
        .info h2 {
            margin: 0;
            font-size: 24px;
            color: #3498db;
        }
        #mid {
            margin-bottom: 30px;
        }
        #mid h2 {
            margin: 0 0 10px;
            font-size: 20px;
            color: #3498db;
        }
        #mid p {
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
        }
        #bot {
            text-align: center;
        }
        #table {
            width: 100%;
            border-collapse: collapse;
        }
        table {
            width: 100%;
            border-spacing: 0;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
            font-size: 16px;
        }
        td {
            font-size: 14px;
        }
        .tabletitle {
            background-color: #f9f9f9;
        }
        .service {
            border-bottom: 1px solid #ddd;
        }
        #legalcopy {
            margin-top: 20px;
        }
        #legalcopy p {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div id="invoice-POS">
        <div id="top">
            <div class="logo"></div>
            <div class="info">
                <h2>Patient Management</h2>
            </div>
        </div>

        <div id="mid">
            <div class="info">
                <h2>Patient Info</h2>
                <p>
                    <strong>Address:</strong> {{ $patient->address }}<br>
                    <strong>Email:</strong> {{ $patient->email }}<br>
                    <strong>Phone:</strong> {{ $patient->contactNumber }}
                </p>
            </div>
        </div>

        <div id="bot">
            <table>
                <thead>
                    <tr class="tabletitle">
                        <th class="item">Service</th>
                        <th class="amount">Amount</th>
                        <th class="date">Billing Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="service">
                        <td class="tableitem">{{ $billing->service }}</td>
                        <td class="tableitem">${{ number_format($billing->amount, 2) }}</td>
                        <td class="tableitem">{{ \Carbon\Carbon::parse($billing->billingDate)->format('d-m-Y') }}</td>
                    </tr>
                </tbody>
            </table>

            <div id="legalcopy">
                <p><strong>Thank you, Stay safe!</strong></p>
            </div>
        </div>
    </div>
</body>
</html>
