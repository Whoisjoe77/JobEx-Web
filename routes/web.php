<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\EmployerController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:employer'])->group(function () {
        Route::get('/employer/home', [EmployerController::class, 'home'])->name('employer.home');
        Route::get('/employer/addjob', [EmployerController::class, 'addjob'])->name('employer.addjob');
        Route::post('/employer/store', [EmployerController::class, 'store'])->name('employer.store');
        Route::get('/employer/myjobs', [EmployerController::class, 'myjobs'])->name('employer.myjobs');
        Route::get('/employer/myjobs/detail/{id}', [EmployerController::class, 'jobdetail'])->name('employer.jobdetail');
        Route::get('/employer/myjobs/edit/{id}', [EmployerController::class, 'editjob'])->name('employer.editjob');
        Route::post('/employer/myjobs/{id}', [EmployerController::class, 'update'])->name('employer.update');
        Route::delete('/employer/myjobs/delete/{id}', [EmployerController::class, 'delete'])->name('employer.delete');
        
        Route::get('/employer/myjobs/applicants/{id}', [EmployerController::class, 'applicants'])->name('employer.applicants');
        Route::get('/employer/data/{id}', [EmployerController::class, 'getLamaransData'])->name('employer.lamaransdata');
        Route::get('/employer/myjobs/applicants/detail/{id}', [EmployerController::class, 'applicantsdetail'])->name('employer.applicantsdetail');
        Route::delete('/employer/myjobs/applicants/detail/delete/{id}', [EmployerController::class, 'lamaransdelete'])->name('employer.lamaransdelete');
        Route::put('/employer/myjobs/applicants/detail/update/{id}', [EmployerController::class, 'lamaransupdate'])->name('employer.lamaransupdate');
        Route::get('/employer/myjobs/applicants/detail/accept/{id}', [EmployerController::class, 'lamaranaccept'])->name('employer.lamaranaccept');
        Route::get('/employer/myjobs/applicants/detail/decline/{id}', [EmployerController::class, 'lamarandecline'])->name('employer.lamarandecline');

    });
    Route::get('/dashboard/home', [HomeController::class, 'home'])->name('dashboard.home');

    Route::get('/jobs/data', [JobController::class, 'getData'])->name('jobs.data');
    Route::get('/jobs/joblist', [JobController::class, 'joblist'])->name('jobs.joblist');
    Route::get('/jobs/detail/{id}', [JobController::class, 'detail'])->name('jobs.detail');
    Route::get('/jobs/detail/{id}/', [JobController::class, 'detail'])->name('jobs.detail');
    Route::get('/favorite/{id}', [JobController::class, 'addfavorite'])->name('jobs.addfavorite');
    Route::get('/user/favorites/data', [JobController::class, 'favoriteJobsData'])->name('favorites.data');
    Route::get('/jobs/favorites', [JobController::class, 'myfavorites'])->name('jobs.favoritejobs');
    Route::get('/jobs/favorites/delete/{id}', [JobController::class, 'deletefavorite'])->name('jobs.deletefavorite');
    Route::delete('/jobs/favorites/delete/{id}', [JobController::class, 'deletefavorite'])->name('jobs.deletefavorite');


    Route::get('/lamaran/{id}/apply', [LamaranController::class, 'index'])->name('lamaran.apply');
    Route::post('/lamaran/{id}', [LamaranController::class, 'store'])->name('lamaran.store');
    Route::get('/lamaran/success', [LamaranController::class, 'success'])->name('lamaran.success');


    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});