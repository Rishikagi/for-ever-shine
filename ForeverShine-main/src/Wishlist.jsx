import React from 'react';
import { useNavigate } from 'react-router-dom';

export default function Wishlist() {
  const navigate = useNavigate();

  return (
    <div className="min-h-screen flex items-center justify-center bg-gray-50 px-4">
      <div className="bg-white rounded-2xl shadow-lg p-10 max-w-md w-full text-center">
        <h1 className="text-4xl font-extrabold mb-6 text-teal-700">Coming Soon</h1>
        <p className="text-gray-600 mb-8 text-lg">Wishlist feature coming soon</p>
        <button
          onClick={() => navigate('/')}
          className="bg-teal-600 text-white px-6 py-3 rounded-full hover:bg-teal-700 transition-colors font-semibold"
        >
          Continue Shopping
        </button>
      </div>
    </div>
  );
}
