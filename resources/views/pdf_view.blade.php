<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            
        }
        .header, .footer {
            
        }
        .content {
            margin-top: 20px;
        }
        .details {
            width: 100%;
            border-collapse: collapse;
        }
        .details th, .details td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h4 style="text-align: center;">Formulir Permohonan Benih</h4>
            <p style="margin-top:10px;">Kepada Yth.<br>Kepala BSIP Kalimantan Timur<br>di Tempat</p>
        </div>
        <div class="content">
            <p> Dengan Hormat,<br>
                Saya yang bertanda tangan dibawah ini :
            </p>
            <table class="details">
                <tr>
                    <th>Name</th>
                    <td>{{ $payment['name'] }}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>{{ $payment['amount'] }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $payment['date'] }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $payment['description'] }}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Thank you for your payment!</p>
        </div>
    </div>
</body>
</html>