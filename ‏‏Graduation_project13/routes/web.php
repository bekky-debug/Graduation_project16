<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
 use App\Http\Controllers\ExchangeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ContantController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WalletRequestController;
use App\Http\Controllers\Admin\WalletRequestController as AdminWalletRequestController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// routes/web.php
Route::post('/register', [ProfileController::class, 'register'])->name('register');

Route::get('/', function () {
    return view('login');
})->name('login.form');
Route::get('/register', function () {
    return view('signup');
});


Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login.form');
})->name('logout');





Route::middleware('auth')->group(function(){
    Route::get('/wallet/requests/create', [WalletRequestController::class,'create'])->name('wallet.requests.create');
    Route::post('/wallet/requests', [WalletRequestController::class,'store'])->name('wallet.requests.store');
    Route::get('/wallet/requests', [WalletRequestController::class,'index'])->name('wallet.requests.index');
    Route::get('/wallet/requests/{request}', [WalletRequestController::class,'show'])->name('wallet.requests.show');
});


Route::prefix('admin')->middleware(['auth','can:manage-wallet-requests'])->group(function(){
    Route::get('/wallet/requests', [AdminWalletRequestController::class,'index'])->name('admin.wallet.requests.index');
    Route::get('/wallet/requests/{request}', [AdminWalletRequestController::class,'show'])->name('admin.wallet.requests.show');
    Route::post('/wallet/requests/{request}/approve', [AdminWalletRequestController::class,'approve'])->name('admin.wallet.requests.approve');
    Route::post('/wallet/requests/{request}/reject', [AdminWalletRequestController::class,'reject'])->name('admin.wallet.requests.reject');
});



Route::get('/profile/wallet', [WalletController::class, 'show'])->middleware('auth')->name('profile.wallet');
Route::post('/profile/wallet', [WalletController::class, 'show'])->middleware('auth')->name('profile.wallet');

Route::post('/login', [ProfileController::class, 'login'])->name('login');
 Route::get('/profile/home', [ProfileController::class, 'index'])->name('profile.home');


 Route::get('/profile/faq', [ProfileController::class, 'faq'])->name('profile.faq');
 Route::get('/profile/bitcoin', [ProfileController::class, 'bitcoin'])->name('profile.bitcoin');
 Route::get('/profile/eth', [ProfileController::class, 'eth'])->name('profile.eth');
 Route::get('/profile/USTD', [ProfileController::class, 'USTD'])->name('profile.USTD');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
 Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/transaction/store', [TransactionController::class, 'store'])->middleware('auth');
Route::get('/profile/transaction', [TransactionController::class, 'transaction'])->name('profile.transaction');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');




// عرض صفحة التحويل
Route::get('/profile/exchange', [ProfileController::class, 'exchange'])->name('profile.exchange');

// معالجة التحويل بعد الضغط على الزر
Route::post('/profile/exchange', [ExchangeController::class, 'process'])->name('exchange.process');

Route::post('/send',[ContantController::class,'send'])->name('send');

