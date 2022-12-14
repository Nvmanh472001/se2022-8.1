<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Clients\LoginController;
use App\Http\Controllers\Clients\SignUpController;
use App\Http\Controllers\Clients\EditAccount;
use App\Http\Controllers\Clients\ProductsController;


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
//Client Route Controllers
Route::get('/', function () {
    return view('admins.home');
})->middleware('checklogin::class');


//Adminns Route Controllers
Route::get('ckeditor', 'CkeditorController@index');
Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');
Route::prefix('admins')->group(function (){
    Route::get('/', 'App\Http\Controllers\AdminController@loginAdmin')->name('admins.login');
    Route::get('/', 'App\Http\Controllers\AdminController@logoutAdmin')->name('admins.logout');
    Route::get('/forgot', 'App\Http\Controllers\AdminController@forgotPassword')->name('admins.forgot');
    Route::post('/', 'App\Http\Controllers\AdminController@postloginAdmin')->name('admins.postlogin');
    Route::get('/home', function () {
        return view('admins.home');
    })->middleware('checklogin::class');
    // Order 
    Route::prefix('orders')->group(function () {
        
        Route::get('/',[
            'as' => 'admins.orders.index',
            'uses'=> 'App\Http\Controllers\OrderController@index',
            'middleware' =>'can:order_list'
     
        ]);
       
        Route::get('/update/{id}',[
            'as' => 'admins.orders.update',
            'uses'=> 'App\Http\Controllers\OrderController@update',
            'middleware' =>'can:order_edit'
        ]);
        
    }); 
    

    //Category 

    Route::prefix('categories')->group(function () {
        Route::get('/create',[
            'as' => 'admins.categories.create',
            'uses'=> 'App\Http\Controllers\CategoryController@create',
            'middleware' =>'can:category_add'
            
        ]);
        Route::get('/',[
            'as' => 'admins.categories.index',
            'uses'=> 'App\Http\Controllers\CategoryController@index',
            'middleware' =>'can:category_list'
        ]);
        Route::get('/add',[
            'as' => 'admins.categories.post-add',
            'uses'=> 'App\Http\Controllers\CategoryController@postAdd',
            'middleware' =>'can:category_add'

        ]);
        Route::get('/edit/{id}',[
            'as' => 'admins.categories.edit',
            'uses'=> 'App\Http\Controllers\CategoryController@edit',
            'middleware' =>'can:category_edit'
        ]);
        Route::get('/update/{id}',[
            'as' => 'admins.categories.update',
            'uses'=> 'App\Http\Controllers\CategoryController@update',
            'middleware' =>'can:category_edit'

        ]);
        Route::get('/delete/{id}',[
            'as' => 'admins.categories.delete',
            'uses'=> 'App\Http\Controllers\CategoryController@delete',
            'middleware' =>'can:category_delete'
        ]);
        
    }); 
    
    // Menus
    Route::prefix('menus')->group(function () {
        Route::get('/create',[
            'as' => 'admins.menus.create',
            'uses'=> 'App\Http\Controllers\MenuController@create',
            'middleware' =>'can:menu_add'

        ]);
        Route::get('/',[
            'as' => 'admins.menus.index',
            'uses'=> 'App\Http\Controllers\MenuController@index',
            'middleware' =>'can:menu_list'

        ]);
        Route::post('/add',[
            'as' => 'admins.menus.post-add',
            'uses'=> 'App\Http\Controllers\MenuController@postAdd',
            'middleware' =>'can:menu_add'

        ]);
        Route::get('/edit/{id}',[
            'as' => 'admins.menus.edit',
            'uses'=> 'App\Http\Controllers\MenuController@edit',
            'middleware' =>'can:menu_edit'

        ]);
        Route::get('/update/{id}',[
            'as' => 'admins.menus.update',
            'uses'=> 'App\Http\Controllers\MenuController@update',
            'middleware' =>'can:menu_edit'

        ]);
        Route::get('/delete/{id}',[
            'as' => 'admins.menus.delete',
            'uses'=> 'App\Http\Controllers\MenuController@delete',
            'middleware' =>'can:menu_delete'

        ]);
        
    }); 
    
    //Products
    
    Route::prefix('products')->group(function () {
        Route::get('/create',[
            'as' => 'admins.products.create',
            'uses'=> 'App\Http\Controllers\ProductController@create',
            'middleware' =>'can:product_add'

        ]);
        Route::get('/trash',[
            'as' => 'admins.products.trash',
            'uses'=> 'App\Http\Controllers\ProductController@trash',
            'middleware' =>'can:product_list'
    
        ]);
        Route::get('/restore/{id}',[
            'as' => 'admins.products.restore',
            'uses'=> 'App\Http\Controllers\ProductController@restore',
            'middleware' =>'can:product_restore'
    
        ]);
        Route::get('/',[
            'as' => 'admins.products.index',
            'uses'=> 'App\Http\Controllers\ProductController@index',
            'middleware' =>'can:product_list'

        ]);
        Route::post('/add',[
            'as' => 'admins.products.post-add',
            'uses'=> 'App\Http\Controllers\ProductController@postAdd',
            'middleware' =>'can:product_add'

        ]);
        Route::get('/edit/{id}',[
            'as' => 'admins.products.edit',
            'uses'=> 'App\Http\Controllers\ProductController@edit',
            'middleware' =>'can:product_edit'

        ]);
        Route::post('/update/{id}',[
            'as' => 'admins.products.update',
            'uses'=> 'App\Http\Controllers\ProductController@update',
            'middleware' =>'can:product_edit'

        ]);
        Route::get('/delete/{id}',[
            'as' => 'admins.products.delete',
            'uses'=> 'App\Http\Controllers\ProductController@delete',
            'middleware' =>'can:product_delete'

        ]);
        Route::get('/deleteForcus/{id}',[
            'as' => 'admins.products.deleteForcus',
            'uses'=> 'App\Http\Controllers\ProductController@deleteForcus',
            'middleware' =>'can:product_deleteforcus'

        ]);
        Route::get('/deleteimage/{id}',[
            'as' => 'admins.products.deleteimage',
            'uses'=> 'App\Http\Controllers\ProductController@deleteImage',
            'middleware' =>'can:product_delete'

        ]);
        Route::get('/deleteimagefeature/{id}',[
            'as' => 'admins.products.deleteimagefeature',
            'uses'=> 'App\Http\Controllers\ProductController@deleteImageFeature',
            'middleware' =>'can:product_delete'

        ]);
        Route::get('/show/{id}',[
            'as' => 'admins.products.show',
            'uses'=> 'App\Http\Controllers\ProductController@show',
            'middleware' =>'can:product_list'

        ]);
        
    }); 


    //Slide
    Route::prefix('slides')->group(function () {
        Route::get('/create',[
            'as' => 'admins.slides.create',
            'uses'=> 'App\Http\Controllers\SlideController@create',
            'middleware' =>'can:slider_add'

        ]);
        Route::get('/',[
            'as' => 'admins.slides.index',
            'uses'=> 'App\Http\Controllers\SlideController@index',
            'middleware' =>'can:slider_list'

        ]);
        Route::post('/add',[
            'as' => 'admins.slides.post-add',
            'uses'=> 'App\Http\Controllers\SlideController@postAdd',
            'middleware' =>'can:slider_add'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'admins.slides.edit',
            'uses'=> 'App\Http\Controllers\SlideController@edit',
            'middleware' =>'can:slider_edit'

        ]);
        Route::post('/update/{id}',[
            'as' => 'admins.slides.update',
            'uses'=> 'App\Http\Controllers\SlideController@update',
            'middleware' =>'can:slider_edit'

        ]);
        Route::get('/delete/{id}',[
            'as' => 'admins.slides.delete',
            'uses'=> 'App\Http\Controllers\SlideController@delete',
            'middleware' =>'can:slider_delete'


        ]);
        
    }); 


});

