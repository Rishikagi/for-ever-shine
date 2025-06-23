import './App.css'
import Navbar from './Navbar'
import Slider from './Slider'
import HomeSections from './HomeSections'
import Footer from './Footer'
import ChatBot from './components/ChatBot'
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import CarCare from './CarCare'
import HomeCare from './HomeCare'
import PersonalCare from './PersonalCare'
import AboutUs from './AboutUs'
import ComingSoon from './ComingSoon'
import ProductDetails from './ProductDetails'
import Privacy from './Privacy'
import Cart from './Cart'
import Account from './Account'
import ShipingPolicy from './ShipingPolicy'
import BlogOne from './BlogOne'
import BlogThree from './BlogThree'
import Login from './Login'
import SignUp from './SignUp'
import Wishlist from './Wishlist'
import Payment from './Payment'
import Address from './Address'

import SearchResults from './SearchResults'
import { CartProvider } from './context/CartContext'
import { SearchProvider } from './context/SearchContext'
import { WishlistProvider } from './context/WishlistContext'
import { UserProvider } from './context/UserContext'
import ErrorBoundary from './components/ErrorBoundary'
import ScrollToTop from './components/ScrollToTop'
import ScrollToTopButton from './components/ScrollToTopButton'

import ContactUs from './ContactUs';

import Returns from './Returns';

import FAQ from './FAQ';



const Terms = () => (
  <div className="max-w-4xl mx-auto px-4 py-12">
    <h1 className="text-3xl font-bold mb-8">Terms of Service</h1>
    <p className="text-gray-600">Terms of service content coming soon...</p>
  </div>
);

const Cookies = () => (
  <div className="max-w-4xl mx-auto px-4 py-12">
    <h1 className="text-3xl font-bold mb-8">Cookie Policy</h1>
    <p className="text-gray-600">Cookie policy content coming soon...</p>
  </div>
);


function App() {
  return (
    <UserProvider>
      <WishlistProvider>
        <CartProvider>
          <SearchProvider>
            <BrowserRouter>
              <ScrollToTop />
              <ScrollToTopButton />
              <ChatBot />
              <Routes>
                <Route path="/" element={
                  <>
                    <Navbar />
                    <Slider />
                    <HomeSections />
                    <Footer />
                  </>
                } />
               
                <Route path="/car-care" element={
                  <>
                    <Navbar />
                    <CarCare />
                    <Footer />
                  </>
                } />
                <Route path="/home-care" element={
                  <>
                    <Navbar />
                    <HomeCare />
                    <Footer />
                  </>
                } />
                <Route path="/personal-care" element={
                  <>
                    <Navbar />
                    <PersonalCare />
                    <Footer />
                  </>
                } />
                <Route path="/about-us" element={
                  <>
                    <Navbar />
                    <AboutUs />
                    <Footer />
                  </>
                } />
                <Route path="/Login" element={
                  <>
                    <Navbar />
                    <Login />
                    <Footer />
                  </>
                } />
                <Route path="/SignUp" element={
                  <>
                    <Navbar />
                    <SignUp />
                    <Footer />
                  </>
                } />
              <Route path="/product/:productId" element={
                  <>
                    <Navbar />
                    <ErrorBoundary>
                      <ProductDetails />
                    </ErrorBoundary>
                    <Footer />
                  </>
                } />
                <Route path="/cart" element={
                  <>
                    <Navbar />
                    <ErrorBoundary>
                      <Cart />
                    </ErrorBoundary>
                    <Footer />
                  </>
                } />
                <Route path="/account" element={
                  <>
                    <Navbar />
                    <Account />
                    <Footer />
                  </>
                } />
                <Route path="/Coming-Soon" element={
                  <>
                    <Navbar />
                    <ComingSoon />
                    <Footer />
                  </>
                } />
                <Route path="/wishlist" element={
                  <>
                    <Navbar />
                    <Wishlist />
                    <Footer />
                  </>
                } />
                <Route path="/search" element={
                  <>
                    <Navbar />
                    <SearchResults />
                    <Footer />
                  </>
                } />
                {/* Footer Links Routes */}
                <Route path="/contact" element={
                  <>
                    <Navbar />
                    <ContactUs />
                    <Footer />
                  </>
                } />
                <Route path="/Shiping-Policy" element={
                  <>
                    <Navbar />
                    <ShipingPolicy />
                    <Footer />
                  </>
                } />
                <Route path="/returns" element={
                  <>
                    <Navbar />
                    <Returns />
                    <Footer />
                  </>
                } />
                <Route path="/faq" element={
                  <>
                    <Navbar />
                    <FAQ />
                    <Footer />
                  </>
                } />
                <Route path="/privacy" element={
                  <>
                    <Navbar />
                    <Privacy />
                    <Footer />
                  </>
                } />
                <Route path="/terms" element={
                  <>
                    <Navbar />
                    <Terms />
                    <Footer />
                  </>
                } />
                 <Route path="/BlogOne" element={
                  <>
                    <Navbar />
                    <BlogOne/>
                    <Footer />
                  </>
                } />
                 <Route path="/BlogThree" element={
                  <>
                    <Navbar />
                    <BlogThree/>
                    <Footer />
                  </>
                } />
                <Route path="/cookies" element={
                  <>
                    <Navbar />
                    <Cookies />
                    <Footer />
                  </>
                  
                } />
                <Route path="/payment" element={
                  <>
                    <Navbar />
                    <Payment />
                    <Footer />
                  </>
                } />
                <Route path="/address" element={
                  <>
                    <Navbar />
                    <Address />
                    <Footer />
                  </>
                } />
              </Routes>
            </BrowserRouter>
          </SearchProvider>
        </CartProvider>
      </WishlistProvider>
    </UserProvider>
  )
}

export default App
