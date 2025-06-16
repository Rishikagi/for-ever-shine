import React, { useEffect } from 'react';
import { useSearchParams } from 'react-router-dom';
import { useSearch } from './context/SearchContext';
import { Link } from 'react-router-dom';
import { MagnifyingGlassIcon } from '@heroicons/react/24/outline';

export default function SearchResults() {
  const [searchParams] = useSearchParams();
  const query = searchParams.get('q');
  const { searchResults, searchProducts } = useSearch();

  useEffect(() => {
    if (query) {
      searchProducts(query);
    }
  }, [query, searchProducts]);

  return (
    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <div className="mb-8">
        <h1 className="text-3xl font-bold text-gray-900 mb-2">
          Search Results for "{query}"
        </h1>
        <p className="text-gray-600">
          Found {searchResults.length} {searchResults.length === 1 ? 'result' : 'results'}
        </p>
      </div>

      {searchResults.length > 0 ? (
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          {searchResults.map((product) => (
            <Link
              key={product.id}
              to={`/product/${product.id}`}
              className="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
            >
              <div className="aspect-w-1 aspect-h-1 w-full">
                <img
                  src={product.image}
                  alt={product.name}
                  className="w-full h-48 object-contain p-4"
                />
              </div>
              <div className="p-4">
                <h3 className="text-lg font-semibold text-gray-900 mb-1">
                  {product.name}
                </h3>
                <p className="text-sm text-gray-500 mb-2">{product.category}</p>
                <p className="text-lg font-bold text-teal-700">{product.price}</p>
              </div>
            </Link>
          ))}
        </div>
      ) : (
        <div className="text-center py-12">
          <MagnifyingGlassIcon className="w-16 h-16 text-gray-400 mx-auto mb-4" />
          <h2 className="text-2xl font-semibold text-gray-900 mb-2">
            No results found
          </h2>
          <p className="text-gray-600 mb-6">
            Try different keywords or check your spelling
          </p>
          <Link
            to="/"
            className="inline-block bg-teal-600 text-white px-6 py-3 rounded-full hover:bg-teal-700 transition-colors"
          >
            Return to Home
          </Link>
        </div>
      )}
    </div>
  );
} 