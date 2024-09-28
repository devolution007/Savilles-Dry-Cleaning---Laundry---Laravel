
{{-- <div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">
    <div style="border-bottom:1px solid #eee">
      <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">Savilles Dry cleaners</a>
    </div>
    <p style="font-size:1.1em">Dear {{ $user['name'] }},</p>
    <p>We want to provide you with an update on your dry cleaning order and confirm the successful processing of your payment.</p>
    <p><b>Order Update:</b></p>
    <p>We have received your garments for dry cleaning and our team is now carefully tending to them. We will keep you informed about the progress of your order and notify you as soon as it is ready for delivery or collection.</p>
    <p><b>Payment Confirmation:</b></p>
    <p>We are pleased to inform you that your payment for the dry cleaning service has been successfully processed. </p>
    <p><b>Order Details:</b></p>

    <table style="border-collapse: collapse;">
      <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
          <th style="border: 1px solid black; padding: 8px;">#</th>
          <th style="border: 1px solid black; padding: 8px;">Service</th>
          <th style="border: 1px solid black; padding: 8px;">Quantity</th>
          <th style="border: 1px solid black; padding: 8px;">Price</th>
          <th style="border: 1px solid black; padding: 8px;">Sub Total</th>
        </tr>
        @php
        $i = 1;
        @endphp
        @foreach($services as $service)
        <tr>
          <td style="border: 1px solid black; padding: 8px;">{{ $i }}</td>
          <td style="border: 1px solid black; padding: 8px;">{{$service->service->title}}</td>
          <td style="border: 1px solid black; padding: 8px;">{{$service->qty}}</td>
          <td style="border: 1px solid black; padding: 8px;">&#163;{{ number_format($service->service->price, 2) }}</td>
          <td style="border: 1px solid black; padding: 8px;">&#163;{{ number_format($service->service->price * $service->qty, 2) }}</td>
        </tr>
        @php $i++; @endphp
        @endforeach
      </table>

    <p><b>Amount Paid: &#163;{{ number_format($total, 2) }}:</b></p>
    <p><b>Order Number: {{$order['no']}}:</b></p>
    <p>If you have any questions regarding the order status or need further assistance, please don't hesitate to reach out to us at 01932863248. We are here to ensure a smooth and satisfying experience for you.</p>
    <p>Thank you for choosing Savilles Dry Cleaning & Laundry!</p>
    <p style="font-size:0.9em;"> Best Regards,<br />Savilles Dry Cleaning & Laundry</p>
  </div>
</div> --}}

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <meta name="x-apple-disable-message-reformatting"/> --}}
  {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
  <meta name="format-detection" content="telephone=no,address=no,email=no,date=no">
  <title>Savilles Dry Cleaners </title>
  <style>
    @font-face {
      font-family: 'Poppins';
      font-style: italic;
      font-weight: 200;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiDyp8kv8JHgFVrJJLmv1pVFteOYktMqlap.woff2) format('woff2');
      unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: italic;
      font-weight: 200;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiDyp8kv8JHgFVrJJLmv1pVGdeOYktMqlap.woff2) format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: italic;
      font-weight: 200;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiDyp8kv8JHgFVrJJLmv1pVF9eOYktMqg.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 200;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLFj_Z11lFd2JQEl8qw.woff2) format('woff2');
      unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 200;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLFj_Z1JlFd2JQEl8qw.woff2) format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 200;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLFj_Z1xlFd2JQEk.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 300;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLDz8Z11lFd2JQEl8qw.woff2) format('woff2');
      unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 300;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLDz8Z1JlFd2JQEl8qw.woff2) format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 300;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLDz8Z1xlFd2JQEk.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJbecnFHGPezSQ.woff2) format('woff2');
      unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJnecnFHGPezSQ.woff2) format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJfecnFHGPc.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLEj6Z11lFd2JQEl8qw.woff2) format('woff2');
      unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLEj6Z1JlFd2JQEl8qw.woff2) format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLEj6Z1xlFd2JQEk.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLCz7Z11lFd2JQEl8qw.woff2) format('woff2');
      unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLCz7Z1JlFd2JQEl8qw.woff2) format('woff2');
      unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
    }
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLCz7Z1xlFd2JQEk.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    html {
      width: 100%;
    }
    body {
      margin:0;
      padding:0;
      width:100%;
      -webkit-text-size-adjust:none;
      -ms-text-size-adjust:none;
      font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important;
      background-color: #F1F4F6;
    }
    img {
      display: block !important;
      border:0;
      -ms-interpolation-mode:bicubic;
    }
    .ReadMsgBody {
      width: 100%;
    }
    .ExternalClass {
      width: 100%;
    }
    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }
    .images {
      display:block !important;
      width:100% !important;
    }
    p {
      margin:0 !important;
      padding:0 !important;
    }
    a {
      color:#ffbf3f;
    }
    .has-white-txt-btn a {
      color:#ffffff !important;
    }
    .width-auto td,
    .width-auto a {
      font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important;
    }
    .width-auto a:hover {
      text-decoration:none !important;
    }
    .width-auto {
      width: auto !important;
    }
    .width600 {
      width:600px;
    }
    .width600 {
      width:600px !important;
      max-width:600px !important;
    }
    .width500 {
      width:500px;
    }
    .width500 {
      width:500px !important;
      max-width:500px !important;
    }
    .width530 {
      width:530px;
    }
    .width530 {
      width:530px !important;
      max-width:530px !important;
    }
    .width550 {
      width:550px;
    }
    .width550 {
      width:550px !important;
      max-width:550px !important;
    }
    .display-block {
      display:table !important;
    }
    @media only screen and (max-width:480px) {
      .width-auto {
        width:auto !important;
      }
      .full-block-div {
        display: block !important;
        width: 2300px !important;
        max-width: 2300px !important;
      }
      .res-padding {
        display: block !important;
        width: 2300px !important;
        max-width: 2300px !important;
      }
    }
  </style>
