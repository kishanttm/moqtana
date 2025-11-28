<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContractCmsController;
use App\Http\Controllers\Admin\MiscCmsController;
use App\Http\Controllers\Admin\ServiceOrderController;
use App\Http\Controllers\Admin\TranslationCmsController;
use App\Http\Controllers\Admin\TestController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Superadmin area - user management
    Route::middleware(['role:superadmin'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', UserController::class);
        Route::get('contract-cms', [ContractCmsController::class, 'index'])->name('contract.cms');
        Route::post('contract-cms', [ContractCmsController::class, 'store'])->name('contract.cms.store');
        Route::get('/misc-cms', [MiscCmsController::class, 'index'])->name('misc-cms.index');
        Route::post('/misc-cms', [MiscCmsController::class, 'store'])->name('misc-cms.store');
        Route::get('/translations-cms', [TranslationCmsController::class, 'index'])->name('translations-cms.index');
        Route::post('/translations-cms', [TranslationCmsController::class, 'store'])->name('translations-cms.store');
    });

    Route::middleware(['role:superadmin|tech manager|user'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('service-orders/signature-content/{id}', [ServiceOrderController::class, 'getSignatureContent'])->name('service-orders.signature-content');
        Route::post('service-orders/upload-signature', [ServiceOrderController::class, 'uploadSignature'])->name('service-orders.upload-signature');
        Route::post('service-orders/submit', [ServiceOrderController::class, 'submitOrder'])->name('service-orders.submit');
        Route::resource('service-orders', ServiceOrderController::class);
        Route::get('clients/get-by-id/{client}', [ClientController::class, 'getById'])->name('clients.getById');

        Route::resource('tests', TestController::class);
    });

    Route::middleware(['role:superadmin|tech manager'])->prefix('admin')->name('admin.')->group(function () {
        Route::resource('tests', TestController::class);
    });
    
    // Clients CRUD - Superadmin and Tech Manager
    Route::middleware(['role:superadmin'])->prefix('admin')->group(function () {
        Route::resource('clients', ClientController::class);
        Route::get('/clients/{client}/json', function (App\Models\Client $client) {
            return response()->json($client);
        })->name('clients.json');
    });
});
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
});
Route::get('/migrate-fresh', function () {
    Artisan::call('migrate:fresh');
});

Route::get('/seed', function () {
    Artisan::call('db:seed');
});
Route::get('/seed/{class}', function ($class) {

    $className = "Database\\Seeders\\{$class}";

    Artisan::call('db:seed', [
        '--class' => $className
    ]);

    return "Seeder {$class} executed successfully!";
});
Route::get('/optimize', function () {
    Artisan::call('optimize');
});
Route::get('/config-clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
});
require __DIR__.'/auth.php';
