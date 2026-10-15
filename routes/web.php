<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth','verified'])->group(function () {

Route::get('/livetrail', [LocationController::class, 'index']);
Route::get('/locations', [LocationController::class, 'locationIndex']);
Route::get('/dailytrails', [LocationController::class, 'otherDaysTrail']);
Route::get('/currentlocations/{counsellorid}', [LocationController::class, 'getCurrentLocations']);
Route::get('/otherdays/{date}/{counsellorid}', [LocationController::class, 'getOtherDaysLocations']);

Route::get('/', [TripController::class, 'index']);

Route::get('/sessions', [SessionController::class, 'index']);
Route::post('/savesession',[SessionController::class,'saveSession']);
Route::get('/createsession', [SessionController::class,'addSession']);
Route::get('/session/{id}', [SessionController::class,'showEditSession']);
Route::put('/saveeditsession/{id}',[SessionController::class,'saveEditSession']);
Route::get('/deletesession/{id}', [SessionController::class,'deleteSession']);

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/createorder', [OrderController::class,'addOrder']);
Route::post('/saveorder',[OrderController::class,'saveOrder']);
Route::get('/order/{id}', [OrderController::class,'showEditOrder']);
Route::put('/saveeditorder/{id}',[OrderController::class,'saveEditOrder']);
Route::get('/deleteorder/{id}', [OrderController::class,'deleteOrder']);



Route::get('/trips', [TripController::class, 'index']);
// Route::get('/orders', [TripController::class, 'indexOrders']);
Route::get('/createtrip', [TripController::class,'addTrip']);
Route::get('/deletetrip/{id}', [TripController::class,'deleteTrip']);
Route::post('/savetrip',[TripController::class,'saveTrip']);
Route::post('/savetripcustomer',[TripController::class,'saveTripCustomer']);
Route::get('/trip/{id}', [TripController::class,'showEditTrip']);
Route::put('/saveedittrip/{id}',[TripController::class,'saveEditTrip']);
Route::get('/tempsumtripdistance',[TripController::class,'tempSumTripLocations']);

Route::get('/admins', [UserController::class,'admins']);
Route::get('/admins/{id}/{object}',[UserController::class,'showAdminsById']);
Route::get('/deleteadmin/{id}', [UserController::class,'deleteAdmin']);
Route::post('/saveadmin', [UserController::class,'saveAdmin']);
Route::get('/add-admin', [UserController::class,'addAdmin']);
Route::get('/editadmin/{id}', [UserController::class,'showEditAdmin']);
Route::put('/saveeditadmin/{id}',[UserController::class,'saveEditAdmin']);

Route::get('/counsellors', [UserController::class,'counsellors']);
Route::get('/counsellors/{id}/{object}',[UserController::class,'showCounsellorsById']);
Route::get('/deletecounsellor/{id}', [UserController::class,'deleteCounsellor']);
Route::post('/savecounsellor', [UserController::class,'saveCounsellor']);
Route::get('/add-counsellor', [UserController::class,'addCounsellor']);
Route::get('/editcounsellor/{id}', [UserController::class,'showEditCounsellor']);
Route::put('/saveeditcounsellor/{id}',[UserController::class,'saveEditCounsellor']);


Route::get('/customers', [UserController::class,'customers']);
Route::get('/customers/{id}/{object}',[UserController::class,'showCustomersById']);
Route::get('/deletecustomer/{id}', [UserController::class,'deleteCustomer']);
Route::post('/savecustomer', [UserController::class,'saveCustomer']);
Route::get('/add-customer', [UserController::class,'addCustomer']);
Route::get('/editcustomer/{id}', [UserController::class,'showEditCustomer']);
Route::put('/saveeditcustomer/{id}',[UserController::class,'saveEditCustomer']);


Route::get('/logout', [LoginController::class,'logout']);



});

Route::get('/login', [LoginController::class,'showLogin'])->name('login');
Route::post('/attemptlogin', [LoginController::class,'doLogin']);

Route::get('/signup', [SignupController::class,'showSignup'])->name('notwork');
Route::post('/attemptsignup', [SignupController::class,'doSignup']);

