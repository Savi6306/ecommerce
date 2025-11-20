<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Route;
//user controller
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Test;
use  App\Http\Controllers\StudentController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\UserPaymentController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserOrderTrackingController;
use App\Http\Controllers\User\UserChatController;
//seller controller
use App\Http\Controllers\Seller\SellerUserChatController;

use App\Http\Controllers\Seller\PageController;
use App\Http\Controllers\Seller\AuthController;
//use App\Http\Controllers\Seller\SellerAuthController;
use App\Http\Controllers\Seller\OtpController;
use App\Http\Controllers\Seller\DashboardController;
use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Seller\OrderController;
use App\Http\Controllers\Seller\ProfileController;
use App\Http\Controllers\Seller\SellerSettingController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\POSController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\InHouseProductController;
use App\Http\Controllers\Admin\VendorProductController;
use App\Http\Controllers\Admin\ProductGalleryController;

use App\Http\Controllers\Admin\VendorProductGalleryController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\PaymentGatewayController;
use App\Http\Controllers\Admin\RefundController;
use App\Http\Controllers\Admin\ShippingPartnerController;
use App\Http\Controllers\Admin\DeliveryTrackingController;
use App\Http\Controllers\Admin\ShippingUpdateController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\WarehouseStockController;
use App\Http\Controllers\Admin\StockHistoryController;
//chat controller
use App\Http\Controllers\Admin\AdminChatController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Seller\SellerChatController;
//use App\Http\Controllers\Admin\AdminChatController;
//use App\Http\Controllers\Admin\DeliveryUpdateController;

//user route 

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

Route::get('/FAQ', [HomeController::class, 'FAQ'])->name('FAQ');

Route::get('/terms', [HomeController::class, 'terms'])->name('terms');

Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');

Route::get('/returns', [HomeController::class, 'returns'])->name('returns');

Route::get('/offers', [HomeController::class, 'offers'])->name('offers');

Route::get('/bestsellers', [HomeController::class, 'bestsellers'])->name('bestsellers');

//Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/orders', [HomeController::class, 'orders'])->name('orders');

//Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
Route::post('/add-to-wishlist/{id}', [HomeController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/remove-from-wishlist/{id}', [HomeController::class, 'removeFromWishlist'])->name('wishlist.remove');


Route::get('/signup', [HomeController::class,'signup'])->name('signup'); // serve your blade
Route::post('/register', [UserAuthController::class, 'register'])->name('register');

// optional DB test 
Route::get('/test-db', [AuthController::class, 'testDB']);

//Profile section
Route::middleware('auth:customer')->group(function () {

Route::any('/profile', [UserProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
});

// Contact page show
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Contact form submit
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::post('/logout', function () {
    Auth::guard('customer')->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('home');
})->name('customer.logout');


// Address Routes
Route::get('/create', [AddressController::class, 'create'])->name('user.create');
Route::post('/store', [AddressController::class, 'store'])->name('user.store');

// Auth
Route::get('/user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
//Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login'); // ✅ add this

Route::post('/user/login', [UserAuthController::class, 'login'])->name('login.submit');


// Forgot Password
Route::get('/forgot', [PasswordController::class, 'showForgotForm'])->name('user.forgot');
Route::post('/forgot', [PasswordController::class, 'sendResetLink'])->name('password.send');

Route::post('/apply-promo', [CheckoutController::class, 'applyPromo'])->name('apply.promo');

Route::prefix('customer')->group(function () {

    Route::get('forgot-password', [PasswordController::class, 'showForgotForm'])->name('password.request');
    Route::post('forgot-password', [PasswordController::class, 'sendResetLink'])->name('password.email');
    Route::get('reset-password/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [PasswordController::class, 'resetPassword'])->name('password.update');

    Route::get('/addresses', [AddressController::class, 'index'])->name('user.addresses');
    Route::get('/addresses/{id}/edit', [AddressController::class, 'edit'])->name('user.edit');
    Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('user.update');
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('user.delete');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

    Route::any('/checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');

    Route::get('/order/success', function () {
        return view('user.order_success');
    })->name('order.success');

});



// Cart Routes (inside auth middleware)
Route::middleware('auth:customer')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

});
Route::get('/buy-now/{id}', [CheckoutController::class, 'buyNow'])->name('buy.now');

// Payment page
Route::get('/payment', [UserPaymentController::class, 'showPayment'])
    ->name('payment.page')
    ->middleware('auth:customer');

// Process payment
Route::post('/payment/process', [UserPaymentController::class, 'processPayment'])
    ->name('payment.process')
    ->middleware('auth:customer');

Route::get('/filter-products', [HomeController::class, 'filterProducts']);

Route::get('/track_steps/{id}', [UserOrderController::class, 'track'])->name('track.order');

Route::get('/order-location/{id}', function ($id) {
    $order = \App\Models\User\Order::findOrFail($id);
    return response()->json([
        'latitude' => $order->latitude,
        'longitude' => $order->longitude
    ]);
});
Route::get('/shipping_info', function () {
    return view('user.shipping_info');
})->name('shipping_info');


Route::get('/api/order-status/{id}', [UserOrderTrackingController::class, 'getStatus']);
//user and seller chat
Route::middleware('auth:customer')->group(function () {

    // User opens chat with a seller
    Route::get('/chat/seller/{sellerId}', 
        [UserChatController::class, 'openChat'])
        ->name('user.chat.seller');

    // User sends message
    Route::post('/chat/seller/send/{chatId}', 
        [UserChatController::class, 'sendMessage'])
        ->name('user.chat.seller.send');
});


// -----------------------------
// Seller Public Pages & Auth
// -----------------------------
Route::prefix('seller')->name('seller.')->group(function () {

    // Public pages
    Route::get('/', [PageController::class, 'index'])->name('index');
    Route::get('/how-to-work', [PageController::class, 'howToWork'])->name('howToWork');
    Route::get('/pricing-commission', [PageController::class, 'pricingCommission'])->name('pricingCommission');
    Route::get('/shipping-returns', [PageController::class, 'shippingReturns'])->name('shippingReturns');

     // Login
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');

    
    // Forgot Password
    Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgotPassword');
    Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('forgotPassword.submit');

    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    // Registration
    Route::get('/start-selling', [AuthController::class, 'showStartSellingForm'])->name('startSelling');
    Route::post('/start-selling', [AuthController::class, 'startSelling'])->name('startSelling.submit');


    // Optional AJAX OTP
    Route::post('/send-email-otp', [OtpController::class, 'sendEmailOtp'])->name('send.email.otp');
    Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('verify.email.otp');
    // ✅ OTP Form page
//Route::get('/otp', [OtpController::class, 'showOtpForm'])->name('otp.form');
    // API
//Route::post('/api/otp/send', [OtpController::class, 'sendOtpApi']);
//Route::post('/api/otp/verify', [OtpController::class, 'verifyOtpApi']);

});

// -----------------------------
// Protected Seller Routes (Require login)
//Route::prefix('seller')->name('seller.')->middleware(['auth:seller'])->group(function () {

    
    // 🟢 Seller Dashboard
    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 🟢 Seller Analytics Route (add this line)
    //Route::get('/analytics', [DashboardController::class, 'analytics'])->name('analytics');
//});

// -----------------------------
Route::prefix('seller')->name('seller.')->middleware(['auth:seller'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //analytics
     Route::get('/analytics', [DashboardController::class, 'analytics'])->name('analytics');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Products
   
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
     Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
   
    Route::get('/products/out-of-stock', [ProductController::class, 'outOfStock'])->name('products.outOfStock');
    
    Route::get('/products/featured', [ProductController::class, 'featuredProducts'])->name('products.featured');

    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/pending', [OrderController::class, 'pending'])->name('orders.pending');
    Route::get('/orders/in-transit', [OrderController::class, 'inTransit'])->name('orders.inTransit');
   // Show approved orders specifically (optional: can use index with filter)
   
   Route::get('/orders/approved', [OrderController::class, 'approved'])->name('orders.approved'); // ✅ define this
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
//profile route
     Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
//setting route
      Route::get('/settings', [SellerSettingController::class, 'index'])->name('settings');
    Route::post('/settings/update', [SellerSettingController::class, 'update'])->name('settings.update');
});


// -----------------------------
// Optional Debug OTP Route
// -----------------------------
Route::get('/debug-otp/{email}', function ($email) {
    $otps = \App\Models\Otp::where('email', $email)
        ->orderBy('created_at', 'desc')
        ->get();
    return response()->json($otps);
});
// admin route
// -----------------------------
// Admin Auth Routes (public)
// -----------------------------
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');
});

// Protected admin routes
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.admindashboard'); // Ensure this file exists
    })->name('admindashboard');

    // Search
    Route::get('/search', [AdminDashboardController::class, 'search'])->name('search');

     // Logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

