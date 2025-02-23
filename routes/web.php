<?php
//Route
use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\homeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\orderController;


//Middleware For Admin
use App\Http\Middleware\userType;

//Home Page At Server Start
Route::get('/',[homeController::class,'index'])->name('index');

//Home Page
Route::get('/index',[homeController::class,'index'])->name('index');

//Register Page
Route::get('/register',[homeController::class,'registerPage'])->name('registerPage');

//Register Data
Route::post('/registerAttempt',[homeController::class,'register'])->name('register');

//Login Page
Route::get('/login',[homeController::class,'loginPage'])->name('loginPage');

//Login Data
Route::post('/loginAttempt',[homeController::class,'loginAttempt'])->name('loginAttempt');

//Admin Login Page
Route::get('/adminlogin',[homeController::class,'loginPageAdmin'])->name('loginPageAdmin');

//Admin Login Data
Route::post('/loginAttemptAdmin',[homeController::class,'loginAttemptAdmin'])->name('loginAttemptAdmin');

//Contact
Route::get('/contact',[homeController::class,'contact'])->name('contact');

//Contact Us Data
Route::post('/contactAttempt',[homeController::class,'contactAttempt'])->name('contactAttempt');

//Feedback
Route::get('/feedback',[homeController::class,'feedback'])->name('feedback');

//Feedback Data
Route::post('/feedbackAttempt',[homeController::class,'feedbackAttempt'])->name('feedbackAttempt');

//Products
Route::get('/products',[homeController::class,'products'])->name('products');

//Product
Route::get('/Product/{id}',[homeController::class,'product'])->name('product');

//Categories
Route::get('/categories',[homeController::class,'categories'])->name('categories');

//Category Sort
Route::get('/productSort/{id}',[homeController::class,'productSort'])->name('productSort');

//Forgot Password
Route::get('/forgotPassword',[homeController::class,'forgotPassword'])->name('forgotPassword');

//Forgot Password Attempt
Route::post('/forgotPasswordAttempt',[homeController::class,'forgotPasswordAttempt'])->name('forgotPasswordAttempt');

//Ask Otp
Route::get('/askOtp/{id}',[homeController::class,'askOtp'])->name('askOtp');

//Match Otp
Route::post('/matchOtp',[homeController::class,'matchOtp'])->name('matchOtp');

//Reset Password
Route::get('/resetpassword/{id}',[homeController::class,'resetpassword'])->name('resetpassword');

//Reset Password Attempt
Route::post('/resetpasswordAttempt',[homeController::class,'resetpasswordAttempt'])->name('resetpasswordAttempt');

