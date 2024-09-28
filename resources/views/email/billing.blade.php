<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Billing Details</title>
  <style>
    body {
      font-family: Helvetica, Arial, sans-serif;
      min-width: 1000px;
      overflow: auto;
      line-height: 2;
    }

    .container {
      margin: 50px auto;
      width: 70%;
      padding: 20px 0;
      border-bottom: 1px solid #eee;
    }

    .brand-link {
      font-size: 1.4em;
      color: #00466a;
      text-decoration: none;
      font-weight: 600;
    }

    .content {
      font-size: 1.1em;
    }

    .product-details {
      font-weight: bold;
    }

    .contact-info {
      font-size: 0.9em;
    }
  </style>
</head>

<body>
  <div class="container">
    <div>
      <a href="#" class="brand-link">Savilles Dry Cleaning & Laundry</a>
    </div>
    {{-- <p class="content">Dear {{$customer['name']}},</p> --}}
    {{-- <p class="content">We are thrilled to inform you that your order is on the way! Your eagerly awaited product is now in transit and will be arriving soon at your doorstep.</p>
    <p class="content product-details">Order Details:</p> --}}
    {{-- <p class="content product-details">Product Name: </p> --}}
    {{-- <p class="content product-details">Customer Id: {{$order->customer_id}}</p>
    <p class="content product-details">Order Number: {{$order->no}}</p>
    <p class="content product-details">Estimated Delivery Date: {{$order->delivery_date}}</p>
    <p class="content product-details">Estimated Delivery Time: {{$order->delivery_time}}</p> --}}
    {{-- <p class="content">To track the real-time status of your delivery, you can use the provided tracking number on our website.</p>
    <p class="content">If you have any questions or concerns about your order, feel free to reach out to our customer support team at 012345565. We are here to assist you!</p> --}}
    <p class="content">Thank you for choosing Savilles Dry Cleaning & Laundry! We appreciate your business.</p>
    <p class="content">Best Regards,<br />Savilles Dry Cleaning & Laundry</p>
    <p class="contact-info">Contact Information: test@gmail.com</p>
  </div>
</body>

</html>
