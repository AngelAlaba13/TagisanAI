<?php

use Illuminate\Support\Facades\Route;

// Page Navigation Controllers
use App\Http\Controllers\IntramuralsController;
use App\Http\Controllers\LocalMastsController;
use App\Http\Controllers\OtherEventsController;

// Admin Controllers
use App\Http\Controllers\Admin\EventSelectionController;


// Database Controllers
use App\Http\Controllers\Admin\Intramurals\IntraEventController;


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
    return view('adminPanel.main');
});


// Admin MAIN Routes:set active event
Route::prefix('admin')->name('admin.')->group(function () {
    Route::post('/set-active-event', [EventSelectionController::class, 'setActiveEvent'])
        ->name('set-active-event');
});




// ------------------------PAGE NAVIGATION ROUTES-------------------------||

// Intramurals Page Navigation Routes
Route::get('/intramurals/Department Points/department-points', [IntramuralsController::class, 'departmentPoints'])->name('intramurals.Department Points.department-points');
Route::get('/intramurals/Manage Departments/manage-departments', [IntramuralsController::class, 'manageDepartments'])->name('intramurals.Manage Departments.manage-departments');
Route::get('/intramurals/Manage Events/manage-events', [IntramuralsController::class, 'manageEvents'])->name('intramurals.Manage Events.manage-events');
Route::get('/intramurals/Intramurals Customize/customize', [IntramuralsController::class, 'customize'])->name('intramurals.Intramurals Customize.intramurals-customize');


// Local MASTS Page Navigation Routes
Route::get('/localMasts/Campus Points/campus-points', [LocalMastsController::class, 'campusPoints'])->name('localMasts.Campus Points.campus-points');


// Other Events Page Navigation Routes
Route::get('/otherEvents/Team Points/team-points', [OtherEventsController::class, 'teamPoints'])->name('otherEvents.Team Points.team-points');




// ------------------------DATABASES ROUTES-------------------------||

// Intramurals Create Event Routes
Route::resource('intra-events', IntraEventController::class);