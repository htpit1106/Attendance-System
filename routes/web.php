<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\adminsHome;
use App\Http\Controllers\GiangvienController;
use App\Http\Controllers\giangvienHomes;
use App\Http\Controllers\LophocController;
use App\Http\Controllers\LophocphanController;
use App\Http\Controllers\MonhocController;
use App\Http\Controllers\StudentController;

Route::get('/admin', function () {
    return view('admins.index');
})->name('admin.index');




Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/admin');
})->name('logout');

Route::get('/adminhomes-taikhoansv', [adminsHome::class, 'viewtksv'])->name('adminhomes.taikhoansv');
Route::get('/adminhomes-taikhoangv', [adminsHome::class, 'viewtkgv'])->name('adminhomes.taikhoangv');
Route::get('/adminhomes-monhoc-lophp', [adminsHome::class, 'viewmonhoc_lophp'])->name('adminhomes.monhoc_lophp');
Route::get('/adminhomes-dulieudiemdanh', [adminsHome::class, 'viewdulieudiemdanh'])->name('adminhomes.dulieudiemdanh');

Route::get('/adminhomes-giamsat-nhandien', [adminsHome::class, 'viewgiamsat_nhandien'])->name('adminhomes.giamsat_nhandien');

Route::resource('/students', StudentController::class);
Route::resource('/giangviens', GiangvienController::class);

Route::resource('/monhocs', MonhocController::class);
Route::resource('/lophocphans', LophocphanController::class);
Route::resource('/lophocs', LophocController::class);







Route::get('/giangvienhomes-dashboard',[
    giangvienHomes::class, 'viewDashboard'
])->name('giangvienHomes.dashboard');

Route::get('/giangvienhomes-danhsachsv',[
    giangvienHomes::class, 'viewdanhsachsv'
])->name('giangvienHomes.danhsachsv');

Route::get('/giangvienhomes-xuatbaocao',[
    giangvienHomes::class, 'viewxuatbaocao'
])->name('giangvienHomes.xuatbaocao');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
