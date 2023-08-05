<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminSubCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBrandController;

Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
        Route::group(['middleware' => 'check.user.type'], function () {
            //Route::get('/', [HomeController::class, 'redirect'])->name('dashboard');
            //home
            Route::get('/admin_home', [AdminHomeController::class, 'index'])->name('home_index');
            Route::post('/admin_home_create', [AdminHomeController::class, 'create'])->name('home_create');
            Route::post('/admin_home_update/{id}', [AdminHomeController::class, 'update'])->name('home_edit');
            Route::get('/admin_home_delete/{id}', [AdminHomeController::class, 'delete'])->name('home_delete');
            //company
            Route::get('/admin_company', [AdminCompanyController::class, 'index'])->name('company_index');
            Route::get('/admin_company_create', [AdminCompanyController::class, 'create'])->name('company_create');
            Route::post('/admin_company_store', [AdminCompanyController::class, 'store'])->name('company_store');
            Route::get('/admin_company_edit/{id}', [AdminCompanyController::class, 'edit'])->name('company_edit');
            Route::post('/admin_company_update/{id}', [AdminCompanyController::class, 'update'])->name('company_update');
            Route::get('/admin_company_delete/{id}', [AdminCompanyController::class, 'delete'])->name('company_delete');
            //brands
            Route::get('/admin_brand', [AdminBrandController::class, 'index'])->name('brand_index');
            Route::post('/admin_brand_store', [AdminBrandController::class, 'store'])->name('brand_store');
            Route::post('/admin_brand_update/{id}', [AdminBrandController::class, 'update'])->name('brand_edit');
            Route::get('/admin_brand_delete/{id}', [AdminBrandController::class, 'delete'])->name('brand_delete');
            //category
            Route::get('/admin_category', [AdminCategoryController::class, 'index'])->name('category_index');
            Route::post('/admin_category_store', [AdminCategoryController::class, 'store'])->name('category_store');
            Route::post('/admin_category_update/{id}', [AdminCategoryController::class, 'update'])->name('category_edit');
            Route::get('/admin_category_delete/{id}', [AdminCategoryController::class, 'delete'])->name('category_delete');
            Route::get('/admin_subcategory_load', [AdminCategoryController::class, 'getSubcategories'])->name('getSubcategories');
            //subcategory
            Route::get('/admin_subcategory', [AdminSubCategoryController::class, 'index'])->name('subcategory_index');
            Route::post('/admin_subcategory_store', [AdminSubCategoryController::class, 'store'])->name('subcategory_store');
            Route::post('/admin_subcategory_update/{id}', [AdminSubCategoryController::class, 'update'])->name('subcategory_edit');
            Route::get('/admin_subcategory_delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('subcategory_delete');
            //product
            Route::get('/admin_product', [AdminProductController::class, 'index'])->name('product_index');
            Route::get('/admin_product_create', [AdminProductController::class, 'create'])->name('product_create');
            Route::post('/admin_product_store', [AdminProductController::class, 'store'])->name('product_store');
            Route::post('/admin_product_doc_insert/{id}', [AdminProductController::class, 'admin_product_doc_insert'])->name('admin_product_doc_insert');
            Route::get('/admin_product_edit/{id}', [AdminProductController::class, 'edit'])->name('product_edit');
            Route::post('/admin_product_update/{id}', [AdminProductController::class, 'update'])->name('product_edit');
            Route::post('/update_product_single_data/{id}', [AdminProductController::class, 'update_product_single_data'])->name('update_product_single_data');
            Route::post('/admin_product_doc_update/{id}', [AdminProductController::class, 'admin_product_doc_update'])->name('admin_product_doc_update');
            Route::get('/admin_product_delete/{id}', [AdminProductController::class, 'delete'])->name('product_delete');
            Route::get('/admin_product_doc_delete/{id}', [AdminProductController::class, 'admin_product_doc_delete'])->name('admin_product_doc_delete');
            Route::get('/check_promo_code', [AdminProductController::class, 'check_promo_code'])->name('check_promo_code');
            Route::get('/get_ebay_data', [AdminProductController::class, 'get_ebay_data'])->name('get_ebay_data');
            Route::get('/admin_product_update_for_api/{id}', [AdminProductController::class, 'admin_product_update_for_api'])->name('admin_product_update_for_api');
            //user
            Route::get('/admin_users', [AdminUserController::class, 'index'])->name('users_index');
            Route::get('/admin_user_delete/{id}', [AdminUserController::class, 'delete'])->name('user_delete');
        });    
    });
});

Route::get('/', [HomeController::class, 'redirect']);



