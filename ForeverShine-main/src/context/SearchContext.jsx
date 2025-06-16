import React, { createContext, useContext, useState, useEffect } from 'react';
import CarPerfume from '../images/CarPerfume.webp';
import TyrePolish from '../images/TyrePolish.webp';
import CarwashShampoo from '../images/CarWashShampoo.webp';
import DashboardPolish from '../images/DashBoardPolish.webp';
import RoomFreshener from '../images/RoomFreshner.webp';

const SearchContext = createContext();

export function SearchProvider({ children }) {
  const [searchQuery, setSearchQuery] = useState('');
  const [searchResults, setSearchResults] = useState([]);
  const [isSearching, setIsSearching] = useState(false);
  const [recentSearches, setRecentSearches] = useState(() => {
    const saved = localStorage.getItem('recentSearches');
    return saved ? JSON.parse(saved) : [];
  });

  // Save recent searches to localStorage
  useEffect(() => {
    localStorage.setItem('recentSearches', JSON.stringify(recentSearches));
  }, [recentSearches]);

  // Sample product data - replace with your actual product data
  const products = [
    {
      id: 'car-perfume',
      name: 'Car Perfume',
      category: 'CAR CARE',
      price: '₹ 225.00',
      image: CarPerfume
    },
    {
      id: 'tyre-polish',
      name: 'Tyre Polish',
      category: 'CAR CARE',
      price: '₹ 90.00',
      image: TyrePolish
    },
    {
      id: 'car-wash-shampoo',
      name: 'Car Wash Shampoo',
      category: 'CAR CARE',
      price: '₹ 140.00',
      image: CarwashShampoo
    },
    {
      id: 'dash-board-polish',
      name: 'Dash-Board Polish',
      category: 'CAR CARE',
      price: '₹ 90.00',
      image: DashboardPolish
    },
    {
      id: 'room-freshener',
      name: 'Room Freshener',
      category: 'HOME CARE',
      price: '₹ 90.00',
      image: RoomFreshener
    }
  ];

  const searchProducts = (query) => {
    if (!query.trim()) {
      setSearchResults([]);
      return;
    }

    const results = products.filter(product => 
      product.name.toLowerCase().includes(query.toLowerCase()) ||
      product.category.toLowerCase().includes(query.toLowerCase())
    );

    setSearchResults(results);
  };

  const handleSearch = (query) => {
    if (!query.trim()) return;

    setIsSearching(true);
    searchProducts(query);
    
    // Add to recent searches if not already present
    if (!recentSearches.includes(query)) {
      setRecentSearches(prev => [query, ...prev].slice(0, 5));
    }

    setIsSearching(false);
  };

  const clearRecentSearches = () => {
    setRecentSearches([]);
  };

  const removeRecentSearch = (search) => {
    setRecentSearches(prev => prev.filter(s => s !== search));
  };

  return (
    <SearchContext.Provider
      value={{
        searchQuery,
        setSearchQuery,
        searchResults,
        isSearching,
        recentSearches,
        handleSearch,
        clearRecentSearches,
        removeRecentSearch,
        searchProducts
      }}
    >
      {children}
    </SearchContext.Provider>
  );
}

export function useSearch() {
  const context = useContext(SearchContext);
  if (!context) {
    throw new Error('useSearch must be used within a SearchProvider');
  }
  return context;
} 