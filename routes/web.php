<?php

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

Route::group(['prefix' => requestedLocale()], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::group(['prefix' => 'customer'], function () {
        Route::post('/log-in', 'CustomerAuth@logIn')
             ->name('customer.sign-in');
        Route::post('/log-out', 'CustomerAuth@logOut')
             ->name('customer.sign-out');
    });

    Route::get('/stages', 'StagesController@index')
        ->name('stages.index')
        ->middleware('auth.customer');

    Route::get('/stages/{number}', 'StagesController@show')
         ->where(['number' => '[0-9]{1}'])
         ->name('stages.show')
         ->middleware('auth.customer');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::group(['middleware' => 'auth'], function () {
            Route::get('/', function () {
                return view('admin.main');
            })->name('admin.main');

            Route::resource('purchases', 'PurchasesController');
            Route::put('/purchases/{id}/archive', 'PurchasesController@archive')
                ->name('purchases.archive');
            Route::put('/purchases/{id}/restore', 'PurchasesController@restore')
                ->name('purchases.restore');

            Route::post('/purchases/{purchase_id}/stages/{stage_number}/attachments', 'PurchasesController@attachmentsStore')
                ->name('attachments.store');
            Route::delete('/attachments/{attachment_id}', 'PurchasesController@attachmentsDestroy')
                ->name('attachments.destroy');

            Route::post('/purchases/{purchase_id}/stages/{stage_number}', 'PurchasesController@addEndDate')
                ->name('stage.store-date');

            Route::resource('users', 'UsersController');
        });

        Route::get('/users/{email_token}/verification', 'UsersController@verify')
             ->name('users.verification');
    });

    Auth::routes();
});


