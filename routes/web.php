<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\UserController;


use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\LessonController;
use App\Http\Controllers\Backend\OrderController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CommentController;

use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\LessonCheckController;

use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web Routes for your application. These
| Routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*===========================================
Frontend Routes
===========================================*/

// HomePage Route
Route::get('/',[HomeController::class, 'index'])->name('home');


/*===========================================
Auth Routes
===========================================*/

//User Auth Route
Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
       Route::view('/login','auth.login')->name('login');
       Route::view('/register','auth.register')->name('register');
       Route::post('/create',[UserController::class,'create'])->name('create');
       Route::post('/check',[UserController::class,'check'])->name('check');
 
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::view('/dashboard','frontend.pages.home.index')->name('home');
        Route::get('/profile',[UserController::class, 'UserProfile'])->name('profile');
        Route::get('/logout',[UserController::class,'logout'])->name('logout');
    });

});

//Ajax login Route
Route::post('/user-check',[UserController::class,'AjaxUserLogin']);

//Admin Auth Route
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
       Route::view('/login','auth.admin_login')->name('login');
       Route::view('/register','admin.register')->name('register');
       Route::post('/create',[AdminController::class,'create'])->name('create');
       Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/dashboard','admin.pages.home.index')->name('dashboard.home')->middleware('auth:admin'); 
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::get('/profile',[AdminController::class,'profile'])->name('profile');
        Route::get('/profile/edit',[AdminController::class,'editprofile'])->name('profile_edit');
        Route::post('/profile/store',[AdminController::class,'storeprofile'])->name('profile_store');
    });
    
});

// **** COURSES ROUTES ****

// course view ajax modal
Route::get('/course/view/modal/{id}',[HomeController::class, 'CourseViewAjax']); 

// Course detail Routes
Route::get('/course/details/{id}/{slug}',[HomeController::class, 'CourseDetails']); 

// Course categories Routes
Route::get('/course/categories/{id}/{slug}',[HomeController::class, 'CourseCategories']); 

// Course subsubcategories Routes
Route::get('/course/subsubcategories/{id}/{slug}',[HomeController::class, 'CourseSubSubCategories']); 

// Course subcategories Routes
Route::get('/course/subcategories/{id}/{slug}',[HomeController::class, 'CourseSubCategories']); 

// **** OTHERS ROUTES ****

// Course Sell Routes
Route::get('/selling/course',[HomeController::class, 'CourseSell']); 
// Course News Routes
Route::get('/new/course',[HomeController::class, 'CourseNew']);
// Course Sell Routes
Route::get('/top/course',[HomeController::class, 'CourseTop']); 



// **** ADD TO CART ROUTES ****

// add to cart store Data
Route::post('/cart/data/store/{id}',[CartController::class, 'AddToCart']); 

// product view mini cart AJAX
Route::get('/product/mini/cart/',[CartController::class, 'MiniCart']); 

// product remove mini cart AJAX
Route::get('/minicart/product-remove/{rowId}',[CartController::class, 'RemoveMiniCart']); 

// Cart view Route
 Route::get('/user/cart', [CartController::class, 'CartView'])->name('cart.view');

// view product to cart AJAX
 Route::get('/user/get-cart-product',[CartController::class, 'GetCartProduct']);

// **** ADD TO WISHLIST ROUTES ****

// product add-to-wishlist AJAX
Route::post('/add-to-wishlist/{product_id}',[WishlistController::class, 'AddToWishlist']); 

// **** CHECKOUT ROUTES ****

    // checkout view Route
    Route::get('/checkout', [CheckoutController::class, 'checkoutView'])->name('checkout');

    // checkout store Route
   Route::post('/checkout/store', [CheckoutController::class, 'checkoutStore'])->name('checkout.store');

   Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){

        // Wishlist view Route
        Route::get('/wishlist', [WishlistController::class, 'wishlistView'])->name('wishlist');

        // view product to wishlist AJAX
        Route::get('/get-wishlist-product',[WishlistController::class, 'GetWishlistProduct']);

        // remove product to wishlist AJAX
        Route::get('/remove-wishlist-product/{rowId}',[WishlistController::class, 'DeleteWishlistProduct']);
   });
});
// count product to wishlist AJAX
Route::get('/get-wishlist-count',[WishlistController::class, 'GetWishlistcount']);


// **** AJAX REVIEW ROUTES ****

Route::post('/review/course/store',[CommentController::class, 'StoreCourseComment']);

Route::get('/review/course/count/{id}',[CommentController::class, 'CountCourseComment']);

// course lesson-suivi AJAX
Route::post('/lesson-suivi/{lesson_id}',[LessonCheckController::class, 'AddToLessonSuivi']); 

// course vieww count AJAX
Route::post('/course-view-count/{course_id}',[LessonCheckController::class, 'CourseViewCount']); 


// product search view page
Route::get('items/search/result',[HomeController::class, 'SearchViewResult'])->name('search.result'); 

/*===========================================
Backend Routes
===========================================*/

// Brand Routes
Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store',[BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}',[BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update',[BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}',[BrandController::class, 'BrandDelete'])->name('brand.delete');
});

