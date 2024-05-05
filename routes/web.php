<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductController as ProductFront;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
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
//route login
Route::get('/login', [AuthController::class, 'index'])->name('login');
//->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'process']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('back');

// route dashboard

// Route::get('/dashboard', function(){
// return view('dashboard.dashboard');
// })->name('dashboard');

// Route::get('/user/dashboard', [DashboardController::class, 'index'])
//   // ->middleware('auth')
//   ;

//  Route::get('/', [DashboardController::class, 'index'])
// //  ->middleware('auth')
//  ;

// //route barang
// Route::resource('/barang', BarangController::class)

// // ->middleware('auth')
// ;
Route::get('/verify/{token}', [AuthController::class, 'verify']);

Route::get('reset/{token}', [AuthController::class, 'reset']);


Route::post('reset/{token}', [AuthController::class, 'auth_reset']);


Route::get('/forgot-password', [AuthController::class, 'forgot_password']);

Route::post('/forgot-password', [AuthController::class, 'auth_forgot_password']);





Route::middleware(['auth','user-role:user'])->group(function()
{
    Route::get('/user/dashboard',[DashboardController::class, 'userHome'])->name('home');
});


Route::middleware(['auth', 'user-role:moderator'])->group(function() {
    Route::get('/moderator/dashboard', [DashboardController::class, 'moderatorHome'])->name('home.moderator');
});



Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get('/admin/dashboard',[DashboardController::class, 'adminHome'])->name('home.admin');
});





Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get('/admin/list',[AdminController::class, 'list']);
});



Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get('/admin/add',[AdminController::class, 'add']);
});


Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::post('/admin/add',[AdminController::class, 'insert']);

Route::get('/admin/edit/{id}',[AdminController::class, 'edit']);

Route::get('/admin/delete/{id}',[AdminController::class, 'delete']);

Route::post('/admin/edit/{id}',[AdminController::class, 'update']);




Route::get('/admin/category/list',[CategoryController::class, 'list']);
Route::get('/admin/category/add',[CategoryController::class, 'add']);
Route::post('/admin/category/add',[CategoryController::class, 'insert']);

Route::get('/admin/category/edit/{id}',[CategoryController::class, 'edit']);

Route::get('/admin/category/delete/{id}',[CategoryController::class, 'delete']);

Route::post('/admin/category/edit/{id}',[CategoryController::class, 'update']);




Route::get('/admin/subcategory/list',[SubCategoryController::class, 'list']);
Route::get('/admin/subcategory/add',[SubCategoryController::class, 'add']);
Route::post('/admin/subcategory/add',[SubCategoryController::class, 'insert']);

Route::get('/admin/subcategory/edit/{id}',[SubCategoryController::class, 'edit']);

Route::get('/admin/subcategory/delete/{id}',[SubCategoryController::class, 'delete']);

Route::post('/admin/subcategory/edit/{id}',[SubCategoryController::class, 'update']);

Route::post('/admin/get_sub_category', [SubCategoryController::class, 'get_sub_category']);




Route::get('/admin/product/list',[ProductController::class, 'list']);
Route::get('/admin/product/add',[ProductController::class, 'add']);

Route::post('/admin/product/add',[ProductController::class, 'insert']);

Route::get('/admin/product/edit/{id}',[ProductController::class, 'edit']);

Route::get('/admin/product/delete/{id}',[ProductController::class, 'delete']);

Route::post('/admin/product/edit/{id}',[ProductController::class, 'update']);


Route::get('/admin/product/image_delete/{id}',[ProductController::class, 'image_delete']);
Route::post('/admin/product_image_sortable',[ProductController::class, 'product_image_sortable']);

Route::get('/admin/brand/list',[BrandController::class, 'list']);
Route::get('/admin/brand/add',[BrandController::class, 'add']);
Route::post('/admin/brand/add',[BrandController::class, 'insert']);

Route::get('/admin/brand/edit/{id}',[BrandController::class, 'edit']);

Route::get('/admin/brand/delete/{id}',[BrandController::class, 'delete']);

Route::post('/admin/brand/edit/{id}',[BrandController::class, 'update']);




Route::get('/admin/color/list',[ColorController::class, 'list']);
Route::get('/admin/color/add',[ColorController::class, 'add']);
Route::post('/admin/color/add',[ColorController::class, 'insert']);

Route::get('/admin/color/edit/{id}',[ColorController::class, 'edit']);

Route::get('/admin/color/delete/{id}',[ColorController::class, 'delete']);

Route::post('/admin/color/edit/{id}',[ColorController::class, 'update']);








});



Route::get('/',[HomeController::class, 'home']);

Route::get('/cart', [PaymentController::class, 'view_cart']);
Route::post('/update_cart', [PaymentController::class, 'update_cart']);
Route::get('/cart/delete/{id}', [PaymentController::class, 'cart_delete']);

Route::get('/checkout', [PaymentController::class, 'checkout']);

Route::get('{slug?}/{subslug?}',[ProductFront::class, 'getCategory']);




Route::post('/search', [ProductFront::class, 'getProductSearch'])->name('product.search');


Route::post('get_filter_product_ajax',[ProductFront::class, 'getFilterProductAjax']);



Route::post('product/add-to-cart',[PaymentController::class, 'add_to_cart']);





