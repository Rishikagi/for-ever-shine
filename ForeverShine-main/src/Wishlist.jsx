import React from 'react';
import { useNavigate } from 'react-router-dom';
import { useWishlist } from './context/WishlistContext';
import { XMarkIcon } from '@heroicons/react/24/outline';

export default function Wishlist() {
  const navigate = useNavigate();
  const { wishlist, removeFromWishlist } = useWishlist();

  if (wishlist.length === 0) {
    return (
      <div className="min-h-screen flex items-center justify-center bg-gray-50 px-4">
        <div className="bg-white rounded-2xl shadow-lg p-10 max-w-md w-full text-center">
          <h1 className="text-4xl font-extrabold mb-6 text-teal-700">Your wishlist is empty</h1>
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

  return (
    <div className="min-h-screen bg-gray-50 px-4 py-8">
      <div className="max-w-6xl mx-auto">
        <h1 className="text-4xl font-extrabold mb-8 text-teal-700">Your Wishlist</h1>
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
          {wishlist.map((product) => (
            <div key={product.id} className="bg-white rounded-lg shadow-md p-4 relative">
              <img
                src={product.image}
                alt={product.name}
                className="w-full h-48 object-cover rounded-md mb-4"
              />
              <h2 className="text-lg font-semibold text-gray-800">{product.name}</h2>
              <p className="text-teal-700 font-bold">{product.price}</p>
              <button
                onClick={() => removeFromWishlist(product.id)}
                className="absolute top-2 right-2 p-1 rounded-full bg-red-500 hover:bg-red-600 text-white transition-colors"
                aria-label="Remove from wishlist"
              >
                <XMarkIcon className="w-5 h-5" />
              </button>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}
