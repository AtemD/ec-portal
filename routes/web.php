<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientContactController;
use App\Http\Controllers\ClientSiteController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DistributionListController;

// dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Clients 
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create',[UserController::class, 'create'])->name('user.create');
Route::post('/users',[UserController::class, 'store'])->name('user.store');
Route::get('/users/{user}',[UserController::class, 'show'])->name('user.show');
Route::get('/users/{user}/edit',[UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{user}',[UserController::class, 'update'])->name('user.update');
Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('user.destroy');

// Clients 
Route::get('/clients', [ClientController::class, 'index'])->name('client.index');
Route::get('/clients/create',[ClientController::class, 'create'])->name('client.create');
Route::post('/clients',[ClientController::class, 'store'])->name('client.store');
Route::get('/clients/{client}',[ClientController::class, 'show'])->name('client.show');
Route::get('/clients/{client}/edit',[ClientController::class, 'edit'])->name('client.edit');
Route::put('/clients/{client}',[ClientController::class, 'update'])->name('client.update');
Route::delete('/clients/{client}',[ClientController::class, 'destroy'])->name('client.destroy');

// Client Contacts 
Route::get('client/{client}/contacts', [ClientContactController::class, 'index'])->name('client.contact.index');
Route::get('client/{client}/contacts/create',[ClientContactController::class, 'create'])->name('client.contact.create');
Route::post('client/{client}/contacts',[ClientContactController::class, 'store'])->name('client.contact.store');
Route::get('client/{client}/contacts/{contact}',[ClientContactController::class, 'show'])->name('client.contact.show');
Route::get('client/{client}/contacts/{contact}/edit',[ClientContactController::class, 'edit'])->name('client.contact.edit');
Route::put('client/{client}/contacts/{contact}',[ClientContactController::class, 'update'])->name('client.contact.update');
Route::delete('client/{client}/contacts/{contact}',[ClientContactController::class, 'destroy'])->name('client.contact.destroy');

// Client Sites 
Route::get('client/{client}/sites', [ClientSiteController::class, 'index'])->name('client.site.index');
Route::get('client/{client}/sites/create',[ClientSiteController::class, 'create'])->name('client.site.create');
Route::post('client/{client}/sites',[ClientSiteController::class, 'store'])->name('client.site.store');
Route::get('client/{client}/sites/{site}',[ClientSiteController::class, 'show'])->name('client.site.show');
Route::get('client/{client}/sites/{site}/edit',[ClientSiteController::class, 'edit'])->name('client.site.edit');
Route::put('client/{client}/sites/{site}',[ClientSiteController::class, 'update'])->name('client.site.update');
Route::delete('client/{client}/sites/{site}',[ClientSiteController::class, 'destroy'])->name('client.site.destroy');


// Platforms 
Route::get('/platforms', [PlatformController::class, 'index'])->name('platform.index');
Route::get('/platforms/create',[PlatformController::class, 'create'])->name('platform.create');
Route::post('/platforms',[PlatformController::class, 'store'])->name('platform.store');
Route::get('/platforms/{platform}',[PlatformController::class, 'show'])->name('platform.show');
Route::get('/platforms/{platform}/edit',[PlatformController::class, 'edit'])->name('platform.edit');
Route::put('/platforms/{platform}',[PlatformController::class, 'update'])->name('platform.update');
Route::delete('/platforms/{platform}',[PlatformController::class, 'destroy'])->name('platform.destroy');

// Distribution List 
Route::get('/distribution-list', [DistributionListController::class, 'index'])->name('distribution-list.index');
Route::get('/distribution-list/create',[DistributionListController::class, 'create'])->name('distribution-list.create');
Route::post('/distribution-list',[DistributionListController::class, 'store'])->name('distribution-list.store');
Route::get('/distribution-list/{platform}',[DistributionListController::class, 'show'])->name('distribution-list.show');
Route::get('/distribution-list/{platform}/edit',[DistributionListController::class, 'edit'])->name('distribution-list.edit');
Route::put('/distribution-list/{platform}',[DistributionListController::class, 'update'])->name('distribution-list.update');
Route::delete('/distribution-list/{platform}',[DistributionListController::class, 'destroy'])->name('distribution-list.destroy');
