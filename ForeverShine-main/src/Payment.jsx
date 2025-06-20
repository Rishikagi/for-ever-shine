import React, { useState } from 'react';

export default function Payment() {
  const [paymentMethod, setPaymentMethod] = useState('creditCard');
  const [cardNumber, setCardNumber] = useState('');
  const [cardName, setCardName] = useState('');
  const [expiry, setExpiry] = useState('');
  const [cvv, setCvv] = useState('');
  const [paymentStatus, setPaymentStatus] = useState(null);
  const [isProcessing, setIsProcessing] = useState(false);

  const handlePaymentMethodChange = (e) => {
    setPaymentMethod(e.target.value);
    setPaymentStatus(null);
  };

  const validateCreditCard = () => {
    // Basic validation for demo purposes
    if (
      cardNumber.length !== 16 ||
      !/^\d+$/.test(cardNumber) ||
      cardName.trim() === '' ||
      !/^\d{2}\/\d{2}$/.test(expiry) ||
      cvv.length !== 3 ||
      !/^\d+$/.test(cvv)
    ) {
      return false;
    }
    return true;
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    setPaymentStatus(null);

    if (paymentMethod === 'creditCard') {
      if (!validateCreditCard()) {
        setPaymentStatus({ success: false, message: 'Invalid credit card details.' });
        return;
      }
    }

    setIsProcessing(true);

    // Simulate payment processing delay
    setTimeout(() => {
      setIsProcessing(false);
      setPaymentStatus({ success: true, message: 'Payment successful! Thank you for your purchase.' });
    }, 2000);
  };

  const handleOtherPaymentConfirmation = () => {
    setPaymentStatus({ success: true, message: 'Your order has been placed. Thank you for your purchase.' });
  };

  const redirectToGooglePay = () => {
    // Redirect to Google Pay payment URL (example URL)
    window.location.href = 'https://pay.google.com/gp/w/u/0/home/paymentmethods';
  };

  return (
    <div className="max-w-4xl mx-auto px-4 py-12">
      <h1 className="text-3xl font-bold mb-8">Online Payment</h1>

      <div className="mb-6">
        <label className="mr-6">
          <input
            type="radio"
            value="creditCard"
            checked={paymentMethod === 'creditCard'}
            onChange={handlePaymentMethodChange}
            className="mr-2"
          />
          Credit Card / Debit Card
        </label>
        <label className="mr-6">
          <input
            type="radio"
            value="paypal"
            checked={paymentMethod === 'paypal'}
            onChange={handlePaymentMethodChange}
            className="mr-2"
          />
          PayPal / UPI
        </label>
        <label>
          <input
            type="radio"
            value="cod"
            checked={paymentMethod === 'cod'}
            onChange={handlePaymentMethodChange}
            className="mr-2"
          />
          Cash on Delivery
        </label>
      </div>

      {paymentMethod === 'creditCard' && (
        <form onSubmit={handleSubmit} className="space-y-4 max-w-md">
          <div>
            <label className="block mb-1 font-semibold">Card Number</label>
            <input
              type="text"
              maxLength="16"
              value={cardNumber}
              onChange={(e) => setCardNumber(e.target.value.replace(/\D/g, ''))}
              className="w-full border border-gray-300 rounded px-3 py-2"
              placeholder="1234123412341234"
              required
            />
          </div>
          <div>
            <label className="block mb-1 font-semibold">Name on Card</label>
            <input
              type="text"
              value={cardName}
              onChange={(e) => setCardName(e.target.value)}
              className="w-full border border-gray-300 rounded px-3 py-2"
              placeholder="John Doe"
              required
            />
          </div>
          <div className="flex gap-4">
            <div className="flex-1">
              <label className="block mb-1 font-semibold">Expiry (MM/YY)</label>
              <input
                type="text"
                maxLength="5"
                value={expiry}
                onChange={(e) => setExpiry(e.target.value)}
                className="w-full border border-gray-300 rounded px-3 py-2"
                placeholder="12/24"
                required
              />
            </div>
            <div className="flex-1">
              <label className="block mb-1 font-semibold">CVV</label>
              <input
                type="password"
                maxLength="3"
                value={cvv}
                onChange={(e) => setCvv(e.target.value.replace(/\D/g, ''))}
                className="w-full border border-gray-300 rounded px-3 py-2"
                placeholder="123"
                required
              />
            </div>
          </div>
          <button
            type="submit"
            disabled={isProcessing}
            className={`w-full bg-teal-600 text-white py-3 rounded hover:bg-teal-700 transition ${
              isProcessing ? 'opacity-75 cursor-not-allowed' : ''
            }`}
          >
            {isProcessing ? 'Processing...' : 'Pay Now'}
          </button>
        </form>
      )}

      {paymentMethod === 'paypal' && (
        <div className="max-w-md">
          <p className="mb-4">You will be redirected to Google Pay to complete your payment.</p>
          <button
            onClick={redirectToGooglePay}
            className="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition"
          >
            Pay with Google Pay
          </button>
        </div>
      )}

      {paymentMethod === 'cod' && (
        <div className="max-w-md">
          <p className="mb-4">You will pay with cash on delivery.</p>
          <button
            onClick={handleOtherPaymentConfirmation}
            className="w-full bg-teal-600 text-white py-3 rounded hover:bg-teal-700 transition"
          >
            Confirm Order
          </button>
        </div>
      )}

      {paymentStatus && (
        <div
          className={`mt-6 p-4 rounded ${
            paymentStatus.success ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'
          }`}
        >
          {paymentStatus.message}
        </div>
      )}
    </div>
  );
}