</head>
<body marginwidth="0" marginheight="0" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;" offset="0" topmargin="0" leftmargin="0" bgcolor="#FFFFFF">
  <table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <td height="35" class="height20" style="mso-line-height-rule:exactly; line-height:35px;">
        </td>
      </tr>
      <tr>
        <td align="center">
          <div style="display:inline-block; width:100%; max-width:600px; vertical-align:top;" class="width600">
            <table align="center" bgcolor="#061d49" border="0" cellpadding="0" cellspacing="0" class="display-width email-body" width="100%" style="max-width:600px; border-top-right-radius:30px; border-top-left-radius:30px">
              <tbody>
                <tr>
                  <td align="center">
                    <div style="display:inline-block; width:100%; max-width:600px; vertical-align:top;" class="width600">
                      <table align="center" border="0" class="display-width-inner" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                        <tbody>
                          <tr>
                            <td align="left" style="padding:35px 35px 30px 30px" class="res-padding">
                              <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
                                <tbody>
                                  <tr>
                                    <td align="center" style="color:#323333;">
                                      <a href="https://www.savillesdrycleaners.co.uk/" style="color:#323333; text-decoration:none;"><img mc:edit="RTEDITABLFMA1" src="{{ asset('public/images/email/logo.png') }}" alt="logo" width="250" style="margin:0; border:0; padding:0; display:block;"></a>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody></table>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td align="center">
            <div style="display:inline-block; width:100%; max-width:600px; vertical-align:top;" class="width600">
              <table align="center" bgcolor="#F3F7FF" border="0" cellpadding="0" cellspacing="0" class="display-width email-body" width="100%" style="max-width:600px;">
                <tbody><tr>
                  <td align="center" style="padding:30px 35px 0px 35px" class="res-padding sm-pb-0">
                    <div style="display:inline-block; width:100%; max-width:530px; vertical-align:top;" class="width530">
                      <table bgcolor="#FFFFFF" align="left" border="0" class="display-width-inner" cellpadding="0" cellspacing="0" width="100%" style="max-width:530px;border-top-right-radius:30px; border-top-left-radius:30px">
                        <tbody>
                          <tr>
                            <td align="center" style="color:#2E3C90;padding-top:10px;">
                              <img src="{{ asset('public/images/email/confirm.jpg') }}" class="fullwidth" width="500" style="color:#29333D;width:100%; max-width:100%; height:auto; border-top-right-radius:30px; border-top-left-radius:30px" mc:edit="RTEDITABLFMA3">
                            </td>
                          </tr>
                          <tr>
                            <td bgcolor="#FFFFFF" align="center" style="padding:40px 45px 40px 45px" class="res-padding">
                              <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; max-width:100%;">
                                <tbody>
                                  <tr>
                                    <td align="center" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:600; font-size:15px; line-height:25px; letter-spacing:0px; text-align:center; padding-bottom: 20px">
                                      Dear {{ $user['name'] }},
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="color:#6A6D73; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:15px; line-height:25px; letter-spacing:0px; text-align:center; padding-bottom:30px">
                                      We are pleased to inform you that your cleaning has been processed and will be delivered back to you on your scheduled date & time. Please see below for a break down of your order:
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:600; font-size:18px; line-height:28px; letter-spacing:0px; text-align:center; padding-bottom: 20px">
                                      Order Details:
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="center">
                                      <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:separate; mso-table-lspace:0pt; mso-table-rspace:0pt; max-width:500px; border:1px solid #F3F7FF; border-radius:20px;">
                                        <tbody>
                                          <tr>
                                            <td align="left" bgcolor="#F3F7FF" colspan="2" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:normal; font-size:15px; line-height:25px; letter-spacing:0px;border-top-right-radius:20px; border-top-left-radius:20px; padding:20px 20px 15px 20px" mc:edit="REGRT22JMC046">
                                              Order: #{{$order['no']}}
                                            </td>
                                          </tr>

                                          @foreach($services as $service)
                                          <tr>
                                            <td align="left" width="120" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:normal; font-size:15px; line-height:25px; letter-spacing:0px; border-bottom:1px solid #F3F7FF; padding:20px 20px 20px 20px">
                                              <img mc:edit="REGRT22JMC042" src="{{ asset('public/images/email/product.jpg') }}" alt="" width="120" style="color:#ffffff;width:120px; height:auto;border-radius:15px;">
                                            </td>
                                            <td align="right" style="padding:20px 20px 20px 0px; border-bottom:1px solid #F3F7FF">
                                              <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                                                <tbody>
                                                  <tr>
                                                    <td align="left" colspan="2" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:600; font-size:18px; line-height:27px; letter-spacing:0px;padding:10px 0px 10px 0px" mc:edit="REGRT22JMC041">
                                                      {{$service->service->title}}
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" colspan="2" style="color:#78818a; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:normal; font-size:15px; line-height:25px; letter-spacing:0px;padding:0px 0px 7px 0px" mc:edit="REGRT22JMC040">
                                                      Price: &#163;{{ number_format($service->service->price, 2) }}
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:normal; font-size:15px; line-height:25px; letter-spacing:0px;border-top:1px solid #F3F7FF;padding:10px 0px 10px 0px" mc:edit="REGRT22JMC038">
                                                      Qty: {{$service->qty}}
                                                    </td>
                                                    <td align="right" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:600; font-size:18px;text-align: right; line-height:28px; letter-spacing:0px;border-top:1px solid #F3F7FF;padding:10px 0px 10px 0px" mc:edit="REGRT22JMC037">
                                                      &#163;{{ number_format($service->service->price * $service->qty, 2) }}
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                          @endforeach

                                          <tr>
                                            <td align="right" bgcolor="#F3F7FF" colspan="2" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:600; font-size:19px; line-height:29px; letter-spacing:0px;border-bottom-right-radius:20px; border-bottom-left-radius:20px; padding:20px 20px 15px 20px" mc:edit="REGRT22JMC046">
                                              Order Total: &#163;{{ number_format($total, 2) }}
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:600; font-size:18px; line-height:28px; letter-spacing:0px; text-align:center; padding-top:50px; padding-bottom:10px;">
                                      Delivery Details:
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="padding:10px 0px 20px 0px;">
                                      <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:separate; mso-table-lspace:0pt; mso-table-rspace:0pt; max-width:500px; border:1px solid #f1f4f6; border-radius:20px;">
                                        <tbody>
                                          <tr>
                                            <td align="center" colspan="2" bgcolor="#F3F7FF" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:15px; line-height:26px; letter-spacing:0px; border-top-left-radius:20px; border-top-right-radius:20px; border-bottom:1px solid #FFFFFF;  padding:20px 20px 10px 20px" mc:edit="REGRT22JMC046">
                                              <span style="font-weight:600">NAME: </span> {{ $user['name'] }}
                                            </td>
                                          </tr>
                                          <tr>
                                            <td align="center" colspan="2" bgcolor="#F3F7FF" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:15px; line-height:26px; letter-spacing:0px; border-bottom:1px solid #FFFFFF;  padding:10px 20px 10px 20px" mc:edit="REGRT22JMC046">
                                              <span style="font-weight:600">ADDRESS: </span> {{$customer["address"].' '.$customer["address_1"].' '.$customer["city"].', '.$customer['postcode']}}
                                            </td>
                                          </tr>
                                          <tr>
                                            <td align="center" colspan="2" bgcolor="#F3F7FF" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:15px; line-height:26px; letter-spacing:0px; border-bottom:1px solid #FFFFFF;  padding:10px 20px 10px 20px" mc:edit="REGRT22JMC046">
                                              <span style="font-weight:600">COLLECTION DATE &amp; TIME: </span> {{ date("d.m.Y", strtotime($order['collection_date'])) }} - {{ $order['collection_time'] }}
                                            </td>
                                          </tr>
                                          <tr>
                                            <td align="center" colspan="2" bgcolor="#F3F7FF" style="color:#29333D; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:15px; line-height:26px; letter-spacing:0px; border-bottom-right-radius:20px; border-bottom-left-radius:20px; padding:10px 20px 20px 20px" mc:edit="REGRT22JMC046">
                                              <span style="font-weight:600"> DELIVERY DATE &amp; TIME: </span> {{ date("d.m.Y", strtotime($order['delivery_date'])) }} - {{ $order['delivery_time'] }}
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td bgcolor="#FAFAFA" align="center" style="padding:35px 45px 35px 45px">
                              <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; max-width:100%;">
                                <tbody>
                                  <tr>
                                    <td align="left" style="color:#161616; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:600; font-size:18px; line-height:32px; text-align:left; letter-spacing:0px; padding-bottom: 10px;" class="txt-center" mc:edit="RTRID22MR4M03">
                                      Have a Question for Us?
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="left" style="color:#6A6D73; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:15px; line-height:25px; letter-spacing:0px; text-align:left; padding-bottom: 10px;" class="txt-center">
                                      If you have any questions regarding the order status or need further assistance, please don't hesitate to  <a href="https://www.savillesdrycleaners.co.uk" style="color:#ffbf3f; text-decoration:none; display:inline-block"><span style="color:#ffbf3f;">contact us</span></a>. We are here to ensure a smooth and satisfying experience for you.
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td bgcolor="#FFFFFF" align="center" style="padding:40px 45px 40px 45px" class="res-padding">
                              <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; max-width:100%;">
                                <tbody>
                                  <tr>
                                    <td align="left" style="color:#6A6D73; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:15px; line-height:25px; letter-spacing:0px; text-align:left; padding-bottom: 40px">
                                      Thank you for choosing Savilles Dry Cleaning & Laundry!
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="left" style="color:#373b4e; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:600; font-size:15px; line-height:25px; letter-spacing:0px; text-align:left; padding-bottom: 10px">
                                      Best regards,
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="left" style="color:#6A6D73; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:15px; line-height:25px; letter-spacing:0px; text-align:left; padding-bottom: 20px">
                                      The Savilles Team
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td height="32" style="mso-line-height-rule:exactly; line-height:32px;">
                              &nbsp;
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>
              </tbody></table>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td align="center">
            <div style="display:inline-block; width:100%; max-width:600px; vertical-align:top;" class="width600">
              <table align="center" bgcolor="#000000" border="0" cellpadding="0" cellspacing="0" class="display-width email-body" width="100%" style="max-width:600px; border-bottom-right-radius:30px; border-bottom-left-radius:30px">
                <tbody><tr>
                  <td align="center" style="padding:0px 35px 15px 35px;" class="res-padding sm-pt-0">
                    <div style="display:inline-block; width:100%; max-width:530px; vertical-align:top;" class="width530">
                      <table align="left" border="0" class="display-width-inner" cellpadding="0" cellspacing="0" width="100%" style="max-width:530px;">
                        <tbody>
                          <tr>
                            <td bgcolor="#FFFFFF" align="center" style="padding:0px 45px 30px 45px; border-bottom-right-radius:30px; border-bottom-left-radius:30px" class="res-padding sm-pt-0">
                              <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; max-width:100%;">
                                <tbody>
                                  <tr>
                                    <td height="1" style="mso-line-height-rule:exactly; line-height:1px; border-top: 0.25px solid rgba(0, 0, 0, 0.3);">
                                      &nbsp;
                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="32" style="mso-line-height-rule:exactly; line-height:32px;">
                                      &nbsp;
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="center" style="font-size:0" valign="top">
                                      <div style="display:inline-block; max-width:239px; vertical-align:top; width:100%;" class="full-block-div">
                                        <table align="left" border="0" cellpadding="0" cellspacing="0" class="display-width-child" width="100%" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; max-width:100%; width:100%;">
                                          <tbody><tr>
                                            <td align="center" style="padding:10px 10px 10px 0px;" class="sm-prl-0">
                                              <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
                                                <tbody><tr>
                                                  <td align="left" style="color:#666666;" width="50">
                                                    <img src="{{ asset('public/images/email/icon.png') }}" alt="Logo" width="50" style="margin:0; border:0; padding:0; width:50px; max-width:50px; display:block; height:auto;">
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td align="left" style="color:#161616; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:12px; line-height:21.6px; letter-spacing:0px; text-align:left; padding-bottom:5px; padding-top:25px">
                                                    We are here for you:
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td align="left" style="color:#161616; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:12px; line-height:21.6px; letter-spacing:0px; text-align:left; padding-bottom: 10px">
                                                    <a href="mailto:help@savillesdrycleaners.co.uk " style="text-decoration: none;color:#161616;"><span style="color:#161616;">help@savillesdrycleaners.co.uk </span></a>
                                                  </td>
                                                </tr>
                                              </tbody></table>
                                            </td>
                                          </tr>
                                        </tbody></table>
                                      </div>
                                      <div style="display:inline-block; max-width:200px; vertical-align:top; width:100%;" class="full-block-div">
                                        <table align="right" border="0" cellpadding="0" cellspacing="0" class="display-width-child" width="100%" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; max-width:100%; width:100%;">
                                          <tbody><tr>
                                            <td align="left" style="padding:10px 0px 10px 10px;" class="sm-prl-0">
                                              <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
                                                <tbody>
                                                  <tr>
                                                    <td align="left" style="color:#161616; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:600; font-size:12px; line-height:24px; letter-spacing:0px; text-align:left; padding-top: 10px;padding-bottom: 12px">
                                                      Quick Links
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" style="color:#161616; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:12px; line-height:21.6px; letter-spacing:0px; text-align:left; padding-bottom: 4px;" >
                                                      <a href="https://savillesdrycleaners.co.uk " style="text-decoration: none"><span style="color:#161616"> Visit Your Account</a>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td align="left" style="color:#161616; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:12px; line-height:21.6px; letter-spacing:0px; text-align:left; padding-bottom: 4px;" >
                                                        <a href="https://www.savillesdrycleaners.co.uk/support" style="text-decoration: none"><span style="color:#161616"> Common Questions </a>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td align="left" style="color:#161616; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:12px; line-height:21.6px; letter-spacing:0px; text-align:left; padding-bottom: 4px;" >
                                                          <a href="https://www.savillesdrycleaners.co.uk/contact" style="text-decoration: none"><span style="color:#161616"> Contact Us</a>
                                                          </td>
                                                        </tr>
                                                      </tbody></table>
                                                    </td>
                                                  </tr>
                                                </tbody></table>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#000000" align="center" style="padding:0px 45px 30px 45px" class="res-padding sm-pt-0">
                                      <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; max-width:100%;">
                                        <tbody>
                                          <tr>
                                            <td height="32" style="mso-line-height-rule:exactly; line-height:32px;">
                                              &nbsp;
                                            </td>
                                          </tr>
                                          <tr>
                                            <td align="center" style="color:#FFFFFF; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:12px; line-height:24px; letter-spacing:0px; text-align:center; padding-top: 10px;padding-bottom: 20px">
                                              Follow us on social media
                                            </td>
                                          </tr>
                                          <tr>
                                            <td align="center" style="vertical-align: top; word-wrap:break-word; padding:0px 0px 10px 0px;">
                                              <table align="center" border="0" cellpadding="0" cellspacing="0" style="font-weight: 400 !important;margin:0 auto;text-align:center;">
                                                <tbody>
                                                  <tr>
                                                    <td> </td>
                                                    <td align="center" class="socialicon" style="font-weight: normal !important; padding: 2px;" width="40" pardot-region="">
                                                      <a href="https://www.instagram.com/" target="_blank"><img alt="insta" src="{{ asset('public/images/email/instagram.png') }}" style="border-width: 0; height: auto; line-height: 100%; display: block; outline-style: none; text-decoration: none;" width="30"> </a>
                                                    </td>
                                                    <td align="center" class="socialicon" style="font-weight: normal !important; padding: 2px;" width="40" pardot-region="">
                                                      <a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" src="{{ asset('public/images/email/facebook.png') }}" style="border-width: 0; height: auto; line-height: 100%; display: block; outline-style: none; text-decoration: none;" width="30"> </a>
                                                    </td>
                                                    <td align="center" class="socialicon" style="font-weight: normal !important; padding: 2px;" width="40" pardot-region="">
                                                      <a href="https://twitter.com/" target="_blank"><img alt="Twitter" src="{{ asset('public/images/email/twitter.png') }}" style="border-width: 0; height: auto; line-height: 100%; display: block; outline-style: none; text-decoration: none;" width="30"> </a>
                                                    </td>
                                                    <td align="center" class="socialicon" style="font-weight: normal !important; padding: 2px;" width="40" pardot-region="">
                                                      <a href="https://www.linkedin.com" target="_blank"><img alt="Linkedin" src="{{ asset('public/images/email/linkedin.png') }}" style="border-width: 0; height: auto; line-height: 100%; display: block; outline-style: none; text-decoration: none;" width="30"> </a>
                                                    </td>
                                                    <td> </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#000000" align="center" style="padding:0px" class="res-padding sm-pt-0">
                                      <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; max-width:100%;">
                                        <tbody>
                                          <tr>
                                            <td height="1" style="mso-line-height-rule:exactly; line-height:1px; border-top: 0.25px solid #5a5a5a;">
                                              &nbsp;
                                            </td>
                                          </tr>
                                          <tr>
                                            <td align="left" style="color:#838282; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:10px; line-height:18px; letter-spacing:0px; text-align:left; padding:24px 0px 15px 0px">
                                              © 2024 Savilles Dry Cleaners. All Rights Reserved.
                                            </td>
                                          </tr>
                                          <tr>
                                            <td align="left" style="color:#838282; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:10px; line-height:18px; letter-spacing:0px; text-align:left; padding:0px 0px 15px 0px">
                                              Savilles Dry Cleaners, 17 Anyards Road, Cobham, KT11 2LW
                                            </td>
                                          </tr>
                                          <tr>
                                            <td align="left" style="color:#838282; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:10px; line-height:18px; letter-spacing:0px; text-align:left; padding:0px 0px 15px 0px">
                                              This email was automatically generated by a user interaction at <a href="https://www.savillesdrycleaners.co.uk " style="text-decoration: underline;color:#9b9c9c"><span style="color:#9b9c9c">https://www.savillesdrycleaners.co.uk </a>  by someone using the email from IP address . If this was not you, please  <a href="https://www.savillesdrycleaners.co.uk/contact" style="text-decoration: underline;color:#9b9c9c"><span style="color:#9b9c9c">let us know</a>.
                                              </td>
                                            </tr>
                                            <tr>
                                              <td align="left" style="color:#838282; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300; font-size:10px; line-height:18px; letter-spacing:0px; text-align:left; padding:0px 0px 24px 0px">
                                                <a href="https://www.savillesdrycleaners.co.uk/contact" style="color:#9b9c9c; line-height:20px; margin:0; text-decoration:underline; font-size:10px; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300;" target="_blank"> Contact Us </a> &nbsp; &nbsp;
                                                <a href="https://www.savillesdrycleaners.co.uk/support/tos" style="color:#9b9c9c; line-height:20px; margin:0; text-decoration:underline; font-size:10px; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300;" target="_blank">   Terms of Service</a> &nbsp; &nbsp;
                                                <a href="https://www.savillesdrycleaners.co.uk/support/privacy" style="color:#9b9c9c; line-height:20px; margin:0; text-decoration:underline; font-size:10px; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300;" target="_blank">  Privacy Policy </a> &nbsp; &nbsp;
                                                <a href="javascript:void(0);" style="color:#9b9c9c; line-height:20px; margin:0; text-decoration:underline; font-size:10px; font-family:'Poppins', Arial, Verdana, Helvetica Neue, Helvetica, sans-serif !important; font-weight:300;" target="_blank">  Unsubscribe </a>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </td>
                          </tr>
                        </tbody></table>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td height="35" class="height20" style="mso-line-height-rule:exactly; line-height:35px;">
                    </td>
                  </tr>
                </tbody>
              </table>
            </body>
            </html>
