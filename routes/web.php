<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Аутентификация
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

// Защищенные маршруты (только для авторизованных пользователей)
Route::middleware('auth')->group(function () {
    // Главная страница пользователя
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Управление паспортами
    Route::get('/passport', [PassportController::class, 'show'])->name('passport.show');
    Route::get('/passport/create', [PassportController::class, 'create'])->name('passport.create');
    Route::post('/passport', [PassportController::class, 'store'])->name('passport.store');
    Route::middleware(['auth'])->group(function () {
        Route::get('/passport/{id}/edit', [PassportController::class, 'edit'])->name('passport.edit');
        Route::put('/passport/{id}', [PassportController::class, 'update'])->name('passport.update'); // ДОЛЖНО БЫТЬ PUT
        Route::delete('/passport/{id}', [PassportController::class, 'destroy'])->name('passport.destroy');
    });
    
});
