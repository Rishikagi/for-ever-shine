import React, { useState } from 'react';

export default function ContactUs() {
  const [formData, setFormData] = useState({
    name: '',
    contact: '',
    email: '',
    comment: ''
  });

  const [submitted, setSubmitted] = useState(false);

  const handleChange = (e) => {
    setFormData({...formData, [e.target.name]: e.target.value});
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    // For now, just log the form data and show a success message
    console.log('Inquiry submitted:', formData);
    setSubmitted(true);
    // Reset form
    setFormData({
      name: '',
      contact: '',
      email: '',
      comment: ''
    });
  };

  return (
    <div className="max-w-4xl mx-auto px-4 py-12">
      <h1 className="text-3xl font-bold mb-8">Contact Us</h1>

      <div className="mb-8">
        {/* Removed "Get in Touch" heading as per user request */}
        <p className="mb-2">Phone: <a href="tel:+918387941041" className="text-teal-700 hover:underline">+91 8387941041</a></p>
        <p className="mb-2">Email: <a href="mailto:forevershinein@gmail.com" className="text-teal-700 hover:underline">forevershinein@gmail.com</a></p>
        <p className="mb-2">Address: D-107 Budh Vihar, Alwar, Rajasthan - 301001</p>
        <p className="mb-2">Working Hours: Monday - Saturday, 9:00 AM - 6:00 PM</p>
      </div>

      <div>
        <h2 className="text-2xl font-semibold mb-4">Inquiry Form</h2>
        {submitted && (
          <div className="mb-4 p-4 bg-green-100 text-green-700 rounded">
            Thank you for your inquiry! We will get back to you soon.
          </div>
        )}
        <form onSubmit={handleSubmit} className="space-y-4 max-w-md">
          <div>
            <label htmlFor="name" className="block font-medium mb-1">Name</label>
            <input
              type="text"
              id="name"
              name="name"
              value={formData.name}
              onChange={handleChange}
              required
              className="w-full border border-gray-300 rounded px-3 py-2"
            />
          </div>
          <div>
            <label htmlFor="contact" className="block font-medium mb-1">Contact Number</label>
            <input
              type="tel"
              id="contact"
              name="contact"
              value={formData.contact}
              onChange={handleChange}
              required
              className="w-full border border-gray-300 rounded px-3 py-2"
            />
          </div>
          <div>
            <label htmlFor="email" className="block font-medium mb-1">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              value={formData.email}
              onChange={handleChange}
              required
              className="w-full border border-gray-300 rounded px-3 py-2"
            />
          </div>
          <div>
            <label htmlFor="comment" className="block font-medium mb-1">Comment</label>
            <textarea
              id="comment"
              name="comment"
              value={formData.comment}
              onChange={handleChange}
              rows="4"
              className="w-full border border-gray-300 rounded px-3 py-2"
            ></textarea>
          </div>
          <button
            type="submit"
            className="bg-teal-700 text-white px-6 py-2 rounded hover:bg-teal-800 transition-colors"
          >
            Submit
          </button>
        </form>
      </div>
    </div>
  );
}
