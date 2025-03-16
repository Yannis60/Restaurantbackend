<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PortionController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInquiryController;
use App\Http\Controllers\UserInquiryTypeController;
use Illuminate\Support\Facades\Route;


//Public Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::post('userInquiry', [UserInquiryController::class, 'createUserInquiry']);


Route::middleware('auth:sanctum')->group(function () {
    //Auth Routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Route::apiResource('users', UserController::class);
    Route::get('user', [UserController::class, 'index']);
    Route::post('user', [UserController::class, 'store']);
    Route::get('user/{id}', [UserController::class, 'show']);
    Route::put('user/{id}', [UserController::class, 'update']);
    Route::delete('user/{id}', [UserController::class, 'destroy']);

    Route::post('location', [LocationController::class, 'createLocation']);
    Route::get('location', [LocationController::class, 'getLocations']);
    Route::get('location/{id}', [LocationController::class, 'getLocation']);
    Route::put('location/{id}', [LocationController::class, 'updateLocation']);
    Route::delete('location/{id}', [LocationController::class, 'deleteLocation']);

    Route::post('restaurant', [RestaurantController::class, 'createRestaurant']);
    Route::get('restaurant', [RestaurantController::class, 'getRestaurants']);
    Route::get('restaurant/{id}', [RestaurantController::class, 'getRestaurant']);
    Route::put('restaurant/{id}', [RestaurantController::class, 'updateRestaurant']);
    Route::delete('restaurant/{id}', [RestaurantController::class, 'deleteRestaurant']);

    Route::post('role', [RoleController::class, 'createRole']);
    Route::get('role', [RoleController::class, 'index']);
    Route::get('role/{id}', [RoleController::class, 'getRole']);
    Route::put('role/{id}', [RoleController::class, 'updateRole']);
    Route::delete('role/{id}', [RoleController::class, 'deleteRole']);

    Route::post('userInquiryType', [UserInquiryTypeController::class, 'createInquiryType']);
    Route::get('userInquiryType', [UserInquiryTypeController::class, 'index']);
    Route::get('userInquiryType/{id}', [UserInquiryTypeController::class, 'getInquiryType']);
    Route::put('userInquiryType/{id}', [UserInquiryTypeController::class, 'updateInquiryType']);
    Route::delete('userInquiryType/{id}', [UserInquiryTypeController::class, 'deleteInquiryType']);

    Route::get('userInquiry', [UserInquiryController::class, 'index']);
    Route::get('userInquiry/{id}', [UserInquiryController::class, 'getUserInquiry']);
    // Route::put('userInquiry/{id}', [UserInquiryController::class, 'updateUserInquiry']);
    Route::delete('userInquiry/{id}', [UserInquiryController::class, 'deleteUserInquiry']);

    Route::post('portion', [PortionController::class, 'createPortion']);
    Route::get('portion', [PortionController::class, 'index']);
    Route::get('portion/{id}', [PortionController::class, 'getPortion']);
    Route::put('portion/{id}', [PortionController::class, 'updatePortion']);
    Route::delete('portion/{id}', [PortionController::class, 'deletePortion']);

    Route::post('food', [FoodController::class, 'createFood']);
    Route::get('food', [FoodController::class, 'index']);
    Route::get('food/{id}', [FoodController::class, 'getFood']);
    Route::put('food/{id}', [FoodController::class, 'updateFood']);
    Route::delete('food/{id}', [FoodController::class, 'deleteFood']);

    Route::post('menu', [MenuController::class, 'createMenu']);
    Route::get('menu', [MenuController::class, 'index']);
    Route::get('menu/{id}', [MenuController::class, 'getMenu']);
    Route::put('menu/{id}', [MenuController::class, 'updateMenu']);
    Route::delete('menu/{id}', [MenuController::class, 'deleteMenu']);
});
