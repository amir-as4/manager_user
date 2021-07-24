<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProductMetaDescriptionController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeCategoryController;
use App\Http\Controllers\Home\HomeCommentController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\HomeProductsController;
use App\Http\Controllers\Home\UserProfileController;
use App\Http\Controllers\Home\WishlistController;
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

Route::get('/admin-panel/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::prefix('admin-panel/management')->name('admin.')->group(function () {
    Route::resource('/brands', BrandController::class);
    Route::resource('/attributes', AttributeController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/banners', BannerController::class);
    Route::resource('/descriptions', ProductMetaDescriptionController::class);
    Route::resource('/comments', Commentcontroller::class);
    // change approve comments
    Route::get('/comments/{comment}/change-approve', [CommentController::class, 'changeApprove'])->name('comments.change-approve');
    // get category attributes
    Route::get('/category-attributes/{category}', [CategoryController::class, 'getCategoryAttribute']);
    // Edit Product Image
    Route::get('/products/{product}/images-edit', [ProductImageController::class, 'edit'])->name('products.images.edit');
    Route::delete('/products/{product}/images-destroy', [ProductImageController::class, 'destroy'])->name('products.images.destroy');
    Route::put('/products/{product}/images-set-primary', [ProductImageController::class, 'setPrimary'])->name('products.images.set_primary');
    Route::post('/products/{product}/images-add', [ProductImageController::class, 'add'])->name('products.images.add');
    // Edit Product Category
    Route::get('/products/{product}/category-edit', [ProductController::class, 'editCategory'])->name('products.category.edit');
    Route::put('/products/{product}/category-update', [ProductController::class, 'updateCategory'])->name('products.category.update');
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
//Route::get('/',[HomeController::class,'index'])->middleware( 'verified')->name('home.index');
// با متد بالا وفعال کردن ارسال ایمیل تایید برای کاربران به کاربر اجازه ورود به صفحه اصلی را هم نمی هد
Route::get('/categories/{category:slug}', [HomeCategoryController::class, 'show'])->name('home.categories.show');
Route::get('products/{product:slug}', [HomeProductsController::class, 'show'])->name('home.products.show');
Route::post('comments/{product}', [HomeCommentController::class, 'store'])->name('home.comments.store');
Route::post('comments/{product}/{parentId}', [HomeCommentController::class, 'reply'])->name('home.comments.reply');
Route::get('/login/{provider}', [AuthController::class, 'redirectToProvider'])->name('provider.login');
Route::get('/login/{provider}/callback', [AuthController::class, 'handleProviderCallback']);
Route::get('/add-to-wishlist/{product}', [WishlistController::class, 'add'])->name('home.wishlist.add');

Route::prefix('profile')->name('home.')->group(function () {
    Route::get('/', [UserProfileController::class, 'index'])->name('users_profile.index');
    Route::get('/comments', [HomeCommentController::class, 'usersProfileIndex'])->name('comments.users_profile.index');
});