// POS routes
      

Route::get('/pos', [POSController::class, 'index'])->name('pos.index');
    Route::get('/pos/add/{id}', [POSController::class, 'addToCart'])->name('pos.add');
    Route::get('/pos/remove/{seller_id}/{product_id}', [POSController::class, 'removeFromCart'])->name('pos.remove');
    Route::get('/pos/checkout', [POSController::class, 'checkout'])->name('pos.checkout');

    // Resource routes with admin. prefix
    Route::resource('products', AdminProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('attributes', AttributeController::class);
    
});
Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::resource('inhouse_products', InHouseProductController::class);
});


//vendor route
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('vendor_products', VendorProductController::class);
    
    Route::get('vendor_products/{product}/gallery', [VendorProductGalleryController::class, 'index'])
       ->name('vendor_products.gallery.index');
    Route::post('vendor_products/{product}/gallery', [VendorProductGalleryController::class, 'store'])
    ->name('vendor_products.gallery.store');
        Route::post('vendor_products/gallery/reorder', [VendorProductGalleryController::class, 'reorder'])
    ->name('vendor_products.gallery.reorder');
    
    Route::delete('vendor_products/gallery/{id}', [VendorProductGalleryController::class, 'destroy'])
        ->name('vendor_products.gallery.destroy');
    Route::post('vendor_products/gallery/{id}/featured', [VendorProductGalleryController::class, 'setFeatured'])
    ->name('vendor_products.gallery.featured');

});
// product grally

    
//Route::prefix('admin')->name('admin.')->group(function () {

    // ✅ Vendor Product Gallery routes
 //Route::get('products/{product}/gallery', [VendorProductGalleryController::class, 'index'])
    //  ->name('product.gallery');
   // Route::post('products/{product}/gallery', [VendorProductGalleryController::class, 'store'])
       //->name('product.gallery.store');
   // Route::delete('gallery/{gallery}', [VendorProductGalleryController::class, 'destroy'])
   // ->name('product.gallery.destroy');
 //Route::post('gallery/{gallery}/set-featured', [VendorProductGalleryController::class, 'setFeatured'])
      // ->name('product.gallery.featured');

//});
// route of orders admindashboard

