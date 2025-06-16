import React, { useState, useEffect } from 'react';
import CarCare from './images/Group1.jpg';
import HomeCare from './images/Property 1=home.jpg';
import PersonalCare from './images/Group3.jpg';

const slides = [
  {
    image: CarCare,
  },
  {
    image: HomeCare,
  },  
  {
    image: PersonalCare,
  },
];

export default function Slider() {
  const [current, setCurrent] = useState(0);
  const [touchStart, setTouchStart] = useState(null);
  const [touchEnd, setTouchEnd] = useState(null);

  const goToSlide = (idx) => setCurrent(idx);
  const nextSlide = () => setCurrent((prev) => (prev + 1) % slides.length);
  const prevSlide = () => setCurrent((prev) => (prev - 1 + slides.length) % slides.length);

  // Touch handlers for mobile swipe
  const handleTouchStart = (e) => {
    setTouchStart(e.targetTouches[0].clientX);
  };

  const handleTouchMove = (e) => {
    setTouchEnd(e.targetTouches[0].clientX);
  };

  const handleTouchEnd = () => {
    if (!touchStart || !touchEnd) return;
    const distance = touchStart - touchEnd;
    const isLeftSwipe = distance > 50;
    const isRightSwipe = distance < -50;
    if (isLeftSwipe) {
      nextSlide();
    }
    if (isRightSwipe) {
      prevSlide();
    }
    setTouchStart(null);
    setTouchEnd(null);
  };

  useEffect(() => {
    const interval = setInterval(() => {
      setCurrent((prev) => (prev + 1) % slides.length);
    }, 3000); // 3 seconds
    return () => clearInterval(interval);
  }, []);

  return (
    <div 
      className="relative w-full h-[25rem] sm:h-[30rem] md:h-[32rem] overflow-hidden rounded-none shadow-2xl bg-gradient-to-br from-white via-gray-50 to-teal-50"
      onTouchStart={handleTouchStart}
      onTouchMove={handleTouchMove}
      onTouchEnd={handleTouchEnd}
    >
      {/* Slides */}
      {slides.map((slide, idx) => (
        <div
          key={idx}
          className={`${idx === current ? 'block scale-100 opacity-100' : 'hidden scale-95 opacity-0'} absolute inset-0 transition-all duration-700 ease-in-out`}
        >
          <div className="relative w-full h-full flex items-center justify-center p-4 md:p-0">
            <div className="relative w-full h-full">
              <img 
                src={slide.image} 
                alt={slide.title} 
                className="w-full h-full object-contain md:object-cover object-center bg-white shadow-xl rounded-2xl transition-all duration-700" 
                loading="lazy"
              />
            </div>
            <button 
              onClick={prevSlide} 
              className="absolute left-2 md:left-6 top-1/2 -translate-y-1/2 bg-white/90 rounded-full p-2 md:p-4 shadow-lg hover:bg-teal-100 hover:scale-110 transition-all duration-300 z-50 border border-teal-200"
              aria-label="Previous slide"
            >
              <svg className="w-5 h-5 md:w-7 md:h-7 text-teal-800" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" d="M15 19l-7-7 7-7" /></svg>
            </button>
            <button 
              onClick={nextSlide} 
              className="absolute right-2 md:right-6 top-1/2 -translate-y-1/2 bg-white/90 rounded-full p-2 md:p-4 shadow-lg hover:bg-teal-100 hover:scale-110 transition-all duration-300 z-50 border border-teal-200"
              aria-label="Next slide"
            >
              <svg className="w-5 h-5 md:w-7 md:h-7 text-teal-800" fill="none" stroke="currentColor" strokeWidth="2" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" d="M9 5l7 7-7 7" /></svg>
            </button>
          </div>
        </div>
      ))}
      {/* Navigation Dots */}
      <div className="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 md:gap-4 z-20">
        {slides.map((_, idx) => (
          <button
            key={idx}
            onClick={() => goToSlide(idx)}
            className={`w-3 h-3 md:w-5 md:h-5 rounded-full border-2 border-teal-200 shadow-sm ${current === idx ? 'bg-white scale-110' : 'bg-[#2D0000] opacity-70'} transition-all duration-300`}
            aria-label={`Go to slide ${idx + 1}`}
          />
        ))}
      </div>
    </div>
  );
} 