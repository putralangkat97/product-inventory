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

                // Stock Route
                Route::prefix('/stock')
                    ->name('stock.')
                    ->controller(\App\Http\Controllers\StockController::class)
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::get('/{stock}/edit', 'edit')->name('edit');
                        Route::get('/{stock}/detail', 'show')->name('show');
                    });
            });
    });
