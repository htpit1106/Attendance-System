<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminsHome;
use App\Http\Controllers\GiangvienController;
use App\Http\Controllers\giangvienHomes;
use App\Http\Controllers\LophocphanController;
use App\Http\Controllers\MonhocController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    // return view('admins/index');
    return view('tkgiangviens/index');
});


Route::get('/adminhomes-taikhoansv', [adminsHome::class, 'viewtksv'])->name('adminhomes.taikhoansv');
Route::get('/adminhomes-taikhoangv', [adminsHome::class, 'viewtkgv'])->name('adminhomes.taikhoangv');
Route::get('/adminhomes-monhoc-lophp', [adminsHome::class, 'viewmonhoc_lophp'])->name('adminhomes.monhoc_lophp');
Route::get('/adminhomes-dulieudiemdanh', [adminsHome::class, 'viewdulieudiemdanh'])->name('adminhomes.dulieudiemdanh');

Route::get('/adminhomes-giamsat-nhandien', [adminsHome::class, 'viewgiamsat_nhandien'])->name('adminhomes.giamsat_nhandien');

Route::resource('/students', StudentController::class);
Route::resource('/giangviens', GiangvienController::class);

Route::resource('/monhocs', MonhocController::class);
Route::resource('/lophocphans', LophocphanController::class);

Route::get('/giangvienhomes-dashboard',[
    giangvienHomes::class, 'viewDashboard'
])->name('giangvienHomes.dashboard');

Route::get('/giangvienhomes-danhsachsv',[
    giangvienHomes::class, 'viewdanhsachsv'
])->name('giangvienHomes.danhsachsv');

Route::get('/giangvienhomes-xuatbaocao',[
    giangvienHomes::class, 'viewxuatbaocao'
])->name('giangvienHomes.xuatbaocao');


