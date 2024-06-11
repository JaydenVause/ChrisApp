<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>
    <h1>Invoice</h1>

    <p>Invoice ID: {{ $invoice->id }}</p>
    <!-- Add more invoice details here -->
    <p>Hi {{ $invoice->customer_name }},</p>
    <p>Thank you for choosing Coffs Lawns and Property Maintenance!  The total cost is ${{ $invoice->total_price }}.</p>
    <p>Alternatively, you can download your invoice by visiting: {{ $url }}</p>
    <p>For payment, please use:</p>
    <ul>
        <li>Account Name: Chris Webb</li>
        <li>BSB: 533000</li>
        <li>Account Number: 151548</li>
        <li>Bank: BCU</li>
    </ul>
    <p>We appreciate your business!</p>
    <p>Best regards,<br>Chris</p>
</body>
</html>
