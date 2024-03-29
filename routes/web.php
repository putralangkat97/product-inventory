<?php

use Illuminate\Support\Facades\Route;

// Auth Route
require __DIR__ . '/auth.php';
Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth'])
    ->group(function () {
        // Dashboard Route
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // Profile Route
        Route::prefix('/profile')
            ->name('profile.')
            ->controller(\App\Http\Controllers\ProfileController::class)
            ->group(function () {
                Route::get('/', 'edit')->name('edit');
                Route::patch('/', 'update')->name('update');
                Route::delete('/', 'destroy')->name('destroy');
            });

        // Stock Route
        Route::prefix('/stock')
            ->name('stock.')
            ->controller(\App\Http\Controllers\StockController::class)
            ->group(function () {
                Route::middleware([
                    'role:superadmin|user',
                    'permission:view stock'
                ])->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/{stock}/detail', 'show')->name('show');
                });
                Route::middleware(['role:superadmin'])
                    ->group(function () {
                        Route::get('/create', 'create')->name('create');
                        Route::get('/{stock}/edit', 'edit')->name('edit');
                    });
            });

        Route::prefix('/stock-request')
            ->name('stock-request.')
            ->controller(\App\Http\Controllers\StockRequestController::class)
            ->group(function () {
                Route::middleware([
                    'role:staff|user|superadmin',
                    'permission:view stock request|accept stock request|reject stock request'
                ])->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/history', 'history')->name('history');
                });
                Route::middleware([
                    'role:user|staff',
                    'permission:create stock request|edit stock request|view stock request|delete stock request'
                ])->group(function () {
                    Route::get('/{stock}/create-request', 'create')->name('create');
                    Route::get('/{stock}/{stock_request}/detail-request', 'show')->name('show');
                    Route::get('/{stock}/{stock_request}/edit-request', 'edit')->name('edit');
                });
            });

        Route::middleware('role:superadmin')
            ->group(function () {
                // User Route
                Route::prefix('/user')
                    ->name('user.')
                    ->controller(\App\Http\Controllers\UserController::class)
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::get('/{id}/edit', 'edit')->name('edit');
                        Route::get('/{id}/detail', 'show')->name('show');
                    });

                // Role Route
                Route::prefix('/role')
                    ->name('role.')
                    ->controller(\App\Http\Controllers\RoleController::class)
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::get('/{role}/edit', 'edit')->name('edit');
                        Route::get('/{role}/detail', 'show')->name('show');
                    });

                // Satuan Route
                Route::prefix('/satuan')
                    ->name('satuan.')
                    ->controller(\App\Http\Controllers\SatuanController::class)
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::get('/{satuan}/edit', 'edit')->name('edit');
                        Route::get('/{satuan}/detail', 'show')->name('show');
                    });
            });
    });