// Route User 
Route::prefix('users')->group(function () {
    Route::get('/create',[
        'as' => 'users.create',
        'uses'=> 'App\Http\Controllers\AdminUserController@create',
        'middleware' =>'can:user_add'

    ]);
    Route::get('/',[
        'as' => 'users.index',
        'uses'=> 'App\Http\Controllers\AdminUserController@index',
        'middleware' =>'can:user_list'

    ]);
    Route::get('/trash',[
        'as' => 'users.trash',
        'uses'=> 'App\Http\Controllers\AdminUserController@trash',
        'middleware' =>'can:user_list'

    ]);
    Route::get('/restore/{id}',[
        'as' => 'users.restore',
        'uses'=> 'App\Http\Controllers\AdminUserController@restore',
        'middleware' =>'can:user_restore'

    ]);
    Route::get('/deleteForcus/{id}',[
        'as' => 'users.deleteForcus',
        'uses'=> 'App\Http\Controllers\AdminUserController@deleteForcus',
        'middleware' =>'can:user_deleteforcus'

    ]);
    Route::post('/add',[
        'as' => 'users.post-add',
        'uses'=> 'App\Http\Controllers\AdminUserController@postAdd',
        'middleware' =>'can:user_add'

    ]);
    Route::get('/edit/{id}',[
        'as' => 'users.edit',
        'uses'=> 'App\Http\Controllers\AdminUserController@edit',
        'middleware' =>'can:user_edit'

    ]);
    Route::post('/update/{id}',[
        'as' => 'users.update',
        'uses'=> 'App\Http\Controllers\AdminUserController@update',
        'middleware' =>'can:user_edit'

    ]);
    Route::get('/delete/{id}',[
        'as' => 'users.delete',
        'uses'=> 'App\Http\Controllers\AdminUserController@delete',
        'middleware' =>'can:user_delete'

    ]);
    
    Route::get('/show/{id}',[
        'as' => 'users.show',
        'uses'=> 'App\Http\Controllers\AdminUserController@show',
        'middleware' =>'can:user_list'

    ]);
    
}); 

