<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
//
use App\Http\Controllers\typeController;
use App\Http\Controllers\storageController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\reserveController;
//
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');

	Route::prefix('type')->group(function () {
		Route::get('/', [typeController::class, 'type']);
		Route::post('/type-add', [typeController::class, 'type_add']);
		Route::get('/type-delete/{id}', [typeController::class, 'type_delete']);
		Route::post('/type-edit/{id}', [typeController::class, 'type_edit']);
		Route::post('/type-update', [typeController::class, 'type_update']);
	});

	Route::prefix('storage')->group(function () {
		Route::get('/', [storageController::class, 'storage']);
	});

	Route::prefix('member')->group(function () {
		Route::get('/', [memberController::class, 'member']);
		Route::post('/member-add', [memberController::class, 'member_add']);
		Route::get('/member-delete/{id}', [memberController::class, 'member_delete']);
        Route::post('/member-edit/{id}', [memberController::class, 'member_edit']);
        Route::post('/member-update', [memberController::class, 'member_update']);
	});

	Route::prefix('role')->group(function () {
		Route::get('/', [roleController::class, 'role']);
		Route::post('/role-add', [roleController::class, 'role_add']);
		Route::post('/menu-add', [roleController::class, 'menu_add']);
		Route::post('/role-select/{id}', [roleController::class, 'role_select']);
		Route::get('/role-delete/{id}', [roleController::class, 'role_delete']);
		Route::post('/role-edit/{id}', [roleController::class, 'role_edit']);
	});

	Route::prefix('users')->group(function () {
		Route::get('/', [usersController::class, 'users']);
	});

	Route::prefix('reserve')->group(function () {
		Route::get('/', [reserveController::class, 'reserve']);
	});
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
