 import React from 'react';
import { useCart } from './context/CartContext';
import { Link } from 'react-router-dom';
import { TrashIcon } from '@heroicons/react/24/outline';

import { useNavigate } from 'react-router-dom';

export default function Cart() {
  const { cart, removeFromCart, updateQuantity, getCartTotal } = useCart();
  const navigate = useNavigate();

  console.log('Cart component rendered with cart:', cart);

  if (cart.length === 0) {
    return (
      <div className="min-h-[60vh] flex flex-col items-center justify-center">
        <h2 className="text-3xl font-bold text-gray-800 mb-4">Your cart is empty</h2>
        <p className="text-gray-600 mb-8">Looks like you haven't added any items to your cart yet.</p>
        <Link
          to="/"
          className="bg-teal-600 text-white px-8 py-3 rounded-full hover:bg-teal-700 transition-colors"
        >
          Continue Shopping
        </Link>
      </div>
    );
  }

  const handleCheckout = () => {
    navigate('/address');
  };

  return (
    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <h1 className="text-3xl font-bold text-gray-900 mb-8">Shopping Cart</h1>
      
      <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {/* Cart Items */}
        <div className="lg:col-span-2">
          <div className="bg-white rounded-2xl shadow-lg overflow-hidden">
            {cart.map((item) => (
              <div key={item.id} className="p-6 border-b border-gray-200 last:border-b-0">
                <div className="flex items-center gap-6">
                  {/* Product Image */}
                  <div className="w-24 h-24 flex-shrink-0">
                    <img
                      src={item.image}
                      alt={item.name}
                      className="w-full h-full object-contain"
                    />
                  </div>
                  
                  {/* Product Info */}
                  <div className="flex-grow">
                    <h3 className="text-lg font-semibold text-gray-900 mb-1">{item.name}</h3>
                    <p className="text-sm text-gray-500 mb-2">{item.category}</p>
                    <p className="text-lg font-bold text-teal-700">{item.price}</p>
                  </div>

                  {/* Quantity Controls */}
                  <div className="flex items-center gap-4">
                    <div className="flex items-center border border-gray-300 rounded-lg">
                      <button
                        onClick={() => updateQuantity(item.id, item.quantity - 1)}
                        className="px-3 py-1 text-gray-600 hover:bg-gray-100"
                      >
                        -
                      </button>
                      <span className="px-3 py-1 text-gray-900">{item.quantity}</span>
                      <button
                        onClick={() => updateQuantity(item.id, item.quantity + 1)}
                        className="px-3 py-1 text-gray-600 hover:bg-gray-100"
                      >
                        +
                      </button>
                    </div>
                    
                    {/* Remove Button */}
                    <button
                      onClick={() => removeFromCart(item.id)}
                      className="text-red-500 hover:text-red-700 transition-colors"
                    >
                      <TrashIcon className="w-5 h-5" />
                    </button>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>

        {/* Order Summary */}
        <div className="lg:col-span-1">
          <div className="bg-white rounded-2xl shadow-lg p-6 sticky top-32">
            <h2 className="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>
            
            <div className="space-y-4">
              <div className="flex justify-between text-gray-600">
                <span>Subtotal</span>
                <span>₹ {getCartTotal().toFixed(2)}</span>
              </div>
              <div className="flex justify-between text-gray-600">
                <span>Shipping</span>
                <span>Free</span>
              </div>
              <div className="border-t border-gray-200 pt-4">
                <div className="flex justify-between text-lg font-bold text-gray-900">
                  <span>Total</span>
                  <span>₹ {getCartTotal().toFixed(2)}</span>
                </div>
              </div>
            </div>

            <button
              onClick={handleCheckout}
              className="w-full bg-teal-600 text-white py-3 rounded-full mt-6 hover:bg-teal-700 transition-colors"
            >
              Proceed to Checkout
            </button>

            <Link
              to="/"
              className="block text-center text-teal-600 hover:text-teal-700 mt-4"
            >
              Continue Shopping
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}
