<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PreLoginController;
use App\Http\Controllers\API\PostLoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'auth:api'
  ], function() {
    Route::post("change-password","API\PostLoginController@changePassword");
    Route::get("user-profile","API\PostLoginController@userProfile");
	Route::post("add-address","API\PostLoginController@addAddress");
	Route::post("update-profile","API\PostLoginController@updateProfile");
	Route::post("delete-address","API\PostLoginController@deleteAddress");
	Route::get("get-address-by-id","API\PostLoginController@getAddressById");
	Route::get("address-list","API\PostLoginController@addressList");
	Route::post("add-cart","API\PostLoginController@addToCart");
	Route::post("delete-cart","API\PostLoginController@deleteCart");
	Route::get("delete-complete-cart","API\PostLoginController@deleteCompleteCart");
	Route::get("cart-list","API\PostLoginController@cartList");
	Route::post("checkout","API\PostLoginController@checkout");
	Route::get("order","API\PostLoginController@order");
	Route::post("wishlist-product","API\PostLoginController@wishlistProduct");
	Route::get("wishlist-product-list","API\PostLoginController@wishlistProductList");
	Route::post("delete-wishlist-product","API\PostLoginController@deleteWishlistProduct");
	Route::post("check-coupon-code","API\PostLoginController@checkCouponCode");
	Route::get("logout","API\PostLoginController@logout");
	
	Route::post("product-customizations","API\PostLoginController@productCustomizations");
	Route::post("product-review","API\PostLoginController@productReview");
});
Route::post("guest-checkout","API\PostLoginController@checkout");
Route::post("ondemand-enquiry","API\PostLoginController@ondemandEnquiry");
Route::post('emailuser-registration', [preLoginController::class, 'emailRegistration']);
Route::post('mail-getotp', [preLoginController::class, 'sendOtpOnMail']);
Route::post('mobileuser-registration', [preLoginController::class, 'mobileRegistration']);
Route::post('mobile-getotp', [preLoginController::class, 'sendOtpOnMobile']);
Route::post('validate-otp', [preLoginController::class, 'validateOtp']);
Route::post('login', [preLoginController::class, 'login']);
Route::post('social-login', [preLoginController::class, 'socialLogin']);
Route::post('forgot-password',[preLoginController::class, 'forgotPassword']);
Route::post('reset-password',[preLoginController::class, 'resetPassword']);
Route::post('contact-form-submit',[preLoginController::class, 'contactFormSubmit']);

Route::get('country-list',[preLoginController::class, 'countryList']);
Route::get('state-list',[preLoginController::class, 'stateList']);
Route::get('city-list',[preLoginController::class, 'cityList']);
Route::get('get-artisan',[preLoginController::class, 'getArtisanDetails']);
Route::get('get-staff',[preLoginController::class, 'staffList']);
Route::get('artisan-list',[preLoginController::class, 'ArtisanList']);
Route::get('get-sub-category-list',[preLoginController::class, 'getSubCategoryList']);

Route::get('slider-list',[preLoginController::class, 'sliderList']);
Route::get('blog-list',[preLoginController::class, 'blogList']);

Route::get('categorylist',[preLoginController::class, 'categoryList']);
Route::get('productlist',[preLoginController::class, 'productList']);
Route::get('dealsoftheweek-productlist',[preLoginController::class, 'dealsOfTheWeekProductList']);
Route::get('variant-attribute-list',[preLoginController::class, 'variantAttributeList']);
Route::get('search-product',[preLoginController::class, 'searchProduct']);
Route::get('product-detail',[preLoginController::class, 'productDetail']);
Route::get('latest-orders',[preLoginController::class, 'latestOrders']);
Route::get('testimonial-list',[preLoginController::class, 'testimonialList']);

Route::get('related-product',[preLoginController::class, 'relatedProduct']);

Route::get('toprated-category',[preLoginController::class, 'topRatedCategory']);
Route::get('topselling-product',[preLoginController::class, 'topSellingProduct']);
Route::get('dealsoftheday-product',[preLoginController::class, 'dealsOfTheDay']);

Route::get('new-product',[preLoginController::class, 'newProduct']);

Route::get('get-information-pages-data/{id}',[preLoginController::class, 'informationData']);

// Route::post("guest-checkout","API\PostLoginController@checkout");
Route::post("initiate-payment","API\PreLoginController@initiatePayment");

Route::get("check-pincode","API\PreLoginController@checkPincode");
Route::post("fail-order","API\PostLoginController@failedOrder");

Route::any("update-payment","API\PreLoginController@updatePayment");
Route::get("update-shipping-status","API\PreLoginController@changeDeliveryStatus");

Route::post("newsletter-subscribe","API\PreLoginController@newsletterSubscribe");
Route::post("track-order","API\PreLoginController@trackOrder");
Route::post("notify-product","API\PreLoginController@notifyProduct");

Route::get("getfreeshippingamount","API\PreLoginController@getFreeShippingAmount");
Route::post("wholesale-registration","API\PreLoginController@WholesaleRegistration");
Route::any("webhook-response","API\PreLoginController@webhookResponse");
Route::any("crone-job-sales-status","API\PreLoginController@croneJobSalesStatus");

