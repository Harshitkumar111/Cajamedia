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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['Admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');
    Route::get('/member', [App\Http\Controllers\Admin\AddSupplierController::class, 'index'])->name('member');
    Route::get('/fetchuser', [App\Http\Controllers\Admin\AddSupplierController::class, 'mamber'])->name('fetchuser');
    Route::POST('/addmember', [App\Http\Controllers\Admin\AddSupplierController::class, 'addmember'])->name('addmember');
    Route::POST('/allmamber', [App\Http\Controllers\Admin\AddSupplierController::class, 'allmamber'])->name('allmamber');
    Route::get('/deletemember/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'deletemember'])->name('deletemember/{id}');
    Route::get('/editmember/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'editmember'])->name('editmember/{id}');
    Route::POST('/updatemember/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'updatemember'])->name('updatemember/{id}');
  
//   city user--------------
  
    Route::get('/city', [App\Http\Controllers\Admin\AddSupplierController::class, 'citys'])->name('city');
    Route::get('/deletecity/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'deletecity'])->name('deletecity/{id}');
    Route::get('/addcity', [App\Http\Controllers\Admin\AddSupplierController::class, 'addcitys'])->name('addcity');
    Route::POST('/savecity', [App\Http\Controllers\Admin\AddSupplierController::class, 'savecity'])->name('savecity');
    Route::get('/editcity/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'editcity'])->name('editcity/{id}');
    Route::POST('/editcitysave/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'editcitysave'])->name('editcitysave/{id}');
// state=================
    Route::get('/state', [App\Http\Controllers\Admin\AddSupplierController::class, 'state'])->name('state');
    Route::get('/deletestate/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'deletestate'])->name('deletestate/{id}');
    Route::get('/editstate/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'editstate'])->name('editstate/{id}');
    Route::POST('/editstatesave/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'editstatesave'])->name('editstatesave/{id}');
    Route::get('/addstate', [App\Http\Controllers\Admin\AddSupplierController::class, 'addstate'])->name('addstate');
    Route::POST('/savestate', [App\Http\Controllers\Admin\AddSupplierController::class, 'addstatesave'])->name('savestate');
// country---------------------
    Route::get('/country', [App\Http\Controllers\Admin\AddSupplierController::class, 'country'])->name('country');
    Route::get('/deletecounrty/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'deletecountry'])->name('country/{id}');
    Route::get('/editcountry/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'editcountry'])->name('editcountry/{id}');
    Route::POST('/editcountrysave/{id}', [App\Http\Controllers\Admin\AddSupplierController::class, 'editcountrysave'])->name('editcountrysave/{id}');
    Route::get('/addcountry', [App\Http\Controllers\Admin\AddSupplierController::class, 'addcountry'])->name('addcountry');
    Route::POST('/savecountry', [App\Http\Controllers\Admin\AddSupplierController::class, 'savecountry'])->name('savecountry');

// manage product-------------    
   Route::get('/product', [App\Http\Controllers\Admin\ManageProductController::class, 'index'])->name('product');
   Route::get('/addproduct', [App\Http\Controllers\Admin\ManageProductController::class, 'addproduct'])->name('addproduct');
   Route::POST('/saveproduct', [App\Http\Controllers\Admin\ManageProductController::class, 'saveproduct'])->name('saveproduct');
   Route::get('/deleteproduct/{id}', [App\Http\Controllers\Admin\ManageProductController::class, 'deleteproduct'])->name('deleteproduct/{id}');
   Route::get('/editproduct/{id}', [App\Http\Controllers\Admin\ManageProductController::class, 'editproduct'])->name('editproduct/{id}');
   Route::POST('/updateproduct/{id}', [App\Http\Controllers\Admin\ManageProductController::class, 'updateproduct'])->name('updateproduct/{id}');


  
//  Product_category-------------------
    Route::get('/product_category', [App\Http\Controllers\Admin\ManageProductController::class, 'Product_category'])->name('product_category');
    Route::get('/add_Product_category', [App\Http\Controllers\Admin\ManageProductController::class, 'add_Product_category'])->name('add_Product_category');
    Route::POST('/savecatrgory', [App\Http\Controllers\Admin\ManageProductController::class, 'savecatrgory'])->name('savecatrgory');
    Route::get('/deletecategory/{id}', [App\Http\Controllers\Admin\ManageProductController::class, 'deletecategory'])->name('deletecategory{id}');
    Route::get('/editcategory/{id}', [App\Http\Controllers\Admin\ManageProductController::class, 'editcategory'])->name('editcategory/{id}');
    Route::POST('/updatecategory/{id}', [App\Http\Controllers\Admin\ManageProductController::class, 'updatecategory'])->name('updatecategory/{id}');
 
// discount discount-----------------------

Route::get('/discount', [App\Http\Controllers\Admin\ManageProductController::class, 'discount'])->name('discount');
Route::get('/adddiscount', [App\Http\Controllers\Admin\ManageProductController::class, 'adddiscount'])->name('adddiscount');
Route::POST('/savediscount', [App\Http\Controllers\Admin\ManageProductController::class, 'savediscount'])->name('savediscount');
Route::get('/deletediscount/{id}', [App\Http\Controllers\Admin\ManageProductController::class, 'deletediscount'])->name('deletediscount/{id}');
Route::get('/editdiscount/{id}', [App\Http\Controllers\Admin\ManageProductController::class, 'editdiscount'])->name('editdiscount/{id}');
Route::POST('/updatediscount/{id}', [App\Http\Controllers\Admin\ManageProductController::class, 'updatediscount'])->name('updatediscount/{id}');

// Order Managment ----------------------------- 
Route::get('/order', [App\Http\Controllers\Admin\OrderManagmentController::class, 'order'])->name('order');


// payment detail---------------------------------------
Route::get('/payment', [App\Http\Controllers\Admin\OrderManagmentController::class, 'payment'])->name('payment');
Route::get('/delete_payment/{id}', [App\Http\Controllers\Admin\OrderManagmentController::class, 'delete_payment_details'])->name('delete_payment/{id}');
Route::get('/edit_payment/{id}', [App\Http\Controllers\Admin\OrderManagmentController::class, 'edit_payment_details'])->name('edit_payment/{id}');
Route::POST('/update_payment_details/{id}', [App\Http\Controllers\Admin\OrderManagmentController::class, 'update_payment_details'])->name('update_payment_details/{id}');

// contact managment------------------------------------
Route::get('/contact', [App\Http\Controllers\Admin\ContactManagmentController::class, 'contact'])->name('contact');
Route::get('/deletecontact/{id}', [App\Http\Controllers\Admin\ContactManagmentController::class, 'deletecontact'])->name('deletecontact/{id}');


});
Route::middleware(['User'])->group(function () {
    Route::get('/user', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('user');

});
Route::middleware(['Supplier'])->group(function () {
    Route::get('/supplier', [App\Http\Controllers\Supplier\DashboardController::class, 'index'])->name('supplier');

});
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
