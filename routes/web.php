<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware("guest")->name("auth.")->group(function () {
    Route::get("/login", [App\Http\Controllers\Auth\LoginController::class, "authForm"])->name("loginForm");
    Route::post("/login", [App\Http\Controllers\Auth\LoginController::class, "doLogin"]);

    Route::get("/register", [App\Http\Controllers\Auth\RegisterController::class, "registerForm"])->name("registerForm");
    Route::post("/register", [App\Http\Controllers\Auth\RegisterController::class, "doRegister"]);
});

Route::post("/logout", [App\Http\Controllers\Auth\LogoutController::class, "logout"])
    ->name("auth.logout")
    ->middleware("auth");

Route::get("/", [App\Http\Controllers\HomeController::class, "home"])->name("home");
Route::get("/biens", [App\Http\Controllers\PropertyController::class, "index"])->name("property.index");
Route::get("/biens/{slug}/{property}", [App\Http\Controllers\PropertyController::class, "show"])->name("property.show");
Route::post("/biens/{property}/contact", [App\Http\Controllers\PropertyController::class, "contact"])->name("property.contact");

Route::prefix("admin")->name("admin.")->middleware("auth")->group(function () {
    Route::get("property/{property}/addFiles", [App\Http\Controllers\Admin\PropertyController::class, "showAddFiles"])->name("property.addFiles");
    Route::post("property/{property}/files/{gallery}", [App\Http\Controllers\Admin\PropertyController::class, "addFiles"])->name("property.files");
    Route::resource("property", App\Http\Controllers\Admin\PropertyController::class)->except("show");
    Route::resource("option", App\Http\Controllers\Admin\OptionController::class)->except("show");
    Route::resource("gallery", App\Http\Controllers\Admin\GalleryController::class)->except("edit", "update");
});
