<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProductController;

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

// Auth::routes();

Route::controller(AuthController::class)->group(function ($router) {
    Route::get('login', 'index');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
});

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return true;
});

Route::middleware('auth')->group(function () {
    Route::middleware('verified')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);

        // ADMINS ROUTES
        // Route::middleware('admin')->group(function () {
            //     Route::get('update-units-sold/',[ProductController::class, 'updateUnitsSold']);
            
            //     // Suppliers Routes
            //     Route::prefix('suppliers')->group(function () {
                //         Route::get('/',[SupplierController::class, 'index'])->name('suppliers');
                //         Route::get('/datatable',[SupplierController::class, 'suppliersDatatable'])->name('suppliers.datatable');
                //         Route::post('/add',[SupplierController::class, 'addSuppliers'])->name('suppliers.add');
                //         Route::get('/modal/edit/{id}',[SupplierController::class, 'suppliersModalEdit'])->name('suppliers.modal.edit');
                //         Route::post('/edit/{id}',[SupplierController::class, 'editSuppliers'])->name('suppliers.edit');
                //         Route::delete('/delete/{id}',[SupplierController::class, 'deleteSuppliers'])->name('suppliers.delete');
                //     });
        // });

        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); 
            Route::get('/filter/{id}', [DashboardController::class, 'filterByProject'])->name('dashboard.filter'); 
        });

        Route::prefix('project')->group(function () {
            Route::get('/', [ProjectController::class, 'index'])->name('project');
            Route::get('/datatable/{id}', [ProjectController::class, 'setDatatable'])->name('project.datatable');         
        });

        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('product');
            Route::get('/modal/incoming/{id}', [ProductController::class, 'incomingModal'])->name('product.modal.incoming');         
            Route::post('/incoming', [ProductController::class, 'incoming'])->name('product.incoming');
            Route::get('/modal/outgoing/{id}', [ProductController::class, 'outgoingModal'])->name('product.modal.outgoing');         
            Route::post('/outgoing', [ProductController::class, 'outgoing'])->name('product.outgoing');
            Route::get('/datatable/{project}', [ProductController::class, 'setDatatable'])->name('product.datatable');         
        });
    });
});