Route::prefix('admin')->name('admin.')->group(function () {

    // Order management
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/pending', [AdminOrderController::class, 'pending'])->name('orders.pending');
    Route::get('/orders/shipped', [AdminOrderController::class, 'shipped'])->name('orders.shipped');
    Route::get('/orders/delivered', [AdminOrderController::class, 'delivered'])->name('orders.delivered');
    Route::get('/orders/cancelled', [AdminOrderController::class, 'cancelled'])->name('orders.cancelled');
    Route::get('/orders/refunds', [AdminOrderController::class, 'refunds'])->name('orders.refunds');

    // Show individual order
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');

    // Optional: Update order status
    Route::post('/orders/{order}/update-status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
});
// promotions route

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::resource('promotions', PromotionController::class)->except(['show']);

    // Banner setup
    Route::get('promotions/banners', [PromotionController::class,'banners'])->name('promotions.banners');
    Route::get('promotions/banners/create', [PromotionController::class,'createBanner'])->name('promotions.banners.create');
    Route::post('promotions/banners', [PromotionController::class,'storeBanner'])->name('promotions.banners.store');
    Route::get('promotions/banners/{banner}/edit', [PromotionController::class,'editBanner'])->name('promotions.banners.edit');
    Route::put('promotions/banners/{banner}', [PromotionController::class,'updateBanner'])->name('promotions.banners.update');
    Route::delete('promotions/banners/{banner}', [PromotionController::class,'destroyBanner'])->name('promotions.banners.destroy');
    
    // OFFERS & DEALS
    Route::get('promotions/offers', [PromotionController::class, 'offers'])->name('promotions.offers');
    Route::get('promotions/offers/create', [PromotionController::class, 'createOffer'])->name('promotions.offers.create');
    Route::post('promotions/offers/store', [PromotionController::class, 'storeOffer'])->name('promotions.offers.store');
    Route::get('promotions/offers/{offer}/edit', [PromotionController::class, 'editOffer'])->name('promotions.offers.edit');
    Route::put('promotions/offers/{offer}', [PromotionController::class, 'updateOffer'])->name('promotions.offers.update');
    Route::delete('promotions/offers/{offer}', [PromotionController::class, 'destroyOffer'])->name('promotions.offers.destroy');

    // NOTIFICATIONS
    Route::get('promotions/notifications', [PromotionController::class, 'notifications'])->name('promotions.notifications');
    Route::get('promotions/notifications/create', [PromotionController::class, 'createNotification'])->name('promotions.notifications.create');
    Route::post('promotions/notifications/store', [PromotionController::class, 'storeNotification'])->name('promotions.notifications.store');

    // ANNOUNCEMENTS
    Route::get('promotions/announcements', [PromotionController::class, 'announcements'])->name('promotions.announcements');
    Route::get('promotions/announcements/create', [PromotionController::class, 'createAnnouncement'])->name('promotions.announcements.create');
    Route::post('promotions/announcements/store', [PromotionController::class, 'storeAnnouncement'])->name('promotions.announcements.store');
//
});
// Support Routes (Admin)
Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {

    // 1️⃣ List all support tickets
    Route::get('support', [SupportController::class, 'index'])->name('support.index');

    // 2️⃣ Show form to create a new ticket
    Route::get('support/create', [SupportController::class, 'create'])->name('support.create');

    // Store ticket
    Route::post('support', [SupportController::class, 'store'])->name('support.store');

    // Inbox (open/pending tickets)
    Route::get('support/inbox', [SupportController::class, 'inbox'])->name('support.inbox');

    // Messages page ✅ keep above show route
    Route::get('support/messages', [SupportController::class, 'messages'])->name('support.messages');

    // 3️⃣ View a single ticket — keep this at the end
    Route::get('support/{ticket}', [SupportController::class, 'show'])->name('support.show');

    // 4️⃣ Close a ticket
    Route::post('support/{ticket}/close', [SupportController::class, 'close'])->name('support.close');

    // 5️⃣ Reply to a ticket
    Route::post('support/{ticket}/reply', [SupportController::class, 'reply'])->name('support.reply');
});

