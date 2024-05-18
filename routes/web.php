<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\FeesCollectionsController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/home', '/dashboard');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/teacher-dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('teacher-dashboard');
Route::get('/student-dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('student-dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


Route::resource('users', UsersController::class);
Route::get('/users/download', [UsersController::class, 'download'])->name('users.download');



Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
Route::get('/students/{id}',  [StudentsController::class,'show'])->name('students.show');
Route::get('/edit-student/{id}', [StudentsController::class, 'edit'])->name('students.edit');
Route::put('/edit-student/{id}', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');
Route::get('students/export', [StudentsController::class, 'export'])->name('students.export');

Route::get('/teachers', [TeachersController::class, 'index'])->name('teachers.index');
Route::get('/teachers/create', [TeachersController::class, 'create'])->name('teachers.create');
Route::post('/teachers', [TeachersController::class, 'store'])->name('teachers.store');
Route::get('/teachers/view/{id}', [TeachersController::class, 'show'])->name('teachers.view');
Route::get('/edit-teacher/{id}', [TeachersController::class, 'edit'])->name('teachers.edit');
Route::put('/edit-teacher/{id}', [TeachersController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{teacher}', [TeachersController::class, 'destroy'])->name('teachers.destroy');
Route::get('/teachers/download', [TeachersController::class, 'download'])->name('teachers.download');


Route::get('/departments', [DepartmentsController::class, 'index'])->name('departments.index');
Route::get('/departments/create', [departmentsController::class, 'create'])->name('departments.create');
Route::post('/departments', [departmentsController::class, 'store'])->name('departments.store');
Route::get('/departments/view/{id}', [departmentsController::class, 'show'])->name('departments.view');
Route::get('/edit-department/{id}', [departmentsController::class, 'edit'])->name('departments.edit');
Route::put('/edit-department/{id}', [departmentsController::class, 'update'])->name('departments.update');
Route::delete('/departments/{department}', [departmentsController::class, 'destroy'])->name('departments.destroy');
Route::get('/studentEvents', [EventsController::class, 'index'])->name('studentEvents');
Route::get('/teacherEvents', [EventsController::class, 'index'])->name('teacherEvents');

Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
Route::resource('/events', EventsController::class);

Route::get('/subjects', [subjectsController::class, 'index'])->name('subjects.index');
Route::get('/subjects/create', [subjectsController::class, 'create'])->name('subjects.create');
Route::post('/subjects', [subjectsController::class, 'store'])->name('subjects.store');
Route::get('/subjects/view/{id}', [SubjectsController::class, 'show'])->name('subjects.view');
Route::get('/edit-subject/{id}', [subjectsController::class, 'edit'])->name('subjects.edit');
Route::put('/edit-subject/{id}', [subjectsController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/{subject}', [subjectsController::class, 'destroy'])->name('subjects.destroy');
Route::get('/subjects/download', [SubjectsController::class, 'download'])->name('subjects.download');

Route::resource('fees-collections', FeesCollectionsController::class);
Route::get('fees-collections/export', [FeesCollectionsController::class, 'export'])->name('fees-collections.export');
Route::resource('expenses', ExpensesController::class);
Route::resource('salary', SalaryController::class);
Route::resource('/holiday', HolidayController::class);
Route::resource('exam', ExamsController::class);
Route::get('/exams/download', [ExamsController::class,'download'])->name('exams.download');