// Route Role

Route::prefix('roles')->group(function () {
    Route::get('/create',[
        'as' => 'roles.create',
        'uses'=> 'App\Http\Controllers\AdminRoleController@create',
        'middleware' =>'can:role_add'

    ]);
    Route::get('/',[
        'as' => 'roles.index',
        'uses'=> 'App\Http\Controllers\AdminRoleController@index',
        'middleware' =>'can:role_list'

    ]);
    Route::get('/trash',[
        'as' => 'roles.trash',
        'uses'=> 'App\Http\Controllers\AdminRoleController@trash',
        'middleware' =>'can:role_list'

    ]);
    Route::get('/restore/{id}',[
        'as' => 'roles.restore',
        'uses'=> 'App\Http\Controllers\AdminRoleController@restore',
        'middleware' =>'can:role_restore'

    ]);
    Route::get('/deleteForcus/{id}',[
        'as' => 'roles.deleteForcus',
        'uses'=> 'App\Http\Controllers\AdminRoleController@deleteForcus',
        'middleware' =>'can:role_delete'

    ]);
    Route::post('/add',[
        'as' => 'roles.post-add',
        'uses'=> 'App\Http\Controllers\AdminRoleController@postAdd',
        'middleware' =>'can:role_add'

    ]);
    Route::get('/edit/{id}',[
        'as' => 'roles.edit',
        'uses'=> 'App\Http\Controllers\AdminRoleController@edit',
        'middleware' =>'can:role_edit'

    ]);
    Route::post('/update/{id}',[
        'as' => 'roles.update',
        'uses'=> 'App\Http\Controllers\AdminRoleController@update',
        'middleware' =>'can:role_edit'

    ]);
    Route::get('/delete/{id}',[
        'as' => 'roles.delete',
        'uses'=> 'App\Http\Controllers\AdminRoleController@delete',
        'middleware' =>'can:role_delete'

    ]);
    
    Route::get('/show/{id}',[
        'as' => 'roles.show',
        'uses'=> 'App\Http\Controllers\AdminRoleController@show',
        'middleware' =>'can:role_list'

    ]);
    
}); 

//Route Permission


Route::prefix('permissions')->group(function () {
    Route::get('/create',[
        'as' => 'permissions.create',
        'uses'=> 'App\Http\Controllers\AdminPermissionController@create',
        'middleware' =>'can:permission_add'

    ]);
    Route::get('/',[
        'as' => 'permissions.index',
        'uses'=> 'App\Http\Controllers\AdminPermissionController@index'
    ]);
    Route::get('/trash',[
        'as' => 'permissions.trash',
        'uses'=> 'App\Http\Controllers\AdminPermissionController@trash'
    ]);
    Route::get('/restore/{id}',[
        'as' => 'permissions.restore',
        'uses'=> 'App\Http\Controllers\AdminPermissionController@restore'
    ]);
    Route::get('/deleteForcus/{id}',[
        'as' => 'permissions.deleteForcus',
        'uses'=> 'App\Http\Controllers\AdminPermissionController@deleteForcus'
    ]);
    Route::post('/add',[
        'as' => 'permissions.post-add',
        'uses'=> 'App\Http\Controllers\AdminPermissionController@postAdd'
    ]);
    Route::get('/edit/{id}',[
        'as' => 'permissions.edit',
        'uses'=> 'App\Http\Controllers\AdminPermissionController@edit'
    ]);
    Route::post('/update/{id}',[
        'as' => 'permissions.update',
        'uses'=> 'App\Http\Controllers\AdminPermissionController@update'
    ]);
    Route::get('/delete/{id}',[
        'as' => 'permissions.delete',
        'uses'=> 'App\Http\Controllers\AdminPermissionController@delete'
    ]);
    
    Route::get('/show/{id}',[
        'as' => 'permissions.show',
        'uses'=> 'App\Http\Controllers\AdminPermissionController@show'
    ]);
    
}); 








