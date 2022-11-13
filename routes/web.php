<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\BebanController;
use App\Http\Controllers\PengeluaranKasController;
use App\Http\Controllers\PemasukanKasController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\ChangeProfileController;
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
		// return view('dashboard');
		return view('dashboard-lpd');
	})->name('dashboard');
	
	// Laporan
	Route::group(['prefix' => 'laporan'], function () {
		Route::get('neraca-percobaan', function () {
			return view('laporan/neraca-percobaan');
		})->name('neraca.percobaan');
		Route::get('arus-kas', function () {
			return view('laporan/arus-kas');
		})->name('arus.kas');
		Route::get('laba-rugi', function () {
			return view('laporan/laba-rugi');
		})->name('laba.rugi');
		Route::get('perubahan-modal', function () {
			return view('laporan/perubahan-modal');
		})->name('perubahan.modal');
		Route::get('neraca', function () {
			return view('laporan/neraca');
		})->name('necara');
	});
	
	// Akun
	Route::get('akun',[AkunController::class,'index'])->name('akun');
	Route::post('akun',[AkunController::class,'store'])->name('akun-store');
	Route::delete('akun/{akun}',[AkunController::class,'destroy'])->name('akun-delete');
	Route::put('akun/{akun}',[AkunController::class,'update'])->name('akun-update');
	
	// Route::post('akun', function () {
	// 	return view('akun/akun-page');
	// })->name('akun-store');
	// Route::delete('akun', function () {
	// 	return view('akun/akun-page');
	// })->name('akun-delete');

	// Kas
	// Route::get('penerimaan-kas', function () {
	// 	return view('kas/penerimaan-kas');
	// })->name('penerimaan.kas');
	Route::get('pengeluaran-kas', [PengeluaranKasController::class,'index'])->name('pengeluaran.kas');
	Route::post('pengeluaran-kas', [PengeluaranKasController::class,'store'])->name('pengeluaran-store.kas');
	Route::put('pengeluaran-kas/{transaksi}', [PengeluaranKasController::class,'update'])->name('pengeluaran-update.kas');
	Route::delete('pengeluaran-kas/{transaksi}', [PengeluaranKasController::class,'destroy'])->name('pengeluaran-destroy.kas');

	Route::get('penerimaan-kas', [PemasukanKasController::class,'index'])->name('penerimaan.kas');
	Route::post('penerimaan-kas', [PemasukanKasController::class,'store'])->name('penerimaan-store.kas');
	Route::put('penerimaan-kas/{transaksi}', [PemasukanKasController::class,'update'])->name('penerimaan-update.kas');
	Route::delete('penerimaan-kas/{transaksi}', [PemasukanKasController::class,'destroy'])->name('penerimaan-destroy.kas');
	
	// Beban - Beban
	Route::get('beban-beban',[BebanController::class,'index'])->name('beban');
	Route::post('beban-beban-store',[BebanController::class,'store'])->name('beban-store');
	Route::put('beban-beban-update/{transaksi}',[BebanController::class,'update'])->name('beban-update');
	Route::delete('beban-beban-destroy/{transaksi}',[BebanController::class,'destroy'])->name('beban-destroy');

	// Validasi
	Route::get('validasi-penerimaan-kas',  [PemasukanKasController::class,'index'])->name('validasi.penerimaan.kas');
	Route::get('validasi-pengeluaran-kas', [PengeluaranKasController::class,'index'])->name('validasi.pengeluaran.kas');
	Route::get('validasi-beban-beban', [BebanController::class,'index'])->name('validasi.beban');

	//////////
	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	// Route::get('rtl', function () {
	// 	return view('rtl');
	// })->name('rtl');

	// User Mananement add and info
	Route::get('user-management',
		[InfoUserController::class, 'viewAllUser']
	)->name('user-management');
	Route::post('user-management-store',
		[InfoUserController::class, 'store']
	)->name('user-management-store');
	Route::delete('user-management-delete/{user}',
		[InfoUserController::class, 'destroy']
	)->name('user-management-delete');
	Route::put('user-management-update/{user}',
		[InfoUserController::class, 'update']
	)->name('user-management-update');
	Route::put('user-management-updatepassword',
		[ChangePasswordController::class, 'update']
	)->name('user-management-updatepassword');
	Route::get('profile', function () {
		return view('profile');
	})->name('profile');
	Route::put('profile',
		[ChangeProfileController::class,'update']
	)->name('profile-update');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    // Route::get('virtual-reality', function () {
	// 	return view('virtual-reality');
	// })->name('virtual-reality');

    // Route::get('static-sign-in', function () {
	// 	return view('static-sign-in');
	// })->name('sign-in');

    // Route::get('static-sign-up', function () {
	// 	return view('static-sign-up');
	// })->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
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


Route::group(['middleware' => ['auth','admincheck'],'prefix'=>'admin/dashboard','as'=>'admin.'],function(){
	Route::get('/', function (){
		return view('dashboard');
	});
});


Route::group(['middleware' => ['auth','ketuacheck'],'prefix'=>'ketua/dashboard','as'=>'ketua.'],function(){
	Route::get('/', function (){
		return view('dashboard-lpd');
	});
});

Route::group(['middleware' => ['auth','sekretarischeck'],'prefix'=>'sekretaris/dashboard','as'=>'sekretaris.'],function(){
	Route::get('/', function (){
		return view('dashboard-lpd');
	});
});

Route::group(['middleware' => ['auth','bendaharacheck'],'prefix'=>'bendahara/dashboard','as'=>'bendahara.'],function(){
	Route::get('/', function (){
		return view('dashboard-lpd');
	});
});



Route::get('/login', function () {
    return view('session/login-session');
})->name('login');