//Check Login Present Or Not
Route::middleware('auth')->group(function()
{
    //Account
    Route::get('/account',[homeController::class,'account'])->name('account');

    //Edit Account
    Route::get('/editaccount',[homeController::class,'editaccount'])->name('editaccount');

    //Update Account
    Route::post('/updateaccount',[homeController::class,'updateaccount'])->name('updateaccount');

    //Delete Account
    Route::get('deleteaccount',[homeController::class,'deleteaccount'])->name('deleteaccount');

    //Change Password
    Route::get('changepassword',[homeController::class,'changepassword'])->name('changepassword');

    //Chanage Password
    Route::post('changepasswordAttempt',[homeController::class,'changepasswordAttempt'])->name('changepasswordAttempt');

    //Wishlist
    Route::get('/wishlist',[homeController::class,'wishlist'])->name('wishlist');

    //Add To Wishlist
    Route::get('/addtowishlist/{id}',[homeController::class,'addtowishlist'])->name('addtowishlist');

    //Add All To Cart
    Route::get('/addalltocart',[homeController::class,'addalltocart'])->name('addalltocart');

    //Delete From Wishlist
    Route::get('/wishlistdestroy/{id}',[homeController::class,'wishlistdestroy'])->name('wishlistdestroy');

    //Clear Wishlist
    Route::get('/clearwishlist',[homeController::class,'clearwishlist'])->name('clearwishlist');

    //Cart
    Route::get('/cart',[homeController::class,'cart'])->name('cart');

    //Add To Cart
    Route::get('/addtocart/{id}',[homeController::class,'addtocart'])->name('addtocart');

    //Delete From Cart
    Route::get('/cartdestroy/{id}',[homeController::class,'cartdestroy'])->name('cartdestroy');

    //Clear Cart
    Route::get('/clearcart',[homeController::class,'clearcart'])->name('clearcart');

    //Buy Now
    Route::get('/buynow',[homeController::class,'buynow'])->name('buynow');

    //Orders
    Route::get('/orders',[homeController::class,'orders'])->name('orders');

    //Return Order
    Route::get('/returnorder/{id}',[homeController::class,'returnorder'])->name('returnorder');

    //Cancel Order
    Route::get('/cancelorder/{id}',[homeController::class,'cancelorder'])->name('cancelorder');

    //Download PDF Page
    Route::get('/downloadPdf/{id}',[homeController::class,'downloadPdf'])->name('downloadPdf');

    //Logout
    Route::get('/logout',[homeController::class,'logout'])->name('logout');

    //Middleware For Checking Admin
    Route::middleware(userType::class)->group(function()
    {
        //Dashboard
        Route::get('/dashboard',[homeController::class,'dashboard'])->name('dashboard');

        //Contact Us
        Route::get('/contactusAdmin',[homeController::class,'contactusAdmin'])->name('contactusAdmin');

        //Feedback
        Route::get('/feedbackAdmin',[homeController::class,'feedbackAdmin'])->name('feedbackAdmin');

        //Category Group
        Route::prefix('category')->name('category.')->group(function()
        {
            //Category Index Page
            Route::get('/',[categoryController::class,'index'])->name("index");
            //Create Category
            Route::get('/create',[categoryController::class,'create'])->name('create');
            //Store Category
            Route::post('/store',[categoryController::class,'store'])->name('store');
            //Delete Category
            Route::get('/destroy/{id}',[categoryController::class,'destroy'])->name('destroy');
            //Edit Category
            Route::get('/edit/{id}',[categoryController::class,'edit'])->name('edit');
            //Update Data For Edit Category
            Route::post('/update',[categoryController::class,'update'])->name('update');
            //Bulk Upload
            Route::get('/bulkUpload',[categoryController::class,'bulkUpload'])->name('bulkUpload');
            //Bulk Upload In Database
            Route::post('/bulkUploadAttempt',[categoryController::class,'bulkUploadAttempt'])->name('bulkUploadAttempt');
            //Bulk Image Upload
            Route::get('/bulkImageUpload',[categoryController::class,'bulkImageUpload'])->name('bulkImageUpload');
            //Bulk Image Upload Attempt
            Route::post('/bulkImageUploadAttempt',[categoryController::class,'bulkImageUploadAttempt'])->name('bulkImageUploadAttempt');
        });

        //Product Group
        Route::prefix('product')->name('product.')->group(function()
        {
            //Product Index Page
            Route::get('/',[productController::class,'index'])->name("index");
            //Create Product
            Route::get('/create',[productController::class,'create'])->name('create');
            //Store Product
            Route::post('/store',[productController::class,'store'])->name('store');
            //Delete Product
            Route::get('/destroy/{id}',[productController::class,'destroy'])->name('destroy');
            //Edit Product
            Route::get('/edit/{id}',[productController::class,'edit'])->name('edit');
            //Update Data For Edit Product
            Route::post('/update',[productController::class,'update'])->name('update');
            //Bulk Upload
            Route::get('/bulkUpload',[productController::class,'bulkUpload'])->name('bulkUpload');
            //Bulk Upload In Database
            Route::post('/bulkUploadAttempt',[productController::class,'bulkUploadAttempt'])->name('bulkUploadAttempt');
            //Bulk Image Upload
            Route::get('/bulkImageUpload',[productController::class,'bulkImageUpload'])->name('bulkImageUpload');
            //Bulk Image Upload Attempt
            Route::post('/bulkImageUploadAttempt',[productController::class,'bulkImageUploadAttempt'])->name('bulkImageUploadAttempt');
        });

        Route::prefix('orders')->name('orders.')->group(function()
        {
            //New Orders
            Route::get('/new',[orderController::class,'new'])->name('new');

            //Accept Order
            Route::get('/accept/{id}',[orderController::class,'accept'])->name('accept');

            //Reject Order
            Route::get('/reject/{id}',[orderController::class,'reject'])->name('reject');

            //Accepted Orders
            Route::get('/accepted',[orderController::class,'accepted'])->name('accepted');

            //Deliver Order
            Route::get('/deliver/{id}',[orderController::class,'deliver'])->name('deliver');

            //Delivered Orders
            Route::get('/delivered',[orderController::class,'delivered'])->name('delivered');

            //Canceled Orders
            Route::get('/canceled',[orderController::class,'canceled'])->name('canceled');

            //Return Orders
            Route::get('/returned',[orderController::class,'returned'])->name('returned');

            //Return Accepted
            Route::get('/returnaccept/{id}',[orderController::class,'returnaccept'])->name('returnaccept');

            //Return Rejected
            Route::get('/returnreject/{id}',[orderController::class,'returnreject'])->name('returnreject');

        });
    });
});
