<?php

use App\Http\Controllers\AccessaryController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\GetComputerController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserRegistationController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegistrationController;
use App\Http\Controllers\GetAccessaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\RepairRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AccountInfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;
use App\Models\Accessary;

//==================================


Route::get('/comsearch', [ComputerController::class, 'search']);


//==================================
// Frontend Routes
//==================================
Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/home', function () {
    return view('frontend.home');
});

Route::get('/contact', function () {
    return view('frontend.contactus');
});

//==================================
// Admin Authentication Routes
//==================================
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login')->middleware('clear_cookies');
Route::post('/admin/check', [AdminLoginController::class, 'admincheck'])->name('admin.check');
Route::get('/admin/register', [AdminRegistrationController::class, 'create'])->name('admin.register');
Route::post('/admin/register', [AdminRegistrationController::class, 'store'])->name('admin.store');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('dashboard-admin/computer', ComputerController::class)->names([
        'index' => 'computer.index',
        'create' => 'computer.create',
        'store' => 'computer.store',
        'show' => 'computer.show',
        'edit' => 'computer.edit',
        'update' => 'computer.update',
        'destroy' => 'computer.destroy',
    ]);
    Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout')->middleware('clear_cookies');
});

//==================================
// User Authentication Routes
//==================================
Route::get('/login', [UserLoginController::class, 'index'])->name('login')->middleware('clear_cookies');
Route::post('/check', [UserLoginController::class, 'check'])->name('check');
Route::get('/register', [UserRegistationController::class, 'create'])->name('register');
Route::post('/register', [UserRegistationController::class, 'store'])->name('user.register');
//middleware implementation
Route::middleware(['auth', 'user'])->group(function () {

    Route::get('/user/dashboard', [UserDashboardController::class, 'dashboard'])->name('user.dashboard');
    // Route::get('/records', [RecordViewController::class, 'index'])->name('record.index');
    Route::post('/logout', [UserLoginController::class, 'logout'])->name('user.logout')->middleware('clear_cookies');
});

//==================================
// Computer Routes
//==================================
Route::get('/computer', [GetComputerController::class, 'getcomputer'])->name('computer.index');
Route::get('/computerdetails/{id}', [GetComputerController::class, 'computerdetails'])->name('computer.details');

//==================================
// Accessary Routes
//==================================
Route::get('/getaccessary', [GetAccessaryController::class, 'getaccessary'])->name('accessary.index');
Route::get('/accessarydetails/{id}', [GetAccessaryController::class, 'accessarydetails'])->name('accessary.details');


Route::post('/buy-now', [TelegramController::class, 'sendToTelegram'])->name('buy-now');
//==================================
// Repair Service Routes
//==================================
Route::get('/repairservice', function () {
    return view('frontend.repairservice');
})->name('repairservice');
// Show Booking Form
Route::get('/repair/booking', [RepairController::class, 'showBookingForm'])->name('repair.booking');

// Repair Booking Submission
Route::post('/repair/submit', [RepairController::class, 'submitBooking'])->name('repair.submit');

// Route to track repair requests
Route::get('/repair/track', [RepairController::class, 'showTrackForm'])->name('repair.track');
Route::post('/repair/track', [RepairController::class, 'trackRepair']);


//==================================
// User Account Information Routes
//==================================
Route::get('/account-info', [AccountInfoController::class, 'show'])
    ->middleware('auth')
    ->name('account');

//==================================
//Edit Account Information Routes
//==================================
Route::middleware(['auth'])->group(function () {
    Route::get('/account-info/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/account-info/update', [ProfileController::class, 'update'])->name('profile.update');
});

//==================================
// Add to Cart Routes
//==================================
Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
});

// cart icon route
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/confirmation/{order}', [CartController::class, 'orderConfirmation'])->name('cart.confirmation');

//==================================
//Checkout Step Routes (not confirmed yet)
//==================================
Route::middleware('auth')->prefix('checkout')->group(function () {
    Route::get('/checkout/step1', [CheckoutController::class, 'showStep1'])->name('checkout.step1');
    Route::post('/checkout/step1', [CheckoutController::class, 'processStep1'])->name('checkout.step1.post');

    Route::get('/checkout/step2', [CheckoutController::class, 'showStep2'])->name('checkout.step2');
    Route::post('/checkout/step2', [CheckoutController::class, 'processStep2'])->name('checkout.step2.post');

    Route::get('/checkout/review', [CheckoutController::class, 'showReview'])->name('checkout.review');
    Route::post('/checkout/complete', [CheckoutController::class, 'completeOrder'])->name('checkout.complete');
});


// =========> ADMIN DASHBOARD MANAGEMENT ROUTES <=========
//==================================
// Admin Login Routes
//==================================
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'admincheck'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

//==================================
// Admin Dashboard main route
//==================================
Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard');

//==================================
// Admin Computer Management Routes
//==================================
Route::get('/computer/check-name', [ComputerController::class, 'checkName'])->name('computer.checkName');

//==================================
//Admin accessary routes
//==================================
Route::resource('/dashboard-admin/accessary', AccessaryController::class);
Route::get('/search', [AccessaryController::class, 'search']);

Route::get('/accessary/check-name', [AccessaryController::class, 'checkName'])->name('accessary.checkName');

//==================================
// Admin Repair Request Management
//==================================
Route::resource('/dashboard-admin/repairrequest', RepairRequestController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('repairrequest', RepairRequestController::class);
});

// dropdown for repair request status
Route::post('/admin/repairrequest/{id}/status', [RepairRequestController::class, 'updateStatus']);

//==================================
// Admin Order Management Routes
//==================================
Route::middleware(['auth', 'admin'])->prefix('dashboard-admin')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
});

Route::patch('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');


//==================================
// Admin User Management Routes
//==================================
Route::resource('/dashboard-admin/customers', CustomerController::class);

//==================================
// Admin Payment Management Routes
//==================================
Route::prefix('dashboard-admin')->group(function () {
    Route::resource('payments', PaymentController::class)->only(['index', 'destroy']);
});
