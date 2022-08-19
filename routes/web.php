<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QualityController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\NotifiImportController;
use App\Http\Controllers\NotifiExportController;
use App\Http\Controllers\InvoiceImportController;
use App\Http\Controllers\InvoiceExportController;
use App\Http\Controllers\InventoryManagementController;
use App\Http\Controllers\HomeController;



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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('loginMiddleware');
Route::post('checklogin',       [LoginController::class, 'checklogin'])->name('checklogin');
// Route::get('logoutOher', function () {
//     auth()->logoutOtherDevices('password');
//     return redirect('/');
// });
Route::get('dangxuat',          [LoginController::class, 'logout'])->name('logout');
Route::get('doimatkhau',        [LoginController::class, 'changePass'])->name('changePass');
Route::post('checkChangePass',  [LoginController::class, 'checkChangePass'])->name('checkChangePass');
Route::get('postforget', function () {
    return view('login.forgetpass');
})->name('forgetpass');

Route::resource('home', HomeController::class)->middleware('checkLogin');

Route::prefix('hethong')->middleware('checkLogin')->group(function () {
    Route::resource('dangky',    RegistrationController::class)->only(['index', 'store']);
    Route::resource('thongtin',  InformationController::class)->only(['index', 'update', 'edit']);
});

Route::prefix('chucnang')->middleware('checkLogin')->group(function () {
    Route::get('nhap/deleteRow', [ImportController::class, 'deleteRow']);
    Route::post('nhap/print', [ImportController::class, 'printPDF'])->name('nhap.print');
    Route::resource('nhap', ImportController::class);

    Route::get('xuat/deleteRow', [ExportController::class, 'deleteRow']);
    Route::post('xuat/print', [ExportController::class, 'printPDF'])->name('xuat.print');
    Route::resource('xuat', ExportController::class);

    Route::prefix('baocao')->group(function () {
        Route::prefix('nhapkho')->group(function () {
            Route::get('/', [NotifiImportController::class, 'notifi'])->name('baocao.nhap.index');
            Route::post('/', [NotifiImportController::class, 'getNotifi'])->name('baocao.nhap.post');

            Route::post('/ngaynhap', [NotifiImportController::class, 'postImportDate'])->name('baocao.nhap.postImportDate');
            Route::post('/vattu', [NotifiImportController::class, 'postSuplies'])->name('baocao.nhap.postSuplies');
            Route::post('/manhap', [NotifiImportController::class, 'postImportCode'])->name('baocao.nhap.postImportCode');
            Route::post('/nhasanxuat', [NotifiImportController::class, 'postProducer'])->name('baocao.nhap.postProducer');
            Route::post('/chatluong', [NotifiImportController::class, 'postQuality'])->name('baocao.nhap.postQuality');
        });

        Route::prefix('xuatkho')->group(function () {
            Route::get('/', [NotifiExportController::class, 'notifi'])->name('baocao.xuat.index');
            Route::post('/', [NotifiExportController::class, 'getNotifi'])->name('baocao.xuat.post');

            Route::post('/ngayxuat', [NotifiExportController::class, 'postExportDate'])->name('baocao.xuat.postExportDate');
            Route::post('/vattu', [NotifiExportController::class, 'postSuplies'])->name('baocao.xuat.postSuplies');
            Route::post('/maxuat', [NotifiExportController::class, 'postExportCode'])->name('baocao.xuat.postExportCode');
        });
    });

    Route::prefix('invoice')->group(function () {
        Route::resource('import', InvoiceImportController::class);

        Route::get('import-print/{id}', [InvoiceImportController::class, 'printPDF'])->name('import.print');

        Route::resource('export', InvoiceExportController::class);

        Route::get('export-print/{id}', [InvoiceExportController::class, 'printPDF'])->name('export.print');
    });

    Route::resource('inventory-management', InventoryManagementController::class);
    
});



Route::prefix('danhmuc')->middleware('checkLogin')->group(function () {
    Route::resource('nhanvien',   UserController::class);
    Route::resource('chatluong',  QualityController::class);
    Route::resource('donvitinh',  UnitController::class);
    Route::resource('khuvuc',     DistrictController::class);
    Route::resource('nhasanxuat', ProducerController::class);
    Route::resource('vattu',      SuppliesController::class);
    // Route::prefix('nhanvien')->group(function () {
    //     // Route::get('/', [UserController::class, 'index'])->name('nhanvien.index');
    //     // Route::get('/list', [UserController::class, 'getUsers'])->name('nhanvien.list');
    // });
});

Route::prefix('trogiup')->middleware('checkLogin')->group(function () {
    Route::resource('lienhe', ContactController::class)->only('index', 'store');
    Route::resource('phanhoi', FeedBackController::class)->only('index', 'store');
    Route::get('thongtinphanmem', function () {
        return view('trogiup.thongtin');
    })->name('thongtinphanmem');
    Route::get('huongdan', function () {
        return view('trogiup.huongdan');
    })->name('huongdan');
});