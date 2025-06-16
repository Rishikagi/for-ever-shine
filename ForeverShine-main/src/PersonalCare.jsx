import React, { useState } from 'react';

export default function PersonalCare() {
  const [email, setEmail] = useState('');
  const [submitted, setSubmitted] = useState(false);
  const [error, setError] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    setError('');
    // Simple email validation regex
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      setError('Please enter a valid email address.');
      return;
    }
    // Simulate successful submission
    setSubmitted(true);
  };

  return (
    <div className="min-h-screen flex flex-col items-center justify-center bg-gray-50 py-16 px-4">
      <div className="w-full max-w-xl mx-auto bg-white rounded-2xl shadow-xl p-10 flex flex-col items-center animate-fadeInUp">
        <h2 className="text-4xl font-extrabold mb-6 text-center text-gray-900">Coming Soon</h2>
        <p className="text-lg text-center text-gray-700 mb-8">
          Leave your email and we'll let you know when the shop opens
        </p>
        <form className="w-full flex flex-col items-center" onSubmit={handleSubmit}>
          <input
            type="email"
            placeholder="Email address"
            className="w-full max-w-md px-6 py-3 border-2 border-gray-300 rounded-xl text-lg focus:outline-none focus:border-teal-600 transition-all duration-200 bg-gray-100 placeholder-gray-400"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
          />
          {error && <p className="text-red-500 mt-2">{error}</p>}
          <button
            type="submit"
            className="mt-6 w-full max-w-md bg-teal-600 text-white py-3 rounded-xl text-lg font-semibold hover:bg-teal-700 transition-colors duration-200"
          >
            Submit
          </button>
          {submitted && (
            <p className="text-green-600 mt-4 text-center">
              Thank you! You will be notified when the shop opens.
            </p>
          )}
        </form>
      </div>
    </div>
  );
}
