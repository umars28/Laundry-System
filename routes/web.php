<!-- =========================================================================================
  Name: Sistem Informasi Laundry
  Author: Umar Sabirin
========================================================================================== -->
<?php

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


Auth::routes();

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'checkRole:admin,karyawan']], function (){

    // Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');

    // Pakets
    Route::group(['as' => 'admin.','prefix' => 'paket','middleware' => ['checkRole:admin']], function () {
        Route::get('/create', 'PaketController@create')->name('paket.create');
        Route::post('/store', 'PaketController@store')->name('paket.store');
        Route::get('/edit/{id}', 'PaketController@edit')->name('paket.edit');
        Route::post('/update/{id}', 'PaketController@update')->name('paket.update');
        Route::delete('/delete/{id}', 'PaketController@delete')->name('paket.delete');
    });
        Route::get('/paket', 'PaketController@index')->name('admin.paket');


    // Customers
    Route::get('/customer', 'CustomerController@index')->name('admin.customer');
    Route::delete('/customer/delete/{id}/{email}', 'CustomerController@delete')->name('admin.customer.delete')->middleware('checkRole:admin');

    // Karyawan
    Route::group(['as' => 'admin.','prefix' => 'karyawan','middleware' => ['checkRole:admin']], function () {
        Route::get('/create', 'KaryawanController@create')->name('karyawan.create');
        Route::post('/store', 'KaryawanController@store')->name('karyawan.store');
        Route::delete('/delete/{id}', 'KaryawanController@delete')->name('karyawan.delete');
    });
        Route::get('/karyawan', 'KaryawanController@index')->name('admin.karyawan');

    // Pesanan
    Route::group(['as' => 'admin.','prefix' => 'pesanan','middleware' => ['checkRole:admin']], function () {
        Route::post('/status/store', 'PesananController@store')->name('pesanan.status.store');
        Route::get('/status/edit/{id}', 'PesananController@edit')->name('pesanan.status.edit');
        Route::post('/status/update/{id}', 'PesananController@update')->name('pesanan.status.update');
        Route::delete('/status/delete/{id}', 'PesananController@delete')->name('pesanan.status.delete');
    });
        Route::get('/pesanan/status', 'PesananController@index')->name('admin.pesanan.status');

    // Pembayaran
    Route::group(['as' => 'admin.','prefix' => 'pembayaran','middleware' => ['checkRole:admin']], function () {
        Route::post('/status/store', 'PembayaranController@store')->name('pembayaran.status.store');
        Route::get('/status/edit/{id}', 'PembayaranController@edit')->name('pembayaran.status.edit');
        Route::post('/status/update/{id}', 'PembayaranController@update')->name('pembayaran.status.update');
        Route::delete('/status/delete/{id}', 'PembayaranController@delete')->name('pembayaran.status.delete');
        Route::post('/metode/store', 'PembayaranController@methodStore')->name('pembayaran.method.store');
        Route::get('/metode/edit/{id}', 'PembayaranController@methodEdit')->name('pembayaran.method.edit');
        Route::post('/metode/update/{id}', 'PembayaranController@methodUpdate')->name('pembayaran.method.update');
        Route::delete('/metode/delete/{id}', 'PembayaranController@methodDelete')->name('pembayaran.method.delete');
    });
        Route::get('/pembayaran/status', 'PembayaranController@index')->name('admin.pembayaran.status');
        Route::get('/pembayaran/metode', 'PembayaranController@methodIndex')->name('admin.pembayaran.method');


    // About
    Route::get('/about', 'AboutController@index')->name('admin.about');
    Route::post('/about/update/{id}', 'AboutController@update')->name('admin.about.update')->middleware('checkRole:admin');;

    // Contact Us
    Route::get('/contact', 'ContactController@index')->name('admin.contact');
    Route::post('/contact/update/{id}', 'ContactController@update')->name('admin.contact.update')->middleware('checkRole:admin');;

    // Bank Account
    Route::group(['as' => 'admin.','prefix' => 'bank_account','middleware' => ['checkRole:admin']], function () {
        Route::post('/store', 'BankAccountController@store')->name('bank.account.store');
        Route::get('/edit/{id}', 'BankAccountController@edit')->name('bank.account.edit');
        Route::post('/update/{id}', 'BankAccountController@update')->name('bank.account.update');
        Route::delete('/delete/{id}', 'BankAccountController@delete')->name('bank.account.delete');
    });
        Route::get('/bank_account', 'BankAccountController@index')->name('admin.bank.account');

    // Bukti Pembayaran
    Route::get('/payment_confirmation/', 'PaymentConfirmationController@index')->name('admin.payment.confirmation');
    Route::delete('/payment_confirmation/delete/{id}', 'PaymentConfirmationController@delete')->name('admin.payment.confirmation.delete')->middleware('checkRole:admin');

    // Transactions
    Route::group(['as' => 'admin.','prefix' => 'transactions','middleware' => ['checkRole:admin']], function () {
        Route::get('/edit/{id}', 'TransactionController@edit')->name('transaction.edit');
        Route::post('/update/{id}', 'TransactionController@update')->name('transaction.update');
        Route::delete('/delete/{id}', 'TransactionController@delete')->name('transaction.delete');
    });
        Route::get('/transactions', 'TransactionController@index')->name('admin.transaction');
        Route::get('/transactions/status/pesanan/edit/{id}', 'TransactionController@editStatus')->name('admin.status.pesanan.edit');
        Route::post('/transactions/update/status/pesanan/{id}', 'TransactionController@updateStatus')->name('admin.transaction.status.update');

    // Site Setting
    Route::get('/site_setting', 'SiteSettingController@index')->name('site.setting.index');
    Route::post('/site_setting/update', 'SiteSettingController@update')->name('site.setting.update')->middleware('checkRole:admin');
});

Route::get('/', 'HomepageController@index')->name('homepage.index');
Route::get('/paket/show/{id}', 'PaketController@show')->name('paket.show');

Route::group(['namespace' => 'Customer', 'middleware' => ['auth','checkRole:customer']], function () {
    Route::post('/transaction/confirmation', 'TransactionController@transactionConfirmation')->name('transaction.confirmation');
    Route::post('/transaction/cancel/{id}', 'TransactionController@transactionCancel')->name('transaction.cancel');
    Route::get('/transaction/show/', 'TransactionController@showTransaction')->name('transaction.show');
    Route::get('/transaction/add/payment/confirmation', 'TransactionController@paymentConfirmation')->name('payment.confirmation');
    Route::post('/transaction/add/payment/confirmation/store', 'TransactionController@paymentConfirmationStore')->name('payment.confirmation.store');
    Route::post('/transaction/add/payment/store/image/{type}/{invoice}', 'TransactionController@confirmationStoreImage')->name('confirmation.store.image');
});

