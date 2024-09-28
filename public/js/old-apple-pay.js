document.addEventListener('DOMContentLoaded', async () => {
  // Load the publishable key from the server. The publishable key
  // is set in your .env file. In practice, most users hard code the
  // publishable key when initializing the Stripe object.
  const loader = document.getElementById('loader');
  loader.style.display = 'flex';

   const {publishableKey} = await fetch('/newsitedesign/strip-config').then((r) => r.json());
  if (!publishableKey) {
    addMessage(
      'No publishable key returned from the server. Please check `.env` and try again'
    );
    loader.style.display = 'none'; // Hide the loader

    alert('Please set your Stripe publishable API key in the .env file');
    return;
  }

  // 1. Initialize Stripe
  const stripe = Stripe(publishableKey, {
    apiVersion: '2020-08-27',
  });
  // 2. Create a payment request object
  var paymentRequest = stripe.paymentRequest({
    country: 'GB',
    currency: 'gbp',
    total: {
      label: 'Demo total',
      amount: 0,
    },
    requestPayerName: true,
    requestPayerEmail: true
  });

  // 3. Create a PaymentRequestButton element
  const elements = stripe.elements();
  const prButton = elements.create('paymentRequestButton', {
    paymentRequest: paymentRequest,
    paymentMethods: { applePay: 'always',link: 'never'}
  });
  
  // Check the availability of the Payment Request API,
  // then mount the PaymentRequestButton
  paymentRequest.canMakePayment().then(function (result) {
    if (result) {
        prButton.mount('#payment-request-button');
    } else {
        document.getElementById('payment-request-button').style.display = 'none';
        addMessage('Apple Pay support not found. Check the pre-requisites above and ensure you are testing in a supported browser.');
    }
  });
  
const placeOrderButton = document.getElementById('create_order');
  setTimeout(() => {
    loader.style.display = 'none';
  }, "1000");
  
  paymentRequest.on('paymentmethod', async (e) => {
    // Make a call to the server to create a new
    // payment intent and store its client_secret.
        const csrfToken = document.getElementById('csrf-token').value;

    const {error: backendError, clientSecret} = await fetch(
      '/newsitedesign/create-payment-intent',
      {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,  // Include the CSRF token in the headers

        },
        body: JSON.stringify({
          currency: 'gbp',
          paymentMethodType: 'card'
        }),
      }
    ).then((r) => r.json());

    if (backendError) {
      addMessage(backendError.message);
      e.complete('fail');
      return;
    }
    addMessage(`Client secret returned.`);

    // Confirm the PaymentIntent without handling potential next actions (yet).
    let {error, paymentIntent} = await stripe.confirmCardPayment(
      clientSecret,
      {
        payment_method: e.paymentMethod.id,
      },
      {
        handleActions: false,
      }
    );

    if (error) {
      addMessage(error.message);

      // Report to the browser that the payment failed, prompting it to
      // re-show the payment interface, or show an error message and close
      // the payment interface.
      e.complete('fail');
      return;
    }
    // Report to the browser that the confirmation was successful, prompting
    // it to close the browser payment method collection interface.
    e.complete('success');

    // Check if the PaymentIntent requires any actions and if so let Stripe.js
    // handle the flow. If using an API version older than "2019-02-11" instead
    // instead check for: `paymentIntent.status === "requires_source_action"`.
    if (paymentIntent.status === 'requires_action') {
      // Let Stripe.js handle the rest of the payment flow.
      let {error, paymentIntent} = await stripe.confirmCardPayment(
        clientSecret
      );
      if (error) {
        // The payment failed -- ask your customer for a new payment method.
        addMessage(error.message);
        return;
      }
      addMessage(`Payment ${paymentIntent.status}: ${paymentIntent.id}`);
    }

    addMessage(`Payment ${paymentIntent.status}: ${paymentIntent.id}`);
    
            // Enable the "Place Order" button and change form action
        placeOrderButton.disabled = false;
        document.getElementById('paymentId').value = paymentIntent.id;
        // Trigger a click event on the button to submit the form
        placeOrderButton.click();

  });
  function addMessage(message) {
    console.log(message);
}

 
});
