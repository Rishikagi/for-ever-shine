<?php

use Illuminate\Support\Facades\Route;

use Laravel\Passport\Passport;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// shell_exec('php ../artisan passport:install');

// die;

Route::get('welcome', function () {
    return view('welcome');
});
Route::post('/add-card', 'SquareController@addCard')->name('add-card');


	Route::any('/', "HomeController@index");
	Route::post('country-set-landing-page-ajax', "HomeController@index");
	Route::match(['get','post'],'contact-us', "HomeController@contactUs")->name('contact-us');
	Route::get('searchproduct-byname', "HomeController@searchproduct")->name('searchproduct-byname');
	Route::get('searchproduct-data', "HomeController@searchproductData")->name('searchproduct-data');
	Route::get('about', "HomeController@aboutUs")->name('about');
	//Route::get('country-select', "HomeController@country-select")->name('our-artisan');
	
	Route::get('product-detail/{slug}', "ProductController@detail");
	Route::post('product-detail-model', "ProductController@productDetailModel");
	Route::post('get-product-detail-variant-slug', "ProductController@getVariantSlug")->name('get-product-detail-variant-slug');
	Route::post('check-pincode', "ProductController@checkPincode")->name('check-pincode');
	
	Route::get('login', "LoginController@login")->name('login');
	Route::post('login-with-email', "LoginController@loginWithEmail");
	Route::post('login-with-mobile', "LoginController@loginWithMobile");

	Route::post('getotp', "LoginController@getOtp");
	
	Route::get('register', "HomeController@register");
	Route::match(['post','get'],'wholesale-register', "LoginController@registerWholesale");
	Route::post('register-by-email', "LoginController@registerByEmail")->name('register-by-email');
	Route::post('forgot-password', "LoginController@forgotPassword")->name('forgot-password');
	Route::get('reset-password/{token}/{email}', "LoginController@resetPassword");
	Route::post('reset-password', "LoginController@changeresetPassword")->name('reset-password');
	Route::post('register-by-mobile', "LoginController@registerByMobile")->name('register-by-mobile');

	Route::post('verify-account', "LoginController@verifyAccount")->name('verify-account');

	Route::match(['post','get'],'product-listing/{categoryslug}', "ProductController@productListing")->name('product-listing'); 
	Route::match(['post','get'],'product-listing', "ProductController@productListing")->name('product-listing'); 
	Route::match(['get','post'],'deals-ofthe-week', "ProductController@delasOfTheWeek")->name('deals-ofthe-week');

	Route::get('forgot-password', "HomeController@forgotpassword");
	
	Route::get('auth/google', 'LoginController@redirectToGoogle');
	Route::get('auth/google/callback', 'LoginController@handleGoogleCallback');
	Route::get('auth/facebook', 'LoginController@redirectToFacebook');
	Route::get('auth/facebook/callback', 'LoginController@handleFacebookCallback');

	Route::get('profile', "HomeController@profile");
	Route::get('order-track', "HomeController@ordertrack");

	Route::post('wishlist-product', "ProductController@productWishlist");
	Route::post('add-to-cart', "ProductController@addTocart")->name('add-to-cart');
	Route::get('delete-wishlist-product/{id}', "ProductController@deleteWishlistProduct");
	Route::get('get-total-cart', "ProductController@getTotalCart");
	
	Route::post('update-cart', "ProductController@updateCart");
	Route::get('delete-cart', "ProductController@deleteCart");
	Route::get('cart-price-details', "ProductController@getCartPriceDetails")->name('cart-price-details');
	Route::get('get-cart-saved-address', "ProductController@getSavedAddress")->name('get-cart-saved-address');
	Route::get('check-coupon-code', "ProductController@checkCouponCode")->name('check-coupon-code');
	Route::get('check-shipping-charge', "ProductController@checkShippingCharge")->name('check-shipping-charge');

	
	Route::get('get-state', "HomeController@getState");
	Route::get('get-city', "HomeController@getCity");
	
	Route::get('term-condition', "HomeController@termsCondition");
	Route::get('privacy-policy', "HomeController@privacyPolicy");
	Route::get('about-us', "HomeController@aboutUs");
	Route::get('return-refund-policy', "HomeController@returnRefundPolicy");
	Route::get('cancellation-policy', "HomeController@cancellationPolicy");
	Route::get('shipping-policy', "HomeController@shippingPolicy");
	Route::get('track-order', "HomeController@trackOrder");
	Route::any('track-now', "HomeController@userTrackOrder")->name('track-now');
	Route::post('ondemand-enquiry', "ProductController@ondemandEnquiry")->name('ondemand-enquiry');
	Route::post('product-customizations', "ProductController@productCustomizations")->name('product-customizations');
	Route::post('notify-product', "ProductController@notifyProduct")->name('notify-product');
	Route::get('blogs', "HomeController@blogs")->name('blogs');
	Route::get('blog/{slug}', "HomeController@getSingleBlog")->name('single.blog');

	Route::post('subscribeNewsletter', "HomeController@subscribeNewsletter")->name('subscribe');
	Route::match(['get','post'],'guest-checkout', "ProductController@checkout");

	Route::group(['middleware'=>'Userauth'],function(){
		Route::get('myprofile', "ProfileController@profile");
		Route::post('add-address', "ProfileController@addAddress");
		Route::post('update-profile', "ProfileController@updateProfile");
		Route::post('update-password', "ProfileController@updatePassword");
		Route::get('my-orders', "ProfileController@myOrders");
		Route::get('referral', "ProfileController@Referral");
		Route::get('order-invoice/{num}', "ProfileController@orderInvoice");
		Route::get('my-address-book', "ProfileController@myAddressBook");
		Route::get('my-wishlists','ProfileController@myWishlist');
		Route::get('get-profile-saved-address', "ProfileController@getSavedAddress")->name('get-profile-saved-address');
		Route::get('remove-address/{address_id}', "ProfileController@removeAddress");
		Route::get('get-update-address-modal', "ProfileController@updateAddress");
		Route::get('logout', "ProfileController@logout");
		Route::get('cart', "ProductController@cart");
		Route::view('dashboard', "profile.dashboard");
		Route::match(['get','post'],'checkout','ProductController@checkout');
		Route::match(['post'],'get-shipping-option-using-address','ProductController@getShippingOptionUsingAddressId');
		Route::match(['post'],'product-review','ProductController@productReview');
	});

	Route::get('cart', "ProductController@cart");
	Route::post('stripe', 'ProductController@stripePost')->name('stripe.post');

	Route::get('order-placed/{orderid}','ProductController@orderPlaced');
	Route::get('order-initiate/{orderid}','ProductController@stripePaymentGateway');
	Route::get('fail-order/{orderid}', "ProductController@failOrder");
	
	Route::get('cancel-payment', 'ProductController@paymentCancel')->name('cancel.payment'); 
	Route::get('payment-success', 'ProductController@paymentSuccess')->name('success.payment');

	Route::post('/payment/status', 'ProductController@paymentCallback')->name('status');

	//admin URLS  
	Route::get('/admin',function(){
		return redirect('admin/login');
	});
	
	Route::get('admin/login', 'Auth\LoginController@showLoginForm');
	Route::post('admin/login', 'Auth\LoginController@login')->name('admin.login'); 
		
	Route::group(['middleware' => ['auth']], function() {
		Route::resource('roles', 'RoleController');
	});

	Route::group(['prefix'=>'admin','as'=>'admin','middleware'=>['auth','checkadminurl','adminrole'],'as'=>'admin.'],function() {

		Route::match(['get','post'],'/change-password', 'Admin\AdminController@changePassword')->name('changepassword');
		Route::get('dashboard', 'Admin\DashboardController@index');
		Route::post('logout', 'Auth\LoginController@logout')->name('logout');
		
		//subadmin
		Route::group(['prefix'=>'subadmin'],function() {
			Route::match(['get','post'],'add', 'Admin\UserController@addSubAdmin')->name('subadmin.add');
			Route::get('/list', 'Admin\UserController@subadminList');
			Route::get('update/{id}','Admin\UserController@updateSubAdmin');
			Route::match(['get','post'],'assign-wholesalers/{id}','Admin\UserController@assignWholesalers')->name('subadmin.assign-wholesalers');
			Route::get('delete/{id}','Admin\UserController@deleteSubAdmin');
			Route::post('change-status','Admin\UserController@changeStatus')->name('subadmin.changestatus');
		});

		// slider list
		Route::group(['prefix'=>'slider'],function() {
			Route::match(['get','post'],'add', 'Admin\SliderController@add')->name('slider.add');
			Route::get('list', 'Admin\SliderController@sliderList');
			Route::post('change-status','Admin\SliderController@changeStatus')->name('slider.changestatus');
			Route::get('update/{id}','Admin\SliderController@updateSlider');
			Route::get('delete/{id}','Admin\SliderController@deleteSlider');
		});

		

		// staff list
		Route::group(['prefix'=>'staff'],function() {
			Route::match(['get','post'],'add', 'Admin\StaffController@add')->name('staff.add');
			Route::get('list', 'Admin\StaffController@List');
			Route::post('change-status','Admin\StaffController@changeStatus')->name('staff.changestatus');
			Route::get('update/{id}','Admin\StaffController@update');
			Route::get('delete/{id}','Admin\StaffController@delete');
		});

		//blog category
		Route::group(['prefix'=>'blog'],function() {
			Route::match(['get','post'],'category/add','Admin\BlogCategoryController@add')->name('category.add');
			Route::get('category/list', 'Admin\BlogCategoryController@categoryList')->name('category.list');
			Route::get('category/update/{id}','Admin\BlogCategoryController@categoryUpdate')->name('category.update');
			Route::get('category/delete/{id}','Admin\BlogCategoryController@categoryDelete')->name('category.delete');
			Route::post('category/change-status','Admin\BlogCategoryController@changeStatus')->name('blog.category.changestatus');

			Route::match(['get','post'],'add','Admin\BlogController@add')->name('blog.add');
			Route::get('list', 'Admin\BlogController@blogList')->name('blog.list');
			Route::get('update/{id}','Admin\BlogController@blogUpdate')->name('blog.update');
			Route::get('delete/{id}','Admin\BlogController@blogDelete')->name('blog.delete');
			Route::post('change-status','Admin\BlogController@blogStatus')->name('blog.changestatus');

		});
		
		//category
		Route::group(['prefix'=>'catalog'],function() {
			
			Route::group(['prefix'=>'category'],function() {
				Route::match(['get','post'],'add', 'Admin\CategoryController@add')->name('category.addcategory');
				Route::get('/list', 'Admin\CategoryController@categoryList');
				Route::get('update/{id}','Admin\CategoryController@updateCategory');
				Route::get('delete/{id}','Admin\CategoryController@deleteCategory');
				Route::post('change-status','Admin\CategoryController@changeStatus')->name('category.changestatus');
				Route::post('select-topcategory','Admin\CategoryController@selectTopCategory')->name('category.selectyopcategory');
			});
			
			Route::group(['prefix'=>'product'],function() {
				Route::match(['get','post'],'add', 'Admin\ProductController@add')->name('product.addproduct');
				Route::match(['get','post'],'list', 'Admin\ProductController@productList')->name('product.filter');
				Route::get('update/{id}','Admin\ProductController@updateProduct');
				Route::get('delete/{id}','Admin\ProductController@deleteProduct');
				Route::post('change-status','Admin\ProductController@changeStatus')->name('product.changestatus');
				Route::post('topselling-status','Admin\ProductController@topSellingStatus')->name('product.topsellingstatus');
				Route::post('dealsoftheday','Admin\ProductController@dealsofTheDay')->name('product.dealsoftheday');
				Route::post('dealsoftheweek','Admin\ProductController@dealsofTheWeek')->name('product.dealsoftheweek');
				
				Route::match(['get','post'],'add-variant-product/{any}', 'Admin\ProductController@addVariantProduct')->name('product.addvariant');
				Route::get('variant-productlist/{id}', 'Admin\ProductController@variantProductList');
				Route::get('update-variant-product/{pparent_id}/{variant_id}', 'Admin\ProductController@updateVariantProduct');
				Route::get('delete-variantproduct/{id}','Admin\ProductController@deleteVariantProduct');
				Route::post('variantproduct-change-status','Admin\ProductController@changeVariantProductStatus')->name('product.variantproduct.changestatus');
			});

			Route::group(['prefix'=>'variant-attribute'],function() {
				Route::match(['get','post'],'add', 'Admin\ProductController@addVariantAttribute');
				Route::get('list', 'Admin\ProductController@attributeList');
				Route::get('update-variant-attribute/{id}','Admin\ProductController@updateVariantAttribute');
				Route::get('delete/{id}','Admin\ProductController@deleteVariantAttribute');
				Route::post('multiple-add','Admin\ProductController@addVariantAttributeMultiple');
			});
			
			
			Route::group(['prefix'=>'variant'],function() {
				Route::match(['get','post'],'add', 'Admin\ProductController@addVariant');
				Route::get('list', 'Admin\ProductController@VariantList');
				Route::get('update/{id}','Admin\ProductController@updateVariant');
				Route::get('delete/{id}','Admin\ProductController@deleteVariant');
				Route::post('status','Admin\ProductController@statusVariant')->name('status.variant');
			});
			
			Route::group(['prefix'=>'coupon'],function() {
				Route::match(['get','post'],'add', 'Admin\CouponController@add')->name('coupon.add');
				Route::get('list', 'Admin\CouponController@couponList');
				Route::get('update/{id}','Admin\CouponController@updateCoupon');
				Route::get('delete/{id}','Admin\CouponController@deleteCoupon');
				Route::post('change-status','Admin\CouponController@changeStatus')->name('coupon.changestatus');
				Route::post('coupon-ge-currency-value','Admin\CouponController@couponGetCurrencyValue')->name('coupon.get.currency.value');
				
				Route::match(['get','post'],'business-add', 'Admin\CouponController@businessAdd')->name('business.coupon.add');
				Route::get('business-list', 'Admin\CouponController@businessCouponList');
				Route::get('business-update/{id}','Admin\CouponController@businessUpdateCoupon');
				Route::get('business-delete/{id}','Admin\CouponController@businessDeleteCoupon');
				Route::post('business-change-status','Admin\CouponController@businessStatus')->name('coupon.business.changestatus');
			});
			
			Route::group(['prefix'=>'product-review'],function() {
				Route::match(['get','post'],'add', 'Admin\ProductReviewController@add')->name('review.add');
				Route::get('list', 'Admin\ProductReviewController@List');
				Route::get('update/{id}','Admin\ProductReviewController@Update');
				Route::get('delete/{id}','Admin\ProductReviewController@Delete');
				Route::post('change-status','Admin\ProductReviewController@Status')->name('review.status');
			});

			
		});
		
		
		//customers
		Route::group(['prefix'=>'user'],function() {
			Route::get('/list/{role}', 'Admin\UserController@userList');
			Route::post('block-user','Admin\UserController@blockUser')->name('user.block');
			Route::get('update/{id}','Admin\UserController@updateUser');
			Route::post('update-user','Admin\UserController@updateUserEnd');
			Route::get('address-book/{id}','Admin\UserController@addressBookList');
			Route::get('delete-address/{id}','Admin\UserController@deleteAddress');
			Route::post('add-address','Admin\UserController@addAddress');
			Route::get('update-address/{userid}/{id}','Admin\UserController@updateAddress');
			Route::post('getstates-bycountryid','Admin\UserController@getStateByCountryId')->name('getstates-bycountryid');
			Route::post('getcity-bystateid','Admin\UserController@getCityByStateId')->name('getcity-bystateid');
			Route::get('view-order/{id}','Admin\UserController@viewOrder');
		});
		
		// sales list
		Route::group(['prefix'=>'sales'],function() {
			Route::get('list/{type}', 'Admin\SalesController@salesList');
			Route::post('getsaledetail','Admin\SalesController@getSalesDetail');
			Route::post('update-orderstatus','Admin\SalesController@updateOrderStatus');
			Route::get('download-packaging-slip/{no}','Admin\SalesController@downloadPackagingSlip');
			Route::get('order-invoice/{no}','Admin\SalesController@orderInvoice');
			Route::get('ondemand-enquiry','Admin\SalesController@ondemandEnquiry');
			Route::post('orderready','Admin\SalesController@orderReady')->name('sales.orderready');
			Route::get('product-query','Admin\SalesController@productQuery');
			Route::get('product-customizations','Admin\SalesController@productCustomizations');
			Route::get('commission','Admin\SalesController@getCommission');
			Route::get('commission-history/{id}','Admin\SalesController@getCommissionHistory');
			
			//mannual order
			Route::match(['get','post'],'mannual-orders/create-order','Admin\SalesController@createMannualOrder')->name('sales.createmanualorder');
			Route::get('mannual-orders/orders-list','Admin\SalesController@mannualOrdersList');
			Route::post('mannual-getsaledetail','Admin\SalesController@getMannualSalesDetail');
			Route::post('change-order-status','Admin\SalesController@orderReady')->name('sales.change_orderstatus');
			Route::get('mannual-orders/order-invoice/{id}','Admin\SalesController@mannualOrderInvoice');
		});
		
		Route::group(['prefix'=>'testimonial'],function() {
			Route::match(['get','post'],'add', 'Admin\TestimonialController@add')->name('testimonial.add');
			Route::get('/list', 'Admin\TestimonialController@testimonialList');
			Route::get('update/{id}','Admin\TestimonialController@updateTestimonial');
			Route::get('delete/{id}','Admin\TestimonialController@deleteTestimonial');
			Route::post('change-status','Admin\TestimonialController@changeStatus')->name('testimonial.changestatus');
		});
		
		Route::group(['prefix'=>'artisan'],function() {
			Route::match(['get','post'],'add', 'Admin\ArtisanController@add')->name('artisan.add');
			Route::get('/list', 'Admin\ArtisanController@List');
			Route::get('update/{id}','Admin\ArtisanController@update');
			Route::get('delete/{id}','Admin\ArtisanController@delete');
			Route::post('change-status','Admin\ArtisanController@changeStatus')->name('artisan.changestatus');
		});

		Route::get('/transaction-history', 'Admin\TransactionController@index');
		
		// information list
		Route::group(['prefix'=>'information'],function() {
			Route::get('term-and-condition', 'Admin\InformationController@termCondition');
			Route::get('privacy-policy', 'Admin\InformationController@privacyPolicy');
			Route::get('about-us', 'Admin\InformationController@aboutUs');
			Route::get('return-and-refund-policy', 'Admin\InformationController@returnPolicy');
			Route::get('shipping-policy', 'Admin\InformationController@shippingPolicy');
			Route::get('cancellation-policy', 'Admin\InformationController@cancellationPolicy');
			Route::get('top-header-offer', 'Admin\InformationController@topHeaderOffer');
			Route::post('update','Admin\InformationController@UpdateDetail')->name('information.update');
			Route::post('offer-update','Admin\InformationController@offerUpdate')->name('information.offer-update');
		});

		Route::group(['prefix'=>'offer'],function() {
			Route::get('add', 'Admin\OfferShowController@Add');
			Route::post('update','Admin\OfferShowController@UpdateDetail')->name('offer.update');
		});

		// seo
		Route::group(['prefix'=>'seo'],function() {
			Route::match(['get','post'],'home-page', 'Admin\SeoController@homePage');
		});

		Route::group(['prefix'=>'notification'],function() {
			Route::match(['get','post'],'send', 'Admin\UserController@sendNotification')->name('notification.send');
			Route::get('list', 'Admin\UserController@listNotification');
		});

		
		Route::group(['prefix'=>'newsletter'],function() {
			Route::match(['get','post'],'send', 'Admin\NewsletterController@sendNewsLetter')->name('newsletter.send');
			
		});

		// settings
		Route::group(['prefix'=>'settings'],function() {
			Route::match(['get','post'],'update-price', 'Admin\SettingController@updatePrice');
			Route::match(['get','post'],'currency', 'Admin\SettingController@updateCurrency');
		});
		
	});

	Route::any('delhivery-webhook',function(){
		echo "Done";
	});

	
	