// Categories Routes
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class, 'ctrCategoryView'])->name('all.category');
    Route::post('/store',[CategoryController::class, 'ctrCategoryStore'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class, 'ctrCategoryEdit'])->name('category.edit');
    Route::post('/update',[CategoryController::class, 'ctrCategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class, 'ctrCategoryDelete'])->name('category.delete');

    // SubCategories Routes
    Route::get('/sub/view',[SubCategoryController::class, 'ctrSubCategoryView'])->name('all.subcategory');
    Route::post('/sub/store',[SubCategoryController::class, 'ctrSubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}',[SubCategoryController::class, 'ctrSubCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update',[SubCategoryController::class, 'ctrSubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}',[SubCategoryController::class, 'ctrSubCategoryDelete'])->name('subcategory.delete');

    // SubSubCategories Routes
    Route::get('/sub/sub/view',[SubCategoryController::class, 'ctrSubSubCategoryView'])->name('all.subsubcategory');
    Route::post('/sub/sub/store',[SubCategoryController::class, 'ctrSubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/sub/edit/{subsubcat_id}',[SubCategoryController::class, 'ctrSubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/sub/update',[SubCategoryController::class, 'ctrSubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/sub/sub/delete/{subsubcat_id}',[SubCategoryController::class, 'ctrSubSubCategoryDelete'])->name('subsubcategory.delete');

    // Ajax Request 
    Route::get('/subcategories/ajax/{category_id}',[SubCategoryController::class, 'ctrGetSubCategoryView']);
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'ctrGetSubSubCategory']);

});

// courses Routes
Route::prefix('courses')->group(function() {

    // Add Products
    Route::get('/add', [CourseController::class, 'ctrAddCourseView'])->name('add.course.view');
    Route::post('/store', [CourseController::class, 'ctrStoreCourse'])->name('add.course.store');

    // All Courses
    Route::get('/all', [CourseController::class, 'ctrViewAllCourses'])->name('view.all.courses');
    Route::get('/delete/{Course_id}', [CourseController::class, 'ctrCourseDelete'])->name('course.delete');
    Route::get('/edit/{id}', [CourseController::class, 'ctrEditCourse'])->name('course.edit');
    Route::post('/update', [CourseController::class, 'ctrUpdateCourse'])->name('course.update');
    // Active & InActive Course
    Route::get('/active/{item_id}', [CourseController::class, 'ctrCourseActive'])->name('course.active');
    Route::get('/inactive/{item_id}', [CourseController::class, 'ctrCourseInactive'])->name('course.inactive');

});

// lessons Routes
Route::prefix('lessons')->group(function() {

    // Add Products
    Route::get('/add', [LessonController::class, 'ctrAddLessonView'])->name('add.lesson.view');
    
    Route::post('/store', [LessonController::class, 'ctrStoreLesson'])->name('lesson.store');

    // All Lessons
    Route::get('/all/view', [LessonController::class, 'ctrViewAllLessons'])->name('view.all.lessons');
    Route::get('/delete/{lesson_id}', [LessonController::class, 'ctrLessonDelete'])->name('lesson.delete');
    Route::get('/edit/{id}', [LessonController::class, 'ctrEditLesson'])->name('lesson.edit');
    Route::post('/update', [LessonController::class, 'ctrUpdateLesson'])->name('lesson.update');
    // Active & InActive Lesson
    Route::get('/active/{item_id}', [LessonController::class, 'ctrLessonActive'])->name('lesson.active');
    Route::get('/inactive/{item_id}', [LessonController::class, 'ctrLessonInactive'])->name('lesson.inactive');

});

// Notice Routes
Route::prefix('notice')->group(function(){
    Route::get('/view',[NoticeController::class, 'NoticeView'])->name('all.notice');
    Route::post('/store',[NoticeController::class, 'NoticeStore'])->name('notice.store');
    Route::get('/edit/{id}',[NoticeController::class, 'NoticeEdit'])->name('notice.edit');
    Route::post('/update',[NoticeController::class, 'NoticeUpdate'])->name('notice.update');
    Route::get('/delete/{id}',[NoticeController::class, 'NoticeDelete'])->name('notice.delete');

        // Active & InActive Slider
        Route::get('/active/{notice_id}', [NoticeController::class, 'NoticeActive'])->name('notice.active');
        Route::get('/inactive/{notice_id}', [NoticeController::class, 'NoticeInactive'])->name('notice.inactive');
    
});

// Orders Routes
Route::prefix('orders')->group(function() {

    //Pending orders
    Route::get('/pending/orders', [OrderController::class, 'PendingOrdersView'])->name('all.pending.order');
    
    //Pending orders details
    Route::get('/pending/orders/details/{id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');

    //Pending orders
    Route::get('/confirmed/orders', [OrderController::class, 'FinishOrdersView'])->name('all.finish.order');

    // Update Status 
    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');

});

// CkEditor Upload Image Route
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:admin','PreventBackHistory']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/send-email', [MailController::class, 'SendEmail']);