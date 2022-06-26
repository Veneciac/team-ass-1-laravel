<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;
//use App\Http\Controllers\FrontController;
use App\Http\Controllers\Auth\AuthController;
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
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('users', [AuthController::class, 'users'])->name('users.index');
Route::get('users/{id}/edit', [AuthController::class, 'edit'])->name('users.edit');
Route::patch('users/update/{id}', [AuthController::class, 'update'])->name('users.update');
Route::delete('users/{id}/destroy', [AuthController::class, 'destroy'])->name('users.destroy');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('products', ProductController::class);
Route::resource('students', StudentController::class);

//Route::get('home', [FrontController::class, 'home'])->name('home');
//Route::get('products', [FrontController::class, 'products'])->name('product.index');
//Route::get('users', [FrontController::class, 'users'])->name('users.index');
