<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FrontendController;

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
    return view('homepage');
});


// STUDENT ROUTE
Route::get('/dashboard', [StudentController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::group(['prefix'=>'student','as'=>'student.'], function(){
    Route::get('/result/show', [StudentController::class, 'resultShow'])->name('result.show');
    Route::get('/co-check', [StudentController::class, 'coCheck'])->name('co.check');


});


// FACULTY ROUTE
Route::get('/faculty/dashboard', [FacultyController::class, 'index'])->middleware(['auth', 'verified'])->name('faculty.dashboard');
Route::group(['prefix'=>'faculty','as'=>'faculty.'], function(){
    
    Route::get('/mark/create', [FacultyController::class, 'markCreate'])->name('mark.create');
    Route::post('/mark/create', [FacultyController::class, 'markCreatePost'])->name('mark.create');
    Route::get('/total-co', [FacultyController::class, 'totalCo'])->name('total.co');
    Route::post('/view-total-co', [FacultyController::class, 'totalCoPost'])->name('total.co.post');
});


// ADMIN  ROUTE
Route::get('/admin/dashboard', function () {
    return view('web.admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    
    Route::get('/student/create', [AdminController::class, 'studentCreate'])->name('student.create');
    Route::post('/student/create', [AdminController::class, 'studentCreatePost'])->name('student.create');

    Route::get('/faculity/create', [AdminController::class, 'faculityCreate'])->name('faculity.create');
    Route::post('/faculity/create', [AdminController::class, 'faculityCreatePost'])->name('faculity.create');

    Route::get('/course/create', [AdminController::class, 'courseCreate'])->name('course.create');
    Route::post('/course/create', [AdminController::class, 'courseCreatePost'])->name('course.create');
});



// Public Route
Route::get('/contact-us', [FrontendController::class, 'contactus'])->name('contactus');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});















require __DIR__.'/auth.php';
