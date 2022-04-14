<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\HomeController;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\StudentController;

Route::match(["post", "get"],"/apply", [HomeController::class, "apply"])->name("apply"); 
Route::get("/courses", [HomeController::class, "courses"])->name("courses"); 
Route::get("/",[HomeController::class,"index"])->name("homepage");
Route::get("/contact", [HomeController::class,"contact"])->name("contact");
Route::match(["post","get"],"/online-payment", [HomeController::class, "onlinePayment"])->name("online-payment"); 
Route::post("/online-payment/make-payment",[HomeController::class,"makePayment"])->name("makePayment");
Route::post("/online-payment/call-back",[HomeController::class,"paymentCallback"])->name("callback");


Route::prefix("admin")->middleware("auth")->group(function(){
    Route::get("/", [AdminController::class, "dashboard"])->name("admin.dashboard"); 
    Route::get("/approve-student/{id}", [AdminController::class, "approveStudent"])->name("admin.approve.student");
    Route::get("/make-cash-payment/{std_id}/{id}", [AdminController::class, "makeCashPayment"])->name("admin.make.cashpayment");
    Route::get("/passout-student/{id}", [AdminController::class, "passoutStudent"])->name('admin.passout.student'); 
    Route::get("/manage/student/active", [StudentController::class,"index"])->name('admin.manage.student.active');
    Route::get("/manage/student/new",[StudentController::class, "newAdmission"])->name('admin.manage.student.new'); 
    Route::get("/manage/student/passout", [StudentController::class, "passOut"])->name('admin.manage.student.passout');
    Route::get('/manage/payment/due',[AdminController::class,"managePayment"])->name("admin.manage.payment.due");
    Route::get('/manage/payment/paid',[AdminController::class,"managePayment"])->name("admin.manage.payment.paid");
});


require __DIR__.'/auth.php';
