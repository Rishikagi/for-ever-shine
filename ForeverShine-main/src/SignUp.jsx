import React, { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';

export default function SignUp() {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [confirmPassword, setConfirmPassword] = useState('');
  const [error, setError] = useState('');
  const navigate = useNavigate();

  const handleSubmit = (e) => {
    e.preventDefault();
    if (password !== confirmPassword) {
      setError('Passwords do not match');
      return;
    }
    setError('');
    // Mock signup: save user data in localStorage
    const users = JSON.parse(localStorage.getItem('users') || '[]');
    if (users.find(u => u.email === email)) {
      setError('User with this email already exists');
      return;
    }
    users.push({ name, email, password });
    localStorage.setItem('users', JSON.stringify(users));
    navigate('/Login');
  };

  return (
    <div className="min-h-screen flex flex-col items-center justify-center bg-gray-50 py-16 px-4">
      <div className="w-full max-w-xl mx-auto bg-white rounded-2xl shadow-xl p-10 flex flex-col items-center animate-fadeInUp">
        <h2 className="text-4xl font-extrabold mb-6 text-center text-gray-900">Sign Up</h2>
        <p className="text-lg text-center text-gray-700 mb-8">
          Create your account to start shopping
        </p>
        <form className="w-full flex flex-col items-center" onSubmit={handleSubmit}>
          <label className="w-full max-w-md text-left mb-1 font-semibold text-gray-700">Name:</label>
          <input
            type="text"
            placeholder="Full name"
            required
            value={name}
            onChange={(e) => setName(e.target.value)}
            className="w-full max-w-md px-6 py-3 border-2 border-gray-300 rounded-xl text-lg focus:outline-none focus:border-teal-600 transition-all duration-200 bg-gray-100 placeholder-gray-400"
          />
          <br />

          <label className="w-full max-w-md text-left mb-1 font-semibold text-gray-700">Email:</label>
          <input
            type="email"
            placeholder="Email address"
            required
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            className="w-full max-w-md px-6 py-3 border-2 border-gray-300 rounded-xl text-lg focus:outline-none focus:border-teal-600 transition-all duration-200 bg-gray-100 placeholder-gray-400"
          />
          <br />

          <label className="w-full max-w-md text-left mb-1 font-semibold text-gray-700">Password:</label>
          <input
            type="password"
            placeholder="Enter your password"
            required
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            className="w-full max-w-md px-6 py-3 border-2 border-gray-300 rounded-xl text-lg focus:outline-none focus:border-teal-600 transition-all duration-200 bg-gray-100 placeholder-gray-400"
          />
          <br />

          <label className="w-full max-w-md text-left mb-1 font-semibold text-gray-700">Confirm Password:</label>
          <input
            type="password"
            placeholder="Confirm your password"
            required
            value={confirmPassword}
            onChange={(e) => setConfirmPassword(e.target.value)}
            className="w-full max-w-md px-6 py-3 border-2 border-gray-300 rounded-xl text-lg focus:outline-none focus:border-teal-600 transition-all duration-200 bg-gray-100 placeholder-gray-400"
          />
          {error && <p className="text-red-600 mt-2">{error}</p>}
          <div className="mt-8 w-full flex flex-col sm:flex-row justify-between gap-4 px-4">
            <button
              type="submit"
              className="w-full bg-teal-600 text-white px-6 py-2 rounded-full hover:bg-teal-700 transition-colors"
            >
              Sign Up
            </button>
          </div>
        </form>
        <div>
    <p className='w-full flex flex-col items-left'>If already registered...</p>
              <Link to="/Login">
          <a className=" text-Black underlined px-6 py-2 hover:text-teal-700 justify-center transition-colors w-full flex flex-col items-center">
            Login
          </a> </Link>
        </div>
      </div>
    </div>
  );
}
