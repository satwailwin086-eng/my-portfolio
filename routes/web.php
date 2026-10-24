<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\AdminProjectController;
use App\Models\Project;
use App\Http\Controllers\AdminSkillController;
use App\Models\Skill;

Route::get('/', function () {
    $projects = Project::where('is_visible', true)
        ->oldest()
        ->get();

    $skills = Skill::oldest()->get();

    return view('portfolio', compact('projects', 'skills'));
});

Route::post('/contact', [
    ContactMessageController::class,
    'store'
])->name('contact.send');
// Admin Login Page
Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [ AdminLoginController::class, 'authenticate'])
    ->middleware('throttle:5,1')
    ->name('admin.authenticate');

Route::post('/admin/logout', [AdminLoginController::class, 'logout'])
    ->name('admin.logout');

Route::get('/admin/messages', [AdminMessageController::class, 'index'])
    ->middleware(\App\Http\Middleware\AdminAuth::class)
    ->name('admin.messages');

Route::delete('/admin/messages/{message}', [
    AdminMessageController::class,
    'destroy'
])->middleware(\App\Http\Middleware\AdminAuth::class)
  ->name('admin.messages.delete');

  
Route::post('/admin/messages/{message}/save', [
    AdminMessageController::class,
    'toggleSave'
])->middleware(AdminAuth::class)
  ->name('admin.messages.save');

  
Route::post('/admin/messages/{message}/reply', [
    AdminMessageController::class,
    'reply'
])->middleware(AdminAuth::class)
  ->name('admin.messages.reply');

  Route::prefix('admin')
    ->middleware(AdminAuth::class)
    ->name('admin.')
    ->group(function () {
        Route::resource('projects', AdminProjectController::class)
            ->except(['show']);
        
         Route::resource('skills', AdminSkillController::class)
            ->except(['show']);
    });
