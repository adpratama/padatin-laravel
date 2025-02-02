<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home/search-company', [HomeController::class, 'searchCompany'])->name('home.searchCompany');
Route::get('/home/search-result', [HomeController::class, 'searchResult'])->name('home.searchResult');

Route::post('/add-to-cart', function (Request $request) {
    $cart = session()->get('cart', []);
    $product_id = $request->input('product_id');

    if (isset($cart[$product_id])) {
        $cart[$product_id]['quantity'] += 1;
    } else {
        $cart[$product_id] = [
            'name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'quantity' => 1
        ];
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Produk ditambahkan ke cart!');
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/total', [CartController::class, 'getCartTotal'])->name('cart.total');

Route::get('/download/{token}', [CheckoutController::class, 'download'])->name('documents.download');




Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/webhook/xendit', [CheckoutController::class, 'webhook']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/company', [CompanyController::class, 'index'])->name('admin.company');
    Route::post('/admin/company', [CompanyController::class, 'index'])->name('admin.company');
    Route::post('/admin/company/import', [CompanyController::class, 'index'])->name('admin.company.import');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
