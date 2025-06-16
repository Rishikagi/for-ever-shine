import React, { useState, useRef, useEffect } from 'react';
import logo from './images/Logo.webp';
import { ShoppingCartIcon, HeartIcon, ShareIcon, UserIcon, BookmarkIcon, MagnifyingGlassIcon, XMarkIcon, Bars3Icon } from '@heroicons/react/24/outline';
import { Link, useNavigate } from 'react-router-dom';
import { useCart } from './context/CartContext';
import { useSearch } from './context/SearchContext';
import ComingSooon from "./ComingSoon";
import AdminLogin from './AdminLogin';

export default function Navbar() {
  const { getCartCount } = useCart();
  const { searchQuery, setSearchQuery, searchResults, handleSearch, recentSearches, clearRecentSearches, removeRecentSearch } = useSearch();
  const [isSearchOpen, setIsSearchOpen] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
  const [adminLoginVisible, setAdminLoginVisible] = useState(false);
  const [logoClickCount, setLogoClickCount] = useState(0);
  const searchRef = useRef(null);
  const navigate = useNavigate();

  const cartCount = getCartCount();
  const mobileMenuRef = useRef(null);

  // Close search and mobile menu when clicking outside
  useEffect(() => {
    function handleClickOutside(event) {
      if (
        searchRef.current &&
        !searchRef.current.contains(event.target)
      ) {
        setIsSearchOpen(false);
      }
      if (
        mobileMenuRef.current &&
        !mobileMenuRef.current.contains(event.target)
      ) {
        setIsMobileMenuOpen(false);
      }
    }

    document.addEventListener('mousedown', handleClickOutside);
    return () => {
      document.removeEventListener('mousedown', handleClickOutside);
    };
  }, []);

  // Reset logo click count after 3 seconds of inactivity
  useEffect(() => {
    if (logoClickCount === 0) return;
    const timer = setTimeout(() => setLogoClickCount(0), 3000);
    return () => clearTimeout(timer);
  }, [logoClickCount]);

  const handleLogoClick = () => {
    setLogoClickCount(prev => {
      const newCount = prev + 1;
      if (newCount === 1) {
        navigate('/');
      }
      if (newCount === 5) {
        setAdminLoginVisible(true);
        return 0;
      }
      return newCount;
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    handleSearch(searchQuery);
    navigate(`/search?q=${encodeURIComponent(searchQuery)}`);
    setIsSearchOpen(false);
  };

  const handleRecentSearch = (search) => {
    setSearchQuery(search);
    handleSearch(search);
    navigate(`/search?q=${encodeURIComponent(search)}`);
    setIsSearchOpen(false);
  };

  return (
    <>
      <nav className="w-full shadow-lg bg-gradient-to-b from-teal-900 to-teal-700/80 sticky top-0 z-50">
        {/* Top Banner */}
        <div className="bg-teal-900 text-white text-center py-2 text-lg font-semibold border-b border-teal-800 tracking-wide shadow-md animate-fadeInDown">
          <a href="https://forevershinein.com/" className="underline underline-offset-4 hover:text-yellow-300 transition-colors duration-200">Buy Any 3 Products @ FLAT ₹899 on Selected Products | Shop Now</a>
        </div>
        {/* Main Navbar */}
        <div className="relative flex items-center justify-between py-3 bg-white shadow-md px-4 md:px-20 rounded-b-2xl">
          {/* Mobile Menu Button */}
          <button 
            onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
            className="md:hidden flex items-center justify-center hover:text-teal-700 hover:bg-teal-200/60 rounded-full p-2 transition-all duration-200 shadow-sm"
          >
            <Bars3Icon className="w-6 h-6" />
          </button>

          {/* Logo */}
          <div onClick={handleLogoClick} className="flex items-center cursor-pointer">
            <img src={logo} alt="Logo" className="h-12 md:h-16 w-auto drop-shadow-lg hover:scale-105 transition-transform duration-300" />
          </div>

          {/* Desktop Nav Links */}
          <ul className="hidden md:flex absolute left-1/2 transform -translate-x-1/2 gap-10 items-center text-gray-800 text-lg font-semibold tracking-wide">
            
            <li className="hover:text-teal-700 hover:underline underline-offset-8 transition-all duration-200 cursor-pointer">
              <Link to="/car-care">Car care</Link>
            </li>
            <li className="hover:text-teal-700 hover:underline underline-offset-8 transition-all duration-200 cursor-pointer">
              <Link to="/home-care">Home care</Link>
            </li>
            <li className="hover:text-teal-700 hover:underline underline-offset-8 transition-all duration-200 cursor-pointer">
              <Link to="/personal-care" className="flex flex-col items-center">
                <span>Personal care</span>
                <span className="text-xs text-gray-400 mt-1">(Coming Soon)</span>
              </Link>
            </li>
            <li className="hover:text-teal-700 hover:underline underline-offset-8 transition-all duration-200 cursor-pointer">
              <Link to="/about-us">About us</Link>
            </li>
            
          </ul>

          {/* Mobile Menu */}
          {isMobileMenuOpen && (
             <div ref={mobileMenuRef} className="absolute top-full left-0 w-full bg-white shadow-lg md:hidden">
            <div className="absolute top-full left-0 w-full bg-white shadow-lg md:hidden ">
              <ul className="py-2">
                
                <li className="hover:bg-teal-50">
                  <Link to="/car-care" className="block px-4 py-2 text-gray-800 hover:text-teal-700" onClick={() => setIsMobileMenuOpen(false)}>Car care</Link>
                  
                </li>
                <li className="hover:bg-teal-50">
                  <Link to="/home-care" className="block px-4 py-2 text-gray-800 hover:text-teal-700" onClick={() => setIsMobileMenuOpen(false)}>Home care</Link>
                  
                </li>
                <li className="hover:bg-teal-50">
                  <Link to="/personal-care" className="block px-4 py-2 text-gray-800 hover:text-teal-700" onClick={() => setIsMobileMenuOpen(false)}>
                    Personal care
                    <span className="text-xs text-gray-400 ml-2">(Coming Soon)</span>
                  </Link>
                </li>
                <li className="hover:bg-teal-50">
                  <Link to="/about-us" className="block px-4 py-2 text-gray-800 hover:text-teal-700" onClick={() => setIsMobileMenuOpen(false)}>About us</Link>
                </li>
              </ul>
            </div></div>
          )}
         

          {/* Right Icons */}
          <div className="flex items-center gap-2 md:gap-3 bg-teal-100/80 py-2 rounded-full px-2 md:px-4 shadow-md">
            {/* Search Icon */}
            <div className="relative" ref={searchRef}>
              <button 
                onClick={() => setIsSearchOpen(!isSearchOpen)}
                className="flex items-center justify-center hover:text-teal-700 hover:bg-teal-200/60 rounded-full p-2 transition-all duration-200 shadow-sm"
              >
                <MagnifyingGlassIcon className="w-5 h-5 md:w-6 md:h-6 align-middle" />
              </button>
              {isSearchOpen && (
                <div className="fixed md:absolute inset-0 md:inset-auto md:right-0 md:top-12 w-full md:w-96 bg-white md:rounded-lg shadow-xl p-4 z-50">
                  <div className="flex items-center justify-between mb-4">
                    <h3 className="text-lg font-semibold text-gray-900">Search Products</h3>
                    <button
                      onClick={() => setIsSearchOpen(false)}
                      className="text-gray-500 hover:text-gray-700 p-2"
                    >
                      <XMarkIcon className="w-6 h-6" />
                    </button>
                  </div>
                  <form onSubmit={handleSubmit} className="mb-4">
                    <div className="relative">
                      <input
                        type="text"
                        value={searchQuery}
                        onChange={(e) => setSearchQuery(e.target.value)}
                        placeholder="Search products..."
                        className="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 text-base"
                        autoFocus
                      />
                      <button
                        type="submit"
                        className="absolute right-3 top-1/2 -translate-y-1/2 text-teal-600 hover:text-teal-700 p-1"
                      >
                        <MagnifyingGlassIcon className="w-5 h-5" />
                      </button>
                      {searchQuery && (
                        <button
                          type="button"
                          onClick={() => setSearchQuery('')}
                          className="absolute right-12 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 p-1"
                        >
                          <XMarkIcon className="w-5 h-5" />
                        </button>
                      )}
                    </div>
                  </form>

                  {/* Recent Searches */}
                  {recentSearches.length > 0 && (
                    <div className="mb-4">
                      <div className="flex justify-between items-center mb-2">
                        <h3 className="text-sm font-medium text-gray-700">Recent Searches</h3>
                        <button
                          onClick={clearRecentSearches}
                          className="text-sm text-teal-600 hover:text-teal-700"
                        >
                          Clear All
                        </button>
                      </div>
                      <div className="space-y-2 max-h-48 overflow-y-auto">
                        {recentSearches.map((search, index) => (
                          <div key={index} className="flex items-center justify-between group">
                            <button
                              onClick={() => handleRecentSearch(search)}
                              className="flex-1 text-left text-sm text-gray-600 hover:text-teal-600 py-2"
                            >
                              {search}
                            </button>
                            <button
                              onClick={() => removeRecentSearch(search)}
                              className="opacity-0 group-hover:opacity-100 text-gray-400 hover:text-gray-600 p-1"
                            >
                              <XMarkIcon className="w-4 h-4" />
                            </button>
                          </div>
                        ))}
                      </div>
                    </div>
                  )}

                  {/* Quick Results */}
                  {searchQuery && searchResults.length > 0 && (
                    <div className="max-h-[calc(100vh-300px)] overflow-y-auto">
                      <h3 className="text-sm font-medium text-gray-700 mb-2">Quick Results</h3>
                      <div className="space-y-2">
                        {searchResults.slice(0, 3).map((result) => (
                          <Link
                            key={result.id}
                            to={`/product/${result.id}`}
                            className="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg"
                            onClick={() => setIsSearchOpen(false)}
                          >
                            <img
                              src={result.image}
                              alt={result.name}
                              className="w-12 h-12 object-contain rounded-lg"
                            />
                            <div>
                              <p className="text-sm font-medium text-gray-900">{result.name}</p>
                              <p className="text-xs text-gray-500">{result.category}</p>
                            </div>
                          </Link>
                        ))}
                        {searchResults.length > 3 && (
                          <Link
                            to={`/search?q=${encodeURIComponent(searchQuery)}`}
                            className="block text-center text-sm text-teal-600 hover:text-teal-700 py-2 border-t border-gray-100"
                            onClick={() => setIsSearchOpen(false)}
                          >
                            View all {searchResults.length} results
                          </Link>
                        )}
                      </div>
                    </div>
                  )}
                </div>
              )}
            </div>

            {/* Rest of the icons */}
            <Link
              to="/account"
              className="flex items-center justify-center hover:text-teal-700 hover:bg-teal-200/60 rounded-full p-2 transition-all duration-200 shadow-sm"
            >
              <UserIcon className="w-5 h-5 md:w-6 md:h-6 align-middle" />
            </Link>

            

          <Link
            to="/wishlist"
            className="hidden md:flex items-center justify-center hover:text-teal-700 hover:bg-teal-200/60 rounded-full p-2 transition-all duration-200 shadow-sm"
          >
            <BookmarkIcon className="w-5 h-5 md:w-6 md:h-6 align-middle" />
          </Link>



            <button
              onClick={() => {
                if (navigator.share) {
                  navigator.share({
                    title: 'Forever Shine',
                    text: 'Check out Forever Shine - Your one-stop shop for car care products!',
                    url: window.location.href,
                  });
                } else {
                  navigator.clipboard.writeText(window.location.href);
                  alert('Link copied to clipboard!');
                }
              }}
              className="hidden md:flex items-center justify-center hover:text-teal-700 hover:bg-teal-200/60 rounded-full p-2 transition-all duration-200 shadow-sm"
            >
              <ShareIcon className="w-5 h-5 md:w-6 md:h-6 align-middle" />
            </button>

            <Link to="/cart" className="flex items-center justify-center hover:text-teal-700 hover:bg-teal-200/60 rounded-full p-2 transition-all duration-200 shadow-sm bg-transparent relative">
              <ShoppingCartIcon className="w-5 h-5 md:w-6 md:h-6 align-middle" />
              {cartCount > 0 && (
                <span className="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                  {cartCount}
                </span>
              )}
            </Link>
          </div>
        </div>
      </nav>
      {adminLoginVisible && <AdminLogin onClose={() => setAdminLoginVisible(false)} />}
    </>
  );
}
