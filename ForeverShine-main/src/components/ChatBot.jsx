import React, { useState, useRef, useEffect } from 'react';
import { ChatBubbleLeftRightIcon, XMarkIcon, PaperAirplaneIcon } from '@heroicons/react/24/outline';

const ChatBot = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [messages, setMessages] = useState([
    {
      type: 'bot',
      content: 'Hello! 👋 How can I help you today?'
    }
  ]);
  const [inputMessage, setInputMessage] = useState('');
  const messagesEndRef = useRef(null);

  const scrollToBottom = () => {
    messagesEndRef.current?.scrollIntoView({ behavior: "smooth" });
  };

  useEffect(() => {
    scrollToBottom();
  }, [messages]);

  const handleSendMessage = (e) => {
    e.preventDefault();
    if (!inputMessage.trim()) return;

    // Add user message
    setMessages(prev => [...prev, { type: 'user', content: inputMessage }]);
    
    // Simulate bot response
    setTimeout(() => {
      const botResponse = getBotResponse(inputMessage);
      setMessages(prev => [...prev, { type: 'bot', content: botResponse }]);
    }, 1000);

    setInputMessage('');
  };

  const getBotResponse = (message) => {
    const lowerMessage = message.toLowerCase();
    
    // Greetings
    if (lowerMessage.includes('hello') || lowerMessage.includes('hi') || lowerMessage.includes('hey')) {
      return 'Hello! 👋 How can I assist you today?';
    }
    
    // Products and Categories
    if (lowerMessage.includes('product') || lowerMessage.includes('price')) {
      return 'We offer various car care, home care, and personal care products. You can check our categories section for detailed information.';
    }
    
    if (lowerMessage.includes('car care') || lowerMessage.includes('car products')) {
      return 'Our car care products include Car Perfume (₹225), Tyre Polish (₹90), Car Wash Shampoo (₹140), and Dashboard Polish (₹90). Would you like to know more about any specific product?';
    }
    
    if (lowerMessage.includes('home care') || lowerMessage.includes('home products')) {
      return 'We offer Room Fresheners (₹90) and other home care products. Would you like to know more about our home care range?';
    }
    
    if (lowerMessage.includes('personal care')) {
      return 'Our personal care products are coming soon! Stay tuned for our exciting new range.';
    }

    // Shipping and Delivery
    if (lowerMessage.includes('shipping') || lowerMessage.includes('delivery')) {
      return 'We offer free shipping on all US orders or orders above $200. For more details, please check our shipping policy.';
    }
    
    if (lowerMessage.includes('delivery time') || lowerMessage.includes('how long')) {
      return 'Standard delivery takes 3-5 business days. Express delivery (1-2 days) is available at an additional cost.';
    }
    
    if (lowerMessage.includes('track') || lowerMessage.includes('tracking')) {
      return 'You can track your order by logging into your account or using the tracking number provided in your shipping confirmation email.';
    }

    // Returns and Refunds
    if (lowerMessage.includes('return') || lowerMessage.includes('refund')) {
      return 'You can return products within 30 days for an exchange. Please check our returns & refunds policy for more information.';
    }
    
    if (lowerMessage.includes('damaged') || lowerMessage.includes('broken')) {
      return 'If you receive a damaged product, please take photos and contact our customer service within 48 hours of delivery. We\'ll arrange a replacement or refund.';
    }

    // Contact and Support
    if (lowerMessage.includes('contact') || lowerMessage.includes('help')) {
      return 'You can reach us at +91 8387941041 or email us at forevershinein@gmail.com. Our customer service team is available 24/7.';
    }
    
    if (lowerMessage.includes('email') || lowerMessage.includes('mail')) {
      return 'You can email us at forevershinein@gmail.com. We typically respond within 24 hours.';
    }
    
    if (lowerMessage.includes('phone') || lowerMessage.includes('call')) {
      return 'You can call us at +91 8387941041. Our customer service team is available 24/7.';
    }

    // Payment and Orders
    if (lowerMessage.includes('payment') || lowerMessage.includes('pay')) {
      return 'We accept all major credit/debit cards, UPI, and net banking. All payments are secure and encrypted.';
    }
    
    if (lowerMessage.includes('order') || lowerMessage.includes('place order')) {
      return 'To place an order, simply add items to your cart and proceed to checkout. You\'ll need to create an account or login to complete your purchase.';
    }
    
    if (lowerMessage.includes('discount') || lowerMessage.includes('offer') || lowerMessage.includes('coupon')) {
      return 'We currently have a special offer: Buy Any 3 Products @ FLAT ₹899 on Selected Products. Check our homepage for more details!';
    }

    // About the Company
    if (lowerMessage.includes('about') || lowerMessage.includes('company')) {
      return 'Forever Shine is a leading provider of car care, home care, and personal care products. We\'re committed to quality and customer satisfaction.';
    }
    
    if (lowerMessage.includes('location') || lowerMessage.includes('address')) {
      return 'Our office is located at D-107 Budh Vihar, Alwar, Rajasthan - 301001.';
    }

    // Default response
    return "I'm not sure about that. Please contact our customer service at +91 8387941041 or email us at forevershinein@gmail.com for more specific information.";
  };

  return (
    <div className="fixed bottom-4 right-4 z-50">
      {/* Chat Button */}
      {!isOpen && (
        <button
          onClick={() => setIsOpen(true)}
          className="bg-teal-600 hover:bg-teal-700 text-white rounded-full p-4 shadow-lg transition-all duration-300 hover:scale-110"
        >
          <ChatBubbleLeftRightIcon className="w-6 h-6" />
        </button>
      )}

      {/* Chat Window */}
      {isOpen && (
        <div className="bg-white rounded-lg shadow-xl w-80 sm:w-96 h-[500px] flex flex-col">
          {/* Chat Header */}
          <div className="bg-teal-600 text-white p-4 rounded-t-lg flex justify-between items-center">
            <h3 className="font-semibold">Chat with us</h3>
            <button
              onClick={() => setIsOpen(false)}
              className="hover:bg-teal-700 rounded-full p-1 transition-colors"
            >
              <XMarkIcon className="w-5 h-5" />
            </button>
          </div>

          {/* Chat Messages */}
          <div className="flex-1 overflow-y-auto p-4 space-y-4">
            {messages.map((message, index) => (
              <div
                key={index}
                className={`flex ${message.type === 'user' ? 'justify-end' : 'justify-start'}`}
              >
                <div
                  className={`max-w-[80%] rounded-lg p-3 ${
                    message.type === 'user'
                      ? 'bg-teal-600 text-white'
                      : 'bg-gray-100 text-gray-800'
                  }`}
                >
                  {message.content}
                </div>
              </div>
            ))}
            <div ref={messagesEndRef} />
          </div>

          {/* Chat Input */}
          <form onSubmit={handleSendMessage} className="p-4 border-t">
            <div className="flex space-x-2">
              <input
                type="text"
                value={inputMessage}
                onChange={(e) => setInputMessage(e.target.value)}
                placeholder="Type your message..."
                className="flex-1 border rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500"
              />
              <button
                type="submit"
                className="bg-teal-600 text-white rounded-full p-2 hover:bg-teal-700 transition-colors"
              >
                <PaperAirplaneIcon className="w-5 h-5" />
              </button>
            </div>
          </form>
        </div>
      )}
    </div>
  );
};

export default ChatBot; 