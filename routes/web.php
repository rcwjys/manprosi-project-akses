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
use App\Http\Controllers\MedicineManagementController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormulariumController;

// * Middleware
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;


// * Customer Page

route::middleware([GuestMiddleware::class])->group(function () {

    route::get('/', [IndexController::class, 'index'])->name('customer.index');

    // * Persediaan Obat 

    route::get('/persediaan-obat', [indexController::class, 'accessMedicinePage'])->name('customer.medicinePage');

    route::get('/detail-persediaan-obat/{medicineId}', [IndexController::class, 'showMedicineDetail']);

    // * Authorization

    route::get('/login', [LoginController::class, 'loginPage'])->name('admin.loginPage');

    route::post('/login', [LoginController::class, 'loginProcess']);

    // * Send Message Feature

    route::post('/messages/create', [MessageController::class, 'store'])->name('message.create');

    // ! Should Be Move When Finish
    route::get('/register', [RegisterController::class, 'registerPage'])->name('admin.registerPage');

    route::post('/register', [RegisterController::class, 'registerProcess']);
});


// * Routing For Admin

route::middleware([AuthMiddleware::class])->group(function () {

    route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('admin.dashboard');


    // * Medicine Class Feature

    route::get('/medicine-class', [MedicineController::class, 'classPage'])->name('admin.medicine-class');

    route::get('/medicine-class/create', [MedicineController::class, 'getFormForClass'])->name('admin.create-form');

    route::post('/medicine-class/create/', [MedicineController::class, 'submitFormForClass'])->name('admin.submit-form-class');

    route::get('/medicine-class/detail/{TherapyClassId}', [MedicineController::class, 'getDetailClass'])->name('admin.detailclass');

    route::get('/medicine-class/delete/{TherapyClassId}', [MedicineController::class, 'deleteClass'])->name('admin.delete-class');

    route::get('/medicine-class/detail/edit/{TherapyClassId}', [MedicineController::class, 'getEditformClass'])->name('admin.edit-form-class');

    route::put('/medicine-class/detail/edit', [MedicineController::class, 'submitEditFormClass']);


    // * Sub Medicine Class Feature

    route::get('/medicine-sub-class', [SubClassController::class, 'subclassPage'])->name('admin.medicine-sub-class');

    route::get('/medicine-sub-class/create', [subClassController::class, 'getFormForSubClass'])->name('admin.create-sub-class');

    route::post('/medicine-sub-class/create', [subClassController::class, 'submitFormForSubClass'])->name('admin.submit-form');

    route::get('/medicine-sub-class/detail/{subTherapyClassId}', [subClassController::class, 'getDetailSubClass'])->name('admin.detail-subclass');

    route::get('/medicine-sub-class/delete/{subTherapyClassId}', [subClassController::class, 'deleteSubClass'])->name('admin.delete-sub-class');

    route::get('/medicine-sub-class/detail/edit/{subTherapyClassId}', [subClassController::class, 'getEditform'])->name('admin.edit-form');

    route::put('/medicine-sub-class/detail/edit', [subClassController::class, 'submitEdiFormSubClass']);


    // * Recipe Feature

    route::get('/medicine-recipe', [RecipeController::class, 'index'])->name('admin.recipe');

    route::get('create-recipe-data', [RecipeController::class, 'getRecipeForm'])->name('admin.createRecipeData');

    route::post('store-recipe-data', [RecipeController::class, 'storeRecipeData'])->name('admin.storeRecipeData');

    route::get('/edit-recipe-data/{recipeId}', [RecipeController::class, 'editRecipeData']);

    route::put('/update-recipe-data/{recipeId}', [RecipeController::class, 'updateRecipeData']);

    route::get('/delete-recipe-data/{recipeId}', [RecipeController::class, 'destroy']);



    // * Medicine Management Feature
    route::get('/medicine-data', [MedicineManagementController::class, 'index'])->name('admin.medicine-data');

    route::get('/create-medicine-data', [MedicineManagementController::class, 'getMedicineForm']);

    route::post('/store-medicine-data', [MedicineManagementController::class, 'storeMedicineData']);

    route::get('/medicine-data/details/{medicineId}', [MedicineManagementController::class, 'DetailMedicineData']);

    route::get('/edit-medicine-data/{medicineId}', [MedicineManagementController::class, 'editMedicineData']);

    route::put('/update-medicine-data/{medicineId}', [MedicineManagementController::class, 'updateMedicineData']);

    route::get('/delete-medicine-data/{medicineId}', [MedicineManagementController::class, 'destroyMedicineData']);



    // * Units Feature
    route::get('/medicine-units-data', [UnitController::class, 'index'])->name('admin.medicine-unit');

    route::get('/create-medicine-unit-data', [UnitController::class, 'getUnitForm'])->name('admin.unit-form');

    route::post('/store-medicine-unit-data', [UnitController::class, 'storeUnitData']);

    route::get('/edit-medicine-unit-data/{medicineUnitId}', [UnitController::class, 'editUnitData']);

    route::put('/update-medicine-unit-data/{medicineUnitId}', [UnitController::class, 'updateUnitData']);

    route::get('/medicine-units-data/delete-data/{medicineUnitId}', [UnitController::class, 'destroy']);

    // * Medicine Management Feature
    route::get('/medicine-data', [MedicineManagementController::class, 'index'])->name('admin.medicine-data');

    route::get('/create-medicine-data', [MedicineManagementController::class, 'getMedicineForm']);

    route::post('/store-medicine-data', [MedicineManagementController::class, 'storeMedicineData']);

    route::get('/medicine-data/details/{medicineId}', [MedicineManagementController::class, 'DetailMedicineData']);

    route::get('/edit-medicine-data/{medicineId}', [MedicineManagementController::class, 'editMedicineData']);

    route::put('/update-medicine-data/{medicineId}', [MedicineManagementController::class, 'updateMedicineData']);

    route::get('/delete-medicine-data/{medicineId}', [MedicineManagementController::class, 'destroyMedicineData']);



    // * Messages Feature

    route::get('/messages', [MessageController::class, 'index']);

    route::get('/messages/{messageId}', [MessageController::class, 'showDetail'])->name('message-detail');

    route::get('/messages/delete/{messageId}', [MessageController::class, 'deleteMessage']);

    route::get('/messages/edit/{messageId}', [MessageController::class, 'editMessage'])->name('admin.edit-message');

    route::put('/message/edit', [MessageController::class, 'submitEditMessage']);


    // * Authentication Feature


    // route::get('/register', [RegisterController::class, 'registerPage'])->name('admin.registerPage');

    // route::post('/register', [RegisterController::class, 'registerProcess']);

    route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');


    // * Manage Employee Feature
    route::get('/employee', [EmployeeController::class, 'employee'])->name('admin.employee');

    route::get('/employee/create', [EmployeeController::class, 'Addemployee'])->name('admin.add-employee');

    route::post('/employee/create', [EmployeeController::class, 'SubmitAddemployee']);

    route::get('/employee/edit-employee/{id}', [EmployeeController::class, 'Editemployee']);

    route::put('/employee/edit-employee/{id}', [EmployeeController::class, 'SubmitEditemployee'])->name('employee.update');

    route::get('/employee/edit-employee/delete/{id}', [EmployeeController::class, 'deleteEmployee'])->name('employee.delete');


    // * Reports Feature

    route::get('/general-reports', [ReportController::class, 'index'])->name('admin.reports');

    // * Formularium Feature

    route::get('/formularium', [FormulariumController::class, 'index'])->name('admin.formularium');
});
