<?php

use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\OrderdetailController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\TopicController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PurchaseOrdersController;
use App\Http\Controllers\Backend\PurchaseOrderDetailsController;
use App\Http\Controllers\Backend\ShipmentsController;
use App\Http\Controllers\Backend\ShipmentDetailsController;


use App\Http\Controllers\Frontend\CategoryFController;
use App\Http\Controllers\Frontend\PostControllerF;

use App\Models\Brand;
use App\Models\Category;

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

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/danh-muc-san-pham', [CategoryFController::class, 'index'])->name('frontend.category');
Route::get('/view-post/{id}', [PostControllerF::class, 'show'])->name('view_post');



Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [HomeController::class, 'index'])->name('admin');

    Route::prefix('admin')->group(function () {
        Route::get('category/trash', [CategoryController::class, 'trash'])->name('category.trash');
        Route::get('category/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('category/restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
        Route::resource('category', CategoryController::class);

        Route::get('brand/trash', [BrandController::class, 'trash'])->name('brand.trash');
        Route::get('brand/delete/{brand}', [BrandController::class, 'delete'])->name('brand.delete');
        Route::get('brand/restore/{brand}', [BrandController::class, 'restore'])->name('brand.restore');
        Route::resource('brand', BrandController::class);

        Route::get('product/trash', [ProductController::class, 'trash'])->name('product.trash');
        Route::get('product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('product/restore/{product}', [ProductController::class, 'restore'])->name('product.restore');
        Route::resource('product', ProductController::class);
        
        Route::get('post/trash', [PostController::class, 'trash'])->name('post.trash');
        Route::get('post/delete/{post}', [PostController::class, 'delete'])->name('post.delete');
        Route::get('post/restore/{post}', [PostController::class, 'restore'])->name('post.restore');
        Route::resource('post', PostController::class);

        Route::get('topic/trash', [TopicController::class, 'trash'])->name('topic.trash');
        Route::get('topic/delete/{topic}', [TopicController::class, 'delete'])->name('topic.delete');
        Route::get('topic/restore/{topic}', [TopicController::class, 'restore'])->name('topic.restore');
        Route::resource('topic', TopicController::class);

        Route::get('contact/trash', [ContactController::class, 'trash'])->name('contact.trash');
        Route::get('contact/delete/{contact}', [ContactController::class, 'delete'])->name('contact.delete');
        Route::get('contact/restore/{contact}', [ContactController::class, 'restore'])->name('contact.restore');
        Route::resource('contact', ContactController::class);

        Route::get('banner/trash', [BannerController::class, 'trash'])->name('banner.trash');
        Route::get('banner/delete/{banner}', [BannerController::class, 'delete'])->name('banner.delete');
        Route::get('banner/restore/{banner}', [BannerController::class, 'restore'])->name('banner.restore');
        Route::resource('banner', BannerController::class);

        Route::get('page/trash', [PageController::class, 'trash'])->name('page.trash');
        Route::get('page/delete/{page}', [PageController::class, 'delete'])->name('page.delete');
        Route::get('page/restore/{page}', [PageController::class, 'restore'])->name('page.restore');
        Route::resource('page', PageController::class);

        Route::get('user/trash', [UserController::class, 'trash'])->name('user.trash');
        Route::get('user/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
        Route::get('user/restore/{user}', [UserController::class, 'restore'])->name('user.restore');
        Route::resource('user', UserController::class);

        Route::get('customer/trash', [CustomerController::class, 'trash'])->name('customer.trash');
        Route::get('customer/delete/{customer}', [CustomerController::class, 'delete'])->name('customer.delete');
        Route::get('customer/restore/{customer}', [CustomerController::class, 'restore'])->name('customer.restore');
        Route::resource('customer', CustomerController::class);

        Route::get('menu/trash', [MenuController::class, 'trash'])->name('menu.trash');
        Route::get('menu/delete/{menu}', [MenuController::class, 'delete'])->name('menu.delete');
        Route::get('menu/restore/{menu}', [MenuController::class, 'restore'])->name('menu.restore');
        Route::resource('menu', MenuController::class);

        Route::get('order/trash', [OrderController::class, 'trash'])->name('order.trash');
        Route::get('order/delete/{order}', [OrderController::class, 'delete'])->name('order.delete');
        Route::get('order/restore/{order}', [OrderController::class, 'restore'])->name('order.restore');
        Route::resource('order', OrderController::class);

        Route::get('orderdetail/trash', [OrderdetailController::class, 'trash'])->name('orderdetail.trash');
        Route::get('orderdetail/delete/{order}', [OrderdetailController::class, 'delete'])->name('orderdetail.delete');
        Route::get('orderdetail/restore/{order}', [OrderdetailController::class, 'restore'])->name('orderdetail.restore');
        Route::resource('orderdetail', OrderdetailController::class);

        Route::get('purchaseOrders/trash', [PurchaseOrdersController::class, 'trash'])->name('purchaseOrders.trash');
        Route::get('purchaseOrders/delete/{purchaseOrders}', [PurchaseOrdersController::class, 'delete'])->name('purchaseOrders.delete');
        Route::get('purchaseOrders/restore/{purchaseOrders}', [PurchaseOrdersController::class, 'restore'])->name('purchaseOrders.restore');
        Route::resource('purchaseOrders', PurchaseOrdersController::class);

        Route::get('purchaseOrderDetails/trash', [PurchaseOrderDetailsController::class, 'trash'])->name('purchaseOrderDetails.trash');
        Route::get('purchaseOrderDetails/delete/{purchaseOrderDetails}', [PurchaseOrderDetailsController::class, 'delete'])->name('purchaseOrderDetails.delete');
        Route::get('purchaseOrderDetails/restore/{purchaseOrderDetails}', [PurchaseOrderDetailsController::class, 'restore'])->name('purchaseOrderDetails.restore');
        Route::resource('purchaseOrderDetails', PurchaseOrderDetailsController::class);

        Route::get('shipments/trash', [ShipmentsController::class, 'trash'])->name('shipments.trash');
        Route::get('shipments/delete/{shipments}', [ShipmentsController::class, 'delete'])->name('shipments.delete');
        Route::get('shipments/restore/{shipments}', [ShipmentsController::class, 'restore'])->name('shipments.restore');
        Route::resource('shipments', ShipmentsController::class);


        Route::get('shipmentDetails/trash', [ShipmentDetailsController::class, 'trash'])->name('shipmentDetails.trash');
        Route::get('shipmentDetails/delete/{shipmentDetails}', [ShipmentDetailsController::class, 'delete'])->name('shipmentDetails.delete');
        Route::get('shipmentDetails/restore/{shipmentDetails}', [ShipmentDetailsController::class, 'restore'])->name('shipmentDetails.restore');
        Route::resource('shipmentDetails', ShipmentDetailsController::class);

    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

