<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceExtraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\Admin;
use App\Http\Controllers;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


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

// Route::view('orders', 'orders');

Route::get('/clear-cache', function () {
    // Clear application cache
    Artisan::call('cache:clear');

    // Clear route cache
    Artisan::call('route:clear');

    // Clear configuration cache
    Artisan::call('config:clear');

    // Clear view cache
    Artisan::call('view:clear');

    // Clear compiled class cache
    Artisan::call('clear-compiled');

    return "All caches cleared successfully!";
});

Route::get('migrate', function () {
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    return 'success';
});

Route::view('logout', 'logout');
Route::get('/login', [Controllers\AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [Controllers\AuthController::class, 'login'])->name('login_proceed');
Route::get('/signup', [Controllers\AuthController::class, 'signupForm'])->name('signup_form');
Route::post('/signup', [Controllers\AuthController::class, 'signup'])->name('signup');
Route::post('/verifyOTP', [Controllers\AuthController::class, 'verifyOTP'])->name('verifyOTP');

Route::post('/submit-forgot-password', [Controllers\AuthController::class, 'submitForgetPassword'])->name('submit-forgot-password');
Route::get('/confirm-password/{token}', [Controllers\AuthController::class, 'confirmPassword'])->name('confirm-password');
Route::POST('/reset-password', [Controllers\AuthController::class, 'submitResetPassword'])->name('reset-password');

Route::get('auth/{driver}', [Controllers\AuthController::class, 'signInwithGoogle']);
Route::get('callback/{driver}', [Controllers\AuthController::class, 'callbackToGoogle']);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/', [Admin\Auth\LoginController::class, 'loginForm'])->name('login_form');
    Route::get('/login', [Admin\Auth\LoginController::class, 'loginForm'])->name('login_form');
    Route::post('/login', [Admin\Auth\LoginController::class, 'login'])->name('login');


    Route::group(['middleware' => ['auth_admin', 'admin']], function () {

        Route::get('/dashboard', [Admin\Auth\LoginController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [Admin\Auth\LoginController::class, 'logout'])->name('logout');
        Route::post('/export-order', [Admin\OrderController::class, 'export'])->name('order.export');
        Route::get('/daysoff', [Admin\offDaysController::class, 'index'])->name('offdays.index');
        Route::post('/daysoff', [Admin\offDaysController::class, 'store'])->name('offdays.store');
        Route::delete('/offdays/delete/{id}', [Admin\offDaysController::class, 'delete']);
        Route::get('/switch', [Admin\SwitchTimingController::class, 'index'])->name('switch.index');
        Route::post('/switch', [Admin\SwitchTimingController::class, 'store'])->name('switch.store');
        Route::post('/order/update-date/{order}', [Admin\OrderController::class, 'updateDate'])->name('order.update_date');
        Route::post('/order/completes/{order}', [Admin\OrderController::class, 'completeOrder'])->name('orders.completed');
        Route::post('/order/service/{order}', [Admin\OrderController::class, 'updateServices'])->name('order.add_service');

        Route::get('/orders', [Admin\OrderController::class, 'allOrders'])->name('orders');
        Route::get('/orders/today', [Admin\OrderController::class, 'todayOrders'])->name('order.today');
        Route::get('/orders/ongoing-order', [Admin\OrderController::class, 'onGoingOrders'])->name('order.ongoing');
        Route::get('/orders/ont-the-way', [Admin\OrderController::class, 'onTheWayOrders'])->name('order.ontheway');
        Route::get('/orders/delivered', [Admin\OrderController::class, 'delivered'])->name('order.delivered');

        Route::get('/orders/new/{start_date}/{end_date}', [Admin\OrderController::class, 'newOrders'])->name('order.neworder');
        Route::get('/orders/pending', [Admin\OrderController::class, 'pendingOrders'])->name('order.pending');
        Route::get('/orders/completed', [Admin\OrderController::class, 'completedOrders'])->name('order.completed');
        Route::get('/orders/not-completed', [Admin\OrderController::class, 'notCompletedOrders'])->name('order.not-completed');
        Route::resource('/orders', Admin\OrderController::class, ['except' => 'index'])->names('order');

        Route::put('/orders/{order}/collected', [Admin\OrderController::class, 'collected'])->name('order.collected');
        Route::put('/orders/{order}/processed', [Admin\OrderController::class, 'processed'])->name('order.processed');
        Route::put('/orders/{order}/completed', [Admin\OrderController::class, 'completed'])->name('order.orderCompleted');
        Route::put('/orders/{order}/cancelOrder', [Admin\OrderController::class, 'cancelOrder'])->name('order.cancelOrder');

        Route::put('/orders/{order}/updateTimings', [Admin\OrderController::class, 'updateTimings'])->name('orders.updateTimings');


        Route::resource('post-code', Admin\PostCodeController::class)->names('post_code');
        Route::resource('section', Admin\SectionController::class)->names('section');
        Route::resource('service', Admin\ServiceController::class)->names('service');
        Route::resource('users', Admin\UserController::class)->names('user');
        Route::resource('categories', Admin\CategoryController::class)->names('category');
        Route::resource('timings', Admin\TimingController::class)->names('timing');
        Route::resource('customers', Admin\CustomerController::class)->names('customer');
        // Route::get('customers/{id}',[Admin\CustomerController::class,'edit'])->name('customer.edit');
        Route::get('/profile/edit', [Admin\ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update', [Admin\ProfileController::class, 'update'])->name('profile.update');


        Route::get('/setting/main-catagory', [Admin\SettingController::class, 'createMainCatagory'])->name('setting.main_catagory');
        Route::POST('/setting/create-catagory', [Admin\SettingController::class, 'storeCatagory'])->name('setting.create_catagory');
        Route::get('/setting/list-catagory', [Admin\SettingController::class, 'listMainCatagory'])->name('setting.list_catagory');
        Route::get('/setting/edit-catagory/{edit}', [Admin\SettingController::class, 'EditCatagory'])->name('setting.edit_catagory');
        Route::POST('/setting/update-catagory', [Admin\SettingController::class, 'UpdateCatagory'])->name('setting.update_catagory');
        Route::get('/setting/delete-catagory/{id}', [Admin\SettingController::class, 'deleteCatagory'])->name('setting.delete_catagory');


        Route::get('/setting/sub-catagory', [Admin\SettingController::class, 'createSubCatagory'])->name('setting.sub_catagory');
        Route::POST('/setting/create-sub-catagory', [Admin\SettingController::class, 'storeSubCatagory'])->name('setting.create_sub_catagory');
        Route::POST('/setting/update-sub-catagory', [Admin\SettingController::class, 'updateSubCatagory'])->name('setting.update_sub_catagory');
        Route::get('/setting/list-sub-catagory', [Admin\SettingController::class, 'listSubCatagory'])->name('setting.list_sub_catagory');
        Route::get('/setting/edit-sub-catagory/{edit}', [Admin\SettingController::class, 'editSubCatagory'])->name('setting.edit_sub_catagory');
        Route::get('/setting/delete-sub-catagory/{id}', [Admin\SettingController::class, 'deleteSubCatagory'])->name('setting.delete_sub_catagory');
        Route::get('/setting/footer', [Admin\SettingController::class, 'footer'])->name('setting.footer');
        Route::POST('/setting/footer-update', [Admin\SettingController::class, 'footerUpdate'])->name('setting.footer_update');
        Route::get('/setting/social', [Admin\SettingController::class, 'social'])->name('setting.social');
        Route::POST('/setting/footer-update-social', [Admin\SettingController::class, 'footerCreateSocial'])->name('setting.footer_update_social');
        Route::get('/setting/edit-social-icone/{edit}', [Admin\SettingController::class, 'editSocialIcone'])->name('setting.edit_social_icone');
        Route::POST('/setting/footer-create-social', [Admin\SettingController::class, 'footerUpdateSocial'])->name('setting.footer_create_social');
        Route::get('/setting/delete-social-icone/{id}', [Admin\SettingController::class, 'deleteSocialIcone'])->name('setting.delete_social_icone');

        Route::match(['get', 'post'], '/charge-order', [Admin\OrderController::class, 'chargeOrder'])->name('charge-order');


        Route::get('/pages', [Admin\PageController::class, 'index'])->name('pages.index');
        Route::get('/pages/create', [Admin\PageController::class, 'create'])->name('pages.create');
        Route::post('/pages/store', [Admin\PageController::class, 'store'])->name('pages.store');
        Route::post('/pages/upload-image', [Admin\PageController::class, 'uploadImage'])->name('pages.upload-image');

        Route::post('/pages/upload-ckimage', [Admin\PageController::class, 'uploadCKImage'])->name('pages.upload-ckimage');

        Route::get('/pages/{id}/edit', [Admin\PageController::class, 'edit'])->name('pages.edit');
        Route::put('/pages/{page}', [Admin\PageController::class, 'update'])->name('pages.update');

        Route::resource('page', Admin\PageController::class)->names('page');

        Route::delete('/pages/{id}', [Admin\PageController::class, 'destroy'])->name('pages.destroy');


    });

});

#Route::view('/soon', 'soon')->name('soon');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/forgot-password', [HomeController::class, 'forgot_password'])->name('forgot_password');


#Route::view('/services', 'services')->name('services');

#Route::view('/contact', 'contact')->name('contact');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'contact'])->name('contactForm');

Route::get('/services', [ServiceController::class, 'page'])->name('services');
Route::post('/category/service', [ServiceController::class, 'categoryServices'])->name('category.services');
Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/blog', [BlogsController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogsController::class, 'show'])->name('blog.show');


Route::get('/order/{slug}', [OrderController::class, 'invoice'])->name('order.invoice');
/*
|--------------------------------------------------------------------------
| Services
|--------------------------------------------------------------------------
*/

/* Route::prefix('service')->group(function () {
    Route::view('/dry-cleaning', 'service.dry-cleaning')->name('service.dry-cleaning');
    Route::view('/bed-linen', 'service.bed-linen')->name('service.bed-linen');
    Route::view('/shirt-laundry', 'service.shirt-laundry')->name('service.shirt-laundry');
    Route::view('/duvets-household', 'service.duvets-household')->name('service.duvets-household');

    Route::view('/wedding-dress', 'service.wedding-dress')->name('service.wedding-dress');
    Route::view('/alterations-repairs', 'service.alterations-repairs')->name('service.alterations-repairs');
    Route::view('/suede-leather', 'service.suede-leather')->name('service.suede-leather');
    Route::view('/specialist', 'service.specialist')->name('service.specialist');
}); */

/*
|--------------------------------------------------------------------------
| Checkout
|--------------------------------------------------------------------------
*/

// Route::middleware('auth')->group(function () {
Route::GET('/get-details', [CheckoutController::class, 'getRegisterEmailData'])->name('get-details');

Route::post('/order/{order}/cancel', [AccountController::class, 'cancel'])->name('order.cancel');

Route::prefix('checkout')->group(function () {

    Route::get('/', [CheckoutController::class, 'getCheckoutStep01'])->name('checkout');
    Route::post('/details', [CheckoutController::class, 'postCheckoutStep01'])->name('checkout.post.step01');
    Route::post('/check-postcode-existence', [CheckoutController::class, 'checkPostcodeExistence'])->name('checkout.check-postcode-existence');

    Route::get('/reservation', [CheckoutController::class, 'getCheckoutStep02'])->name('checkout.get.step02');
    Route::post('/reservation', [CheckoutController::class, 'postCheckoutStep02'])->name('checkout.post.step02');

    // Route::get('/services', [CheckoutController::class, 'getCheckoutStep03'])->name('checkout.get.step03');
    // Route::post('/services', [CheckoutController::class, 'postCheckoutStep03'])->name('checkout.post.step03');

    Route::get('/payment', [CheckoutController::class, 'getCheckoutStep04'])->name('checkout.get.step04');
    Route::match(['get', 'post'],'add-card-from-book-now', [CheckoutController::class, 'addCardFromBookNow'])->name('add-card-from-book-now');
    Route::get('save-stripe-checkout-from-book-now',[CheckoutController::class, 'saveStripeCardFromBookNow'])->name('save-stripe-checkout-from-book-now');
    Route::post('/payment', [CheckoutController::class, 'postCheckoutStep04'])->name('checkout.post.step04');
    Route::post('/paymentbuton', [CheckoutController::class, 'postCheckoutStep04Button'])->name('checkout.post.button');
    Route::get('/getform', [CheckoutController::class, 'getUpdateCardform'])->name('getform');
    Route::post('/updatecard', [CheckoutController::class, 'updateCard'])->name('updatecard');
    Route::post('/check-post-code', [CheckoutController::class, 'checkPostCode'])->name('check_post_code');
    Route::get('/summary', [CheckoutController::class, 'getCheckoutStep05'])->name('checkout.get.step05');
    //    });

    Route::get('my-orders', [OrderController::class, 'myOrders'])->name('my_order');
    Route::get('account', [AccountController::class, 'myAccount'])->name('account');

    Route::post('contact-details', [AccountController::class, 'contactDetails'])->name('contact-details');
    Route::post('change-password', [AccountController::class, 'changePassword']);
    Route::match(['get', 'post'],'add-card', [AccountController::class, 'addCard'])->name('add-card');
    Route::get('save-stripe-checkout',[AccountController::class, 'saveStripeCardCheckout'])->name('save-stripe-checkout');
    Route::post('add-address', [AccountController::class, 'addAddress'])->name('add-address');
    Route::post('logout', [AccountController::class, 'logout'])->name('logout');
    Route::get('delivery-date', [CheckoutController::class, 'deliveryDate']);

});

Route::get('apple-pay', [AccountController::class, 'applePay'])->name('apple-pay');
Route::post('/create-payment-intent', [CheckoutController::class, 'createPaymentIntent']);
Route::get('strip-config', function () {
    $publishableKey = env('STRIPE_PUBLIC_KEY');

    if (!$publishableKey) {
        return Response::json(['error' => 'Stripe publishable key not set'], 500);
    }

    return Response::json(['publishableKey' => $publishableKey]);
});


/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/
