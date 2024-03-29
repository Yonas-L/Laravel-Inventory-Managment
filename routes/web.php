<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\productController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SignInWithGoogleController;
use App\Models\User;
use App\Providers\UserHasBeenVerified;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    $products = Product::orderBy('created_at', 'DESC')->get();
    $simpleUsers = User::all();
    $analytics = $products->count();
    // flash("Welcome Mr ".Auth::user()->name);

    return inertia::render(
        'Welcome',
        [
            'products' => $products,
            'analytics' => $analytics,
            'simpleUsers' => $simpleUsers
        ]
    );
})->name('home')->middleware('auth', 'verified');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Product defined API endpoints'
Route::resource('products', ProductController::class);
Route::put('product/update/{id}', [productController::class, 'update'])->name('updateProduct');

// Email verification Notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Email verification process
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend email verification 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route for search functionality
Route::get('/search', [ProductSearchController::class, 'SearchAdmin'])->name('searchAdmin');
Route::get('/searchProducts', [ProductSearchController::class, 'searchProducts'])->name('searchUser');
Route::get('/searchByDate', [ProductSearchController::class, 'searchProductsByDate'])->name('searchByDate');
Route::get('/priceRange', [ProductSearchController::class, 'filterPrice'])->name('filterPrice');
// Route for branch related task
Route::get('/searchBranch', [BranchController::class, 'findBranch'])->name('findUserBranch');

// Route for the message sending endpoint
Route::get('chatRoom/{toId}', [ChatController::class, 'index'])->name('myConversations');
Route::post('chatRoom/sendMessage/{reciverId}', [ChatController::class, 'sendMessage'])->name('sendMessage');

// Route for social login using google
Route::get('social-login', [SignInWithGoogleController::class, 'redirectToGoogle'])->name('signInWithGoogle');
Route::get('auth/google/call-back', [SignInWithGoogleController::class, 'handleGoogleCallback']);

// Route for report generatoins
Route::get('export', [ReportController::class, 'export'])->middleware('auth')->name('export');
// Route::get('import', [ReportController::class, 'import'])->middleware('auth')->name('import');


require __DIR__ . '/auth.php';
