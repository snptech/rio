<?php

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
Auth::routes();

$router->group(['middleware' => ['auth']], function ($router)
{

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Department managment
    Route::get("department",[App\Http\Controllers\DepartmentController::class,"index"])->name("department")->middleware("adminmaster");
    Route::get("new-department",[App\Http\Controllers\DepartmentController::class,"create"])->name("new-department")->middleware("adminmaster");;
    Route::post("department-store",[App\Http\Controllers\DepartmentController::class,"store"])->name("department-store")->middleware("adminmaster");;
    Route::get("/department/edit/{id}",[App\Http\Controllers\DepartmentController::class,"edit"])->name("edit-department")->middleware("adminmaster");;
    Route::post("department/update/{id}",[App\Http\Controllers\DepartmentController::class,"update"])->name("department-update")->middleware("adminmaster");;
    Route::get("/department/remove/{id}",[App\Http\Controllers\DepartmentController::class,"destroy"])->name("delete-department")->middleware("adminmaster");;


    // Role managment
    Route::get("role",[App\Http\Controllers\RoleController::class,"index"])->name("role")->middleware("adminmaster");
    Route::get("new-role",[App\Http\Controllers\RoleController::class,"create"])->name("new-role")->middleware("adminmaster");;
    Route::post("role-store",[App\Http\Controllers\RoleController::class,"store"])->name("role-store")->middleware("adminmaster");;
    Route::get("/role/edit/{id}",[App\Http\Controllers\RoleController::class,"edit"])->name("edit-role")->middleware("adminmaster");;
    Route::post("role/update/{id}",[App\Http\Controllers\RoleController::class,"update"])->name("role-update")->middleware("adminmaster");;
    Route::get("/role/remove/{id}",[App\Http\Controllers\RoleController::class,"destroy"])->name("delete-role")->middleware("adminmaster");;


    // Designation managment
    Route::get("designation",[App\Http\Controllers\DesignationController::class,"index"])->name("designation")->middleware("adminmaster");
    Route::get("new-designation",[App\Http\Controllers\DesignationController::class,"create"])->name("new-designation")->middleware("adminmaster");;
    Route::post("designation-store",[App\Http\Controllers\DesignationController::class,"store"])->name("designation-store")->middleware("adminmaster");;
    Route::get("/designation/edit/{id}",[App\Http\Controllers\DesignationController::class,"edit"])->name("edit-designation")->middleware("adminmaster");;
    Route::post("designation/update/{id}",[App\Http\Controllers\DesignationController::class,"update"])->name("designation-update")->middleware("adminmaster");;
    Route::get("/designation/remove/{id}",[App\Http\Controllers\DesignationController::class,"destroy"])->name("delete-designation")->middleware("adminmaster");;


    // Grade managment
    Route::get("grade",[App\Http\Controllers\GradeController::class,"index"])->name("grade")->middleware("adminmaster");
    Route::get("new-grade",[App\Http\Controllers\GradeController::class,"create"])->name("new-grade")->middleware("adminmaster");;
    Route::post("grade-store",[App\Http\Controllers\GradeController::class,"store"])->name("grade-store")->middleware("adminmaster");;
    Route::get("/grade/edit/{id}",[App\Http\Controllers\GradeController::class,"edit"])->name("edit-grade")->middleware("adminmaster");;
    Route::post("grade/update/{id}",[App\Http\Controllers\GradeController::class,"update"])->name("grade-update")->middleware("adminmaster");;
    Route::get("/grade/remove/{id}",[App\Http\Controllers\GradeController::class,"destroy"])->name("delete-grade")->middleware("adminmaster");;


    // Mode of Dispatch managment
    Route::get("modedispatch",[App\Http\Controllers\ModedispatchController::class,"index"])->name("modedispatch")->middleware("adminmaster");
    Route::get("new-modedispatch",[App\Http\Controllers\ModedispatchController::class,"create"])->name("new-modedispatch")->middleware("adminmaster");;
    Route::post("modedispatch-store",[App\Http\Controllers\ModedispatchController::class,"store"])->name("modedispatch-store")->middleware("adminmaster");;
    Route::get("/modedispatch/edit/{id}",[App\Http\Controllers\ModedispatchController::class,"edit"])->name("edit-modedispatch")->middleware("adminmaster");;
    Route::post("modedispatch/update/{id}",[App\Http\Controllers\ModedispatchController::class,"update"])->name("modedispatch-update")->middleware("adminmaster");;
    Route::get("/modedispatch/remove/{id}",[App\Http\Controllers\ModedispatchController::class,"destroy"])->name("delete-modedispatch")->middleware("adminmaster");;



    // Action managment
    Route::get("action",[App\Http\Controllers\ActionController::class,"index"])->name("action")->middleware("adminmaster");
    Route::get("new-action",[App\Http\Controllers\ActionController::class,"create"])->name("new-action")->middleware("adminmaster");;
    Route::post("action-store",[App\Http\Controllers\ActionController::class,"store"])->name("action-store")->middleware("adminmaster");;
    Route::get("/action/edit/{id}",[App\Http\Controllers\ActionController::class,"edit"])->name("edit-action")->middleware("adminmaster");;
    Route::post("action/update/{id}",[App\Http\Controllers\ActionController::class,"update"])->name("action-update")->middleware("adminmaster");;
    Route::get("/action/remove/{id}",[App\Http\Controllers\ActionController::class,"destroy"])->name("delete-action")->middleware("adminmaster");;

     // Controller managment
     Route::get("controller",[App\Http\Controllers\MaincontrollerController::class,"index"])->name("controller")->middleware("adminmaster");
     Route::get("new-controller",[App\Http\Controllers\MaincontrollerController::class,"create"])->name("new-controller")->middleware("adminmaster");;
     Route::post("controller-store",[App\Http\Controllers\MaincontrollerController::class,"store"])->name("controller-store")->middleware("adminmaster");;
     Route::get("/controller/edit/{id}",[App\Http\Controllers\MaincontrollerController::class,"edit"])->name("edit-controller")->middleware("adminmaster");;
     Route::post("controller/update/{id}",[App\Http\Controllers\MaincontrollerController::class,"editsave"])->name("controller-update")->middleware("adminmaster");;
     Route::get("/controller/remove/{id}",[App\Http\Controllers\MaincontrollerController::class,"remove"])->name("remove-controller")->middleware("adminmaster");;

      // Manufacturer managment
      Route::get("manufacturer",[App\Http\Controllers\ManufacturerController::class,"index"])->name("manufacturer")->middleware("adminmaster");
      Route::get("new-manufacturer",[App\Http\Controllers\ManufacturerController::class,"create"])->name("new-manufacturer")->middleware("adminmaster");;
      Route::post("manufacturer-store",[App\Http\Controllers\ManufacturerController::class,"store"])->name("manufacturer-store")->middleware("adminmaster");;
      Route::get("/manufacturer/edit/{id}",[App\Http\Controllers\ManufacturerController::class,"edit"])->name("edit-manufacturer")->middleware("adminmaster");;
      Route::post("manufacturer/update/{id}",[App\Http\Controllers\ManufacturerController::class,"update"])->name("manufacturer-update")->middleware("adminmaster");;
      Route::get("/manufacturer/remove/{id}",[App\Http\Controllers\ManufacturerController::class,"destroy"])->name("delete-manufacturer")->middleware("adminmaster");;

       // RawMaterial managment
       Route::get("rawmaterial",[App\Http\Controllers\RawmaterialController::class,"index"])->name("rawmaterial")->middleware("adminmaster");
       Route::get("new-rawmaterial",[App\Http\Controllers\RawmaterialController::class,"create"])->name("new-rawmaterial")->middleware("adminmaster");;
       Route::post("rawmaterial-store",[App\Http\Controllers\RawmaterialController::class,"store"])->name("rawmaterial-store")->middleware("adminmaster");;
       Route::get("/rawmaterial/edit/{id}",[App\Http\Controllers\RawmaterialController::class,"edit"])->name("edit-rawmaterial")->middleware("adminmaster");;
       Route::post("rawmaterial/update/{id}",[App\Http\Controllers\RawmaterialController::class,"update"])->name("rawmaterial-update")->middleware("adminmaster");;
       Route::get("/rawmaterial/remove/{id}",[App\Http\Controllers\RawmaterialController::class,"destroy"])->name("delete-rawmaterial")->middleware("adminmaster");;

        // Supplier managment
        Route::get("supplier",[App\Http\Controllers\SupplierController::class,"index"])->name("supplier")->middleware("adminmaster");
        Route::get("new-supplier",[App\Http\Controllers\SupplierController::class,"create"])->name("new-supplier")->middleware("adminmaster");;
        Route::post("supplier-store",[App\Http\Controllers\SupplierController::class,"store"])->name("supplier-store")->middleware("adminmaster");;
        Route::get("/supplier/edit/{id}",[App\Http\Controllers\SupplierController::class,"edit"])->name("edit-supplier")->middleware("adminmaster");;
        Route::post("supplier/update/{id}",[App\Http\Controllers\SupplierController::class,"update"])->name("supplier-update")->middleware("adminmaster");;
        Route::get("/supplier/remove/{id}",[App\Http\Controllers\SupplierController::class,"destroy"])->name("delete-supplier")->middleware("adminmaster");;
        Route::post("/supplier/view",[App\Http\Controllers\SupplierController::class,"show"])->name("show-supplier")->middleware("adminmaster");;
 

});
