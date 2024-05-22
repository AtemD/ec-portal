<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\PlatformsController;
use App\Http\Controllers\DistributionListController;

// dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Clients 
Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
Route::get('/clients/create',[ClientsController::class, 'create'])->name('clients.create');
Route::post('/clients',[ClientsController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}',[ClientsController::class, 'show'])->name('clients.show');
Route::get('/clients/{client}/edit',[ClientsController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}',[ClientsController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}',[ClientsController::class, 'destroy'])->name('clients.destroy');

// Contacts 
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create',[ContactsController::class, 'create'])->name('contacts.create');
Route::post('/contacts',[ContactsController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{contact}',[ContactsController::class, 'show'])->name('contacts.show');
Route::get('/contacts/{contact}/edit',[ContactsController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/{contact}',[ContactsController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{contact}',[ContactsController::class, 'destroy'])->name('contacts.destroy');

// Sites 
Route::get('/sites', [SitesController::class, 'index'])->name('platforms.index');
Route::get('/sites/create',[SitesController::class, 'create'])->name('platforms.create');
Route::post('/sites',[SitesController::class, 'store'])->name('platforms.store');
Route::get('/sites/{site}',[SitesController::class, 'show'])->name('platforms.show');
Route::get('/sites/{site}/edit',[SitesController::class, 'edit'])->name('platforms.edit');
Route::put('/sites/{site}',[SitesController::class, 'update'])->name('platforms.update');
Route::delete('/sites/{site}',[SitesController::class, 'destroy'])->name('platforms.destroy');

// Platforms 
Route::get('/platforms', [PlatformsController::class, 'index'])->name('platforms.index');
Route::get('/platforms/create',[PlatformsController::class, 'create'])->name('platforms.create');
Route::post('/platforms',[PlatformsController::class, 'store'])->name('platforms.store');
Route::get('/platforms/{platform}',[PlatformsController::class, 'show'])->name('platforms.show');
Route::get('/platforms/{platform}/edit',[PlatformsController::class, 'edit'])->name('platforms.edit');
Route::put('/platforms/{platform}',[PlatformsController::class, 'update'])->name('platforms.update');
Route::delete('/platforms/{platform}',[PlatformsController::class, 'destroy'])->name('platforms.destroy');

// Distribution List 
Route::get('/distribution-list', [DistributionListController::class, 'index'])->name('distribution-list.index');
Route::get('/distribution-list/create',[DistributionListController::class, 'create'])->name('distribution-list.create');
Route::post('/distribution-list',[DistributionListController::class, 'store'])->name('distribution-list.store');
Route::get('/distribution-list/{platform}',[DistributionListController::class, 'show'])->name('distribution-list.show');
Route::get('/distribution-list/{platform}/edit',[DistributionListController::class, 'edit'])->name('distribution-list.edit');
Route::put('/distribution-list/{platform}',[DistributionListController::class, 'update'])->name('distribution-list.update');
Route::delete('/distribution-list/{platform}',[DistributionListController::class, 'destroy'])->name('distribution-list.destroy');
