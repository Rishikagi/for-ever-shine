import Blog1 from './images/Blog1.jpg'

import React from 'react';
export default function BlogOne(){
    return(
     <div className="max-w-4xl mx-auto px-4 py-12">
  <h1 className="text-3xl font-bold mb-8 text-center">Our Blogs</h1>

  <div className="relative w-full h-[500px] bg-gray-100 rounded-2xl overflow-hidden">
    <img
      src={Blog1}
      alt="Blog 1"
      className="absolute inset-0 w-full h-full object-cover"
    />
  </div>




        <b><h3>SANDEEP WITH ISHA DEOL </h3></b>
 <p><span>by Admin </span> <span> Feb, 24, 2025 </span>

That's fantastic news! It must have been a special moment for Sandeep to be recognized with an award by ISHA DEOL . Can you share more about the award or what it was for? </p>
         </div>
    )
}