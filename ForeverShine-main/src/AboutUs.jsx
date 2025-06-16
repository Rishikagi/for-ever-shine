import React from 'react';
import Hitesh from './images/HiteshTiwari.jpg'
import Sandeep from './images/SandeepSharma.jpg'
import Photo from './images/Photo.jpg'
export default function AboutUs() {
  return (
    <div className="min-h-screen bg-gray-50 py-8 px-2 md:px-8">
      <div className="max-w-3xl mx-auto">
        <div className="bg-white rounded-2xl shadow-lg p-6 md:p-10 mb-8">
          <div className="mb-4">
            <span className="bg-[#3F7373] text-white px-3 py-1 rounded-lg text-lg font-semibold">Forever Shine: Shining Bright, Since Day One</span>
          </div>
          <p className="text-gray-800 text-base md:text-lg mb-4">
          Born from a passion for cars and a 15-year career in the automotive industry, Forever Shine began its journey in 2024, driven by a dream to conquer the car care, home care, and personal care markets. Our founder's experience with renowned brands like Mahindra, Skoda, Renault, and Maruti, coupled with his own successful car workshop and electric two-wheeler distribution business, fueled his desire to create high-quality products.<br/><br/>
          Starting locally with home care products, Forever Shine expanded into car care, leveraging its deep understanding of the market. A trip to Dubai revealed international potential, leading to export plans.Today, Forever Shine is a testament to hard work and dedication, built by a team of eight passionate individuals. We are committed to delivering exceptional quality and variety, ensuring your car, home, and life shine forever.
          </p>
          <div className="flex gap-4 justify-center my-8">
            <div className="flex flex-col items-center border-r border-gray-300 pr-8">
              <span className="text-3xl font-bold text-gray-900">654k +</span>
              <span className="text-base text-gray-700">Sales</span>
            </div>
            <div className="flex flex-col items-center pl-8">
              <span className="text-3xl font-bold text-gray-900">1k +</span>
              <span className="text-base text-gray-700">Customers</span>
            </div>
          </div>
          <div className="flex flex-col md:flex-row gap-8 justify-center items-center my-8">
            <div className="flex flex-col items-center">
              <img src={Sandeep} alt="Sandeep Sharma" className="w-40 h-40 object-cover rounded-full border-4 border-gray-200 shadow-lg mb-2" />
              <span className="text-lg font-bold text-gray-900">Sandeep Sharma</span>
            </div>
            <div className="flex flex-col items-center">
              <img src={Hitesh} alt="Hitesh Tiwari" className="w-40 h-40 object-cover rounded-full border-4 border-gray-200 shadow-lg mb-2" />
              <span className="text-lg font-bold text-gray-900">Hitesh Tiwari</span>
            </div>
          </div>
          <div className="mt-8">
            <h3 className="text-xl font-bold text-red-600 mb-2">News</h3>
            <p className="text-base text-gray-800 mb-2">
              Our MD <span className="font-bold">Mr. Sandeep Sharma</span> was Honoured by <span className="font-bold">Isha Deol</span> on 24th Feb 2025. Later, he addressed the press at a conference in <span className="font-bold">Delhi</span>.
            </p>
            <img src={Photo} alt="News" className="w-full h-96 object-cover rounded-xl shadow-lg mt-4" />
          </div>
        </div>
      </div>
    </div>
  );
} 