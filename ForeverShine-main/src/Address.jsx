import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';

export default function Address() {
  const [address, setAddress] = useState({
    fullName: '',
    street: '',
    city: '',
    state: '',
    zip: '',
    phone: '',
  });

  const [errors, setErrors] = useState({});
  const navigate = useNavigate();

  const validate = () => {
    const newErrors = {};
    if (!address.fullName.trim()) newErrors.fullName = 'Full name is required';
    if (!address.street.trim()) newErrors.street = 'Street address is required';
    if (!address.city.trim()) newErrors.city = 'City is required';
    if (!address.state.trim()) newErrors.state = 'State is required';
    if (!address.zip.trim()) newErrors.zip = 'ZIP code is required';
    if (!address.phone.trim()) newErrors.phone = 'Phone number is required';
    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

  const handleChange = (e) => {
    setAddress({ ...address, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    if (validate()) {
      // Save address to context or state management if needed
      navigate('/payment');
    }
  };

  return (
    <div className="max-w-4xl mx-auto px-4 py-12">
      <h1 className="text-3xl font-bold mb-8">Enter Shipping Address</h1>
      <form onSubmit={handleSubmit} className="space-y-6 max-w-md">
        <div>
          <label className="block mb-1 font-semibold">Full Name</label>
          <input
            type="text"
            name="fullName"
            value={address.fullName}
            onChange={handleChange}
            className="w-full border border-gray-300 rounded px-3 py-2"
            placeholder="John Doe"
          />
          {errors.fullName && <p className="text-red-600 text-sm mt-1">{errors.fullName}</p>}
        </div>
        <div>
          <label className="block mb-1 font-semibold">Street Address</label>
          <input
            type="text"
            name="street"
            value={address.street}
            onChange={handleChange}
            className="w-full border border-gray-300 rounded px-3 py-2"
            placeholder="123 Main St"
          />
          {errors.street && <p className="text-red-600 text-sm mt-1">{errors.street}</p>}
        </div>
        <div>
          <label className="block mb-1 font-semibold">City</label>
          <input
            type="text"
            name="city"
            value={address.city}
            onChange={handleChange}
            className="w-full border border-gray-300 rounded px-3 py-2"
            placeholder="City"
          />
          {errors.city && <p className="text-red-600 text-sm mt-1">{errors.city}</p>}
        </div>
        <div>
          <label className="block mb-1 font-semibold">State</label>
          <input
            type="text"
            name="state"
            value={address.state}
            onChange={handleChange}
            className="w-full border border-gray-300 rounded px-3 py-2"
            placeholder="State"
          />
          {errors.state && <p className="text-red-600 text-sm mt-1">{errors.state}</p>}
        </div>
        <div>
          <label className="block mb-1 font-semibold">ZIP Code</label>
          <input
            type="text"
            name="zip"
            value={address.zip}
            onChange={handleChange}
            className="w-full border border-gray-300 rounded px-3 py-2"
            placeholder="12345"
          />
          {errors.zip && <p className="text-red-600 text-sm mt-1">{errors.zip}</p>}
        </div>
        <div>
          <label className="block mb-1 font-semibold">Phone Number</label>
          <input
            type="text"
            name="phone"
            value={address.phone}
            onChange={handleChange}
            className="w-full border border-gray-300 rounded px-3 py-2"
            placeholder="(123) 456-7890"
          />
          {errors.phone && <p className="text-red-600 text-sm mt-1">{errors.phone}</p>}
        </div>
        <button
          type="submit"
          className="w-full bg-teal-600 text-white py-3 rounded hover:bg-teal-700 transition"
        >
          Continue to Payment
        </button>
      </form>
    </div>
  );
}