// Reports & Analysis
Route::prefix('admin')->name('admin.')->group(function () {

    // Reports & Analysis
    Route::get('reports/sales', [ReportController::class, 'sales'])->name('reports.sales');
    Route::get('reports/products', [ReportController::class, 'products'])->name('reports.products');
    Route::get('reports/orders', [ReportController::class, 'orders'])->name('reports.orders');

});
//blog route
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');           // index.blade.php
    Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create');  // create.blade.php
    Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store');          // form submit
    Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit'); // edit.blade.php
    Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');  // form submit
    Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy'); // delete
});
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {

    // User Management
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
//seller mangement

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/sellers', [SellerController::class, 'index'])->name('sellers.index');
   // Route::get('/sellers/{id}/edit', [SellerController::class, 'edit'])->name('admin.sellers.edit');
//Route::put('/sellers/{id}', [SellerController::class, 'update'])->name('admin.sellers.update');

    Route::get('/sellers/approvals', [SellerController::class, 'approvals'])->name('sellers.approvals');
    Route::post('/sellers/{id}/verify', [SellerController::class, 'verify'])->name('sellers.verify');
    Route::get('/sellers/commission', [SellerController::class, 'commission'])->name('sellers.commission');
    Route::get('/sellers/analytics', [SellerController::class, 'analytics'])->name('sellers.analytics');
});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {

    // 🔒 Roles Routes
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // 🔑 Permissions Routes
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
});
// ================================
// 💰 Payments & Transactions Routes
// ================================

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    // ================================
// 💰 Payments & Transactions Routes
// ================================

// Transactions
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::get('/transactions/edit', [TransactionController::class, 'create'])->name('transactions.edit'); // ← add this
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store'); // optional
Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
//Payment Gateway
  Route::get('/payment-gateways', [PaymentGatewayController::class, 'index'])->name('payment_gateways.index');
    Route::get('/payment-gateways/create', [PaymentGatewayController::class, 'create'])->name('payment_gateways.create');
    Route::post('/payment-gateways', [PaymentGatewayController::class, 'store'])->name('payment_gateways.store');
    Route::get('/payment-gateways/{gateway}/edit', [PaymentGatewayController::class, 'edit'])->name('payment_gateways.edit');
    Route::put('/payment-gateways/{gateway}', [PaymentGatewayController::class, 'update'])->name('payment_gateways.update');
    Route::delete('/payment-gateways/{gateway}', [PaymentGatewayController::class, 'destroy'])->name('payment_gateways.destroy');
// 🔹 Refund Tracking
// Refund Routes
Route::get('/refunds', [RefundController::class, 'index'])->name('refunds.index');
Route::get('/refunds/create', [RefundController::class, 'create'])->name('refunds.create');
Route::get('/refunds/edit', [RefundController::class, 'create'])->name('refunds.edit');
Route::post('/refunds', [RefundController::class, 'store'])->name('refunds.store');
Route::get('/refunds/{refund}', [RefundController::class, 'show'])->name('refunds.show');
Route::delete('/refunds/{refund}', [RefundController::class, 'destroy'])->name('refunds.destroy');

});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {

    // 🚚 Shipping & Delivery
    Route::prefix('shipping')->name('shipping.')->group(function () {

        // 🧭 Shipping Partners
        Route::get('/partners', [ShippingPartnerController::class, 'index'])->name('partners.index');
        Route::get('/partners/create', [ShippingPartnerController::class, 'create'])->name('partners.create');
        Route::post('/partners', [ShippingPartnerController::class, 'store'])->name('partners.store');
        Route::get('/partners/{partner}/edit', [ShippingPartnerController::class, 'edit'])->name('partners.edit');
        Route::put('/partners/{partner}', [ShippingPartnerController::class, 'update'])->name('partners.update');
        Route::delete('/partners/{partner}', [ShippingPartnerController::class, 'destroy'])->name('partners.destroy');

        // 🔹 Delivery Tracking
        Route::get('/tracking', [DeliveryTrackingController::class, 'index'])->name('tracking.index');
        Route::get('/tracking/create', [DeliveryTrackingController::class, 'create'])->name('tracking.create'); // ✅ moved up
        Route::post('/tracking', [DeliveryTrackingController::class, 'store'])->name('tracking.store');
        Route::get('/tracking/{tracking}', [DeliveryTrackingController::class, 'show'])->name('tracking.show');
        Route::delete('/tracking/{tracking}', [DeliveryTrackingController::class, 'destroy'])->name('tracking.destroy');

        // 🕒 Status Updates
Route::prefix('tracking/{tracking}/updates')->name('updates.')->group(function () {
    Route::get('/create', [ShippingUpdateController::class, 'create'])->name('create');
    Route::post('/', [ShippingUpdateController::class, 'store'])->name('store');
    Route::get('/{update}/edit', [ShippingUpdateController::class, 'edit'])->name('edit');
    Route::put('/{update}', [ShippingUpdateController::class, 'update'])->name('update');
    Route::delete('/{update}', [ShippingUpdateController::class, 'destroy'])->name('destroy');
});
       
    });
});

