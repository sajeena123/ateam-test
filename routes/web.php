<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\EventInvitesController;
use App\Http\Controllers\dtable\AjaxCrudEventController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('events',  [EventController::class, 'index'])->name('events');
Route::get('events/add', [EventController::class, 'add'])->name('event-add');
Route::post('events/save', [EventController::class, 'save'])->name('event-save');
Route::get('events/view/{event}', [EventController::class, 'view'])->name('event-view');


Route::get('invite/{event_id}', [EventInvitesController::class, 'invite'])->name('invite');
Route::post('invite/add',[EventInvitesController::class, 'save'])->name('process');
Route::get('invite/delete/{id}',[EventInvitesController::class, 'destroy'])->name('delete');
Route::get('accept/{token}', 'EventInvitesController@accept')->name('accept');
Route::delete('delete-multiple-invites', [EventInvitesController::class, 'deleteMultiple'])->name('invites.multiple-delete');


Route::get('dtable-posts-lists', [AjaxCrudEventController::class, 'index']);
Route::get('dtable-custom-posts', [AjaxCrudEventController::class, 'get_custom_posts']);