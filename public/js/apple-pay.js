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
    // Step 1: Fetch the PaymentIntent (without confirming it)
    const csrfToken = document.getElementById('csrf-token').value;

    const {error: backendError, clientSecret, paymentIntentId} = await fetch(
      '/newsitedesign/create-payment-intent',
      {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
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

    
    // Save the clientSecret and PaymentIntent ID somewhere for later use
    
    // Complete the payment request interaction
    e.complete('success');

    // Enable the "Place Order" button (or other UI actions) to update the amount later.
    placeOrderButton.disabled = false;
    
    document.getElementById('paymentMethodId').value = e.paymentMethod.id;
    document.getElementById('paymentId').value = paymentIntentId;
    placeOrderButton.click();
});

  function addMessage(message) {
    console.log(message);
}

 
});
