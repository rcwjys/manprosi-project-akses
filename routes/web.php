<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\subClassController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

// * Middleware
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;


// * Customer Page
Route::get('/', [IndexController::class, 'index'])->name('customer.index')->middleware([GuestMiddleware::class]);

Route::get('/persediaan-obat', [indexController::class, 'accessMedicinePage'])->name('customer.medicinePage')->middleware([GuestMiddleware::class]);

Route::get('/login', [LoginController::class, 'loginPage'])->name('admin.loginPage')->middleware([GuestMiddleware::class]);

route::post('/login', [LoginController::class, 'loginProcess'])->middleware([GuestMiddleware::class]);

route::post('/messages/create', [MessageController::class, 'store'])->name('message.create');


// * Routing For Admin

route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('admin.dashboard')->middleware([AuthMiddleware::class]);


// * Medicine Class Feature

route::get('/medicine-class', [MedicineController::class, 'classPage'])->name('admin.medicine-class')->middleware([AuthMiddleware::class]);

route::get('/medicine-class/create', [MedicineController::class, 'getFormForClass'])->name('admin.create-form')->middleware([AuthMiddleware::class]);

route::post('/medicine-class/create/', [MedicineController::class, 'submitFormForClass'])->name('admin.submit-form-class')->middleware([AuthMiddleware::class]);

route::get('/medicine-class/detail/{TherapyClassId}', [MedicineController::class, 'getDetailClass'])->name('admin.detailclass')->middleware([AuthMiddleware::class]);

route::get('/medicine-class/delete/{TherapyClassId}', [MedicineController::class, 'deleteClass'])->name('admin.delete-class')->middleware([AuthMiddleware::class]);

route::get('/medicine-class/detail/edit/{TherapyClassId}', [MedicineController::class, 'getEditformClass'])->name('admin.edit-form-class')->middleware([AuthMiddleware::class]);

route::put('/medicine-class/detail/edit', [MedicineController::class, 'submitEditFormClass'])->middleware([AuthMiddleware::class]);

// * Sub Medicine Class Feature

route::get('/medicine-sub-class', [SubClassController::class, 'subclassPage'])->name('admin.medicine-sub-class')->middleware([AuthMiddleware::class]);

route::get('/medicine-sub-class/create', [subClassController::class, 'getFormForSubClass'])->name('admin.create-sub-class')->middleware([AuthMiddleware::class]);

route::post('/medicine-sub-class/create', [subClassController::class, 'submitFormForSubClass'])->name('admin.submit-form')->middleware([AuthMiddleware::class]);

route::get('/medicine-sub-class/detail/{subTherapyClassId}', [subClassController::class, 'getDetailSubClass'])->name('admin.detail-subclass')->middleware([AuthMiddleware::class]);

route::get('/medicine-sub-class/delete/{subTherapyClassId}', [subClassController::class, 'deleteSubClass'])->name('admin.delete-sub-class')->middleware([AuthMiddleware::class]);

route::get('/medicine-sub-class/detail/edit/{subTherapyClassId}', [subClassController::class, 'getEditform'])->name('admin.edit-form')->middleware([AuthMiddleware::class]);

route::put('/medicine-sub-class/detail/edit', [subClassController::class, 'submitEdiFormSubClass'])->middleware([AuthMiddleware::class]);


// * Recipe

route::get('/medicine-recipe', [RecipeController::class, 'index'])->name('admin.recipe')->middleware([AuthMiddleware::class]);

route::get('/delete-recipe-data/{recipeId}', [RecipeController::class, 'destroy'])->middleware([AuthMiddleware::class]);


// * Messages Feature

route::get('/messages', [MessageController::class, 'index']);

route::get('/messages/{messageId}', [MessageController::class, 'showDetail'])->name('message-detail');

route::get('/messages/delete/{messageId}', [MessageController::class, 'deleteMessage']);

route::get('/messages/edit/{messageId}', [MessageController::class, 'editMessage'])->name('admin.edit-message')->middleware([AuthMiddleware::class]);

route::put('/message/edit', [MessageController::class, 'submitEditMessage'])->middleware([AuthMiddleware::class]);


// * Authentication Feature
Route::get('/register', [RegisterController::class, 'registerPage'])->name('admin.registerPage')->middleware([AuthMiddleware::class]);

Route::post('/register', [RegisterController::class, 'registerProcess'])->middleware([AuthMiddleware::class]);

route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout')->middleware([AuthMiddleware::class]);

// * Manage Employee Feature
route::get('/employee', [EmployeeController::class, 'employee'])->name('admin.employee')->middleware([AuthMiddleware::class]);
route::get('/employee/create', [EmployeeController::class, 'Addemployee'])->name('admin.add-employee')->middleware([AuthMiddleware::class]);
route::post('/employee/create', [EmployeeController::class, 'SubmitAddemployee'])->middleware([AuthMiddleware::class]);
route::get('/employee/edit-employee/{id}', [EmployeeController::class, 'Editemployee'])->middleware([AuthMiddleware::class]);
route::put('/employee/edit-employee/{id}', [EmployeeController::class, 'SubmitEditemployee'])->name('employee.update')->middleware([AuthMiddleware::class]);
route::get('/employee/edit-employee/delete/{id}', [EmployeeController::class, 'deleteEmployee'])->name('employee.delete')->middleware([AuthMiddleware::class]);
