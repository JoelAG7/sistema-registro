<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AttendanceController;

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

Route::get('/', function () {
    return view('registro');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/estilos', function () {
    return view('estilos');
})->middleware(['auth', 'verified'])->name('estilos');

Route::get('admin/pages', function () {
    return view('student');
})->middleware(['auth', 'verified'])->name('student');

Route::get('admin/pages', function () {
    return view('career');
})->middleware(['auth', 'verified'])->name('career');

Route::get('admin/pages', function () {
    return view('attendance');
})->middleware(['auth', 'verified'])->name('attendance');

Route::get('admin/pages', function () {
    return view('teacher');
})->middleware(['auth', 'verified'])->name('teacher');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    
});

require __DIR__.'/auth.php';

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::resource('/student', StudentController::class,);
route::resource('/career', CareerController::class);
route::resource('/teacher', TeacherController::class);
route::resource('/attendance', AttendanceController::class);
route::resource('/registro', RegistroController::class);
Route::get('student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::post('student/{student}/update', [StudentController::class, 'update'])->name('student.update');