Route::prefix('admin/inventory')->name('admin.inventory.')->group(function () {

    // 🏬 Warehouse
    Route::get('/warehouse', [WarehouseController::class, 'index'])->name('warehouse.index');
    Route::get('/warehouse/create', [WarehouseController::class, 'create'])->name('warehouse.create');
    Route::post('/warehouse', [WarehouseController::class, 'store'])->name('warehouse.store');
    Route::delete('/warehouse/{warehouse}', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');

    // 📦 Warehouse Stock
    Route::get('/stock', [WarehouseStockController::class, 'index'])->name('stock.index');

    // 🧾 Stock History
    Route::get('/history', [StockHistoryController::class, 'index'])->name('history.index');
});

// User ↔ Seller
//Route::middleware('auth')->group(function () {
    //Route::get('/chat/seller/{seller_id}', [ChatController::class, 'userChat'])->name('seller.chat.user');
//});

// Seller ↔ Admin
//Route::middleware('auth:seller')->group(function () {
   // Route::get('/chat/admin', [ChatController::class, 'sellerChatAdmin'])->name('seller.admin.chat');
//});

// Store Messages
//Route::post('/message/store', [ChatController::class, 'storeMessage'])->name('message.store');

// Admin Monitor
//Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
   // Route::get('/chats', [AdminChatController::class, 'index'])->name('chats.index');
   // Route::get('/chats/live-monitor/{chat_id}', [AdminChatController::class, 'liveMonitor'])->name('chats.live_monitor');
    //Route::post('/chats/{chat_id}/send', [AdminChatController::class, 'send'])->name('chats.send'); // Admin sends reply
//});
// User ↔ Seller


Route::prefix('seller')->middleware('auth:seller')->group(function() {

    // List all chats with admins
    Route::get('/chats/admin', [SellerChatController::class, 'index'])
        ->name('seller.chats.admin');

    // Start a chat with an admin
    Route::get('/chat/admin/start/{adminId}', [SellerChatController::class, 'startChat'])
        ->name('seller.chat.admin.start');

    // View a chat with a specific admin
    Route::get('/chat/admin/{admin_id}', [SellerChatController::class, 'chatView'])
        ->name('seller.chat.admin.view');

    // Send a message in an admin chat
    Route::post('/chat/admin/{chatId}/send', [SellerChatController::class, 'sendMessage'])
        ->name('seller.chat.admin.send');
});
//user to seller chat
Route::prefix('seller')->middleware('auth:seller')->group(function () {

    // List of user chats
    Route::get('/chats/users', [SellerUserChatController::class, 'index'])
        ->name('seller.chats.users');

    // Open chat with a user
    Route::get('/chat/user/{userId}', [SellerUserChatController::class, 'chatWithUser'])
        ->name('seller.chat.user');

    // Seller sends message to user
    Route::post('/chat/user/{chatId}/send', [SellerUserChatController::class, 'sendMessage'])
        ->name('seller.chat.user.send');
});
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {

    // All chats
    Route::get('/chats', [AdminChatController::class, 'index'])->name('admin.chats.index');

    // View single chat
    Route::get('/chats/{chat}', [AdminChatController::class, 'viewChat'])->name('admin.chats.live_monitor');

    // Send reply
    Route::post('/chats/{chat}/send', [AdminChatController::class, 'sendMessage'])->name('admin.chats.send');
});