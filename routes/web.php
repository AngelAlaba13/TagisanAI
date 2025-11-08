<?php

use Illuminate\Support\Facades\Route;

// Page Navigation Controllers
use App\Http\Controllers\IntramuralsController;
use App\Http\Controllers\LocalMastsController;
use App\Http\Controllers\OtherEventsController;

// Admin Controllers
use App\Http\Controllers\Admin\EventSelectionController;


// Database Controllers INTRAMURALS
use App\Http\Controllers\Admin\Intramurals\IntraEventController;
use App\Http\Controllers\Admin\Intramurals\IntraCollegeController;
use App\Http\Controllers\Admin\Intramurals\IntraLeaderboardController;


// User Controllers INTRAMURALS
use App\Http\Controllers\Admin\Intramurals\UserLeaderboardController;
use App\Http\Controllers\Admin\Intramurals\UserEventController;


// AI OCR Feature Controller
use App\Http\Controllers\Admin\OCRController;

// Error Handling Controllers
use App\Http\Controllers\ErrorHandlingController;


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




// ------------------------ADMIN PAGE NAVIGATION ROUTES-------------------------||

// Intramurals Page Navigation Routes
Route::get('/intramurals/Department Points/department-points', [IntraLeaderboardController::class, 'index'])->name('intramurals.Department Points.department-points');
Route::get('/intramurals/Manage Departments/manage-departments', [IntraCollegeController::class, 'index'])->name('intramurals.Manage Departments.manage-departments');
Route::get('/intramurals/Manage Events/manage-events', [IntraEventController::class, 'index'])->name('intramurals.Manage Events.manage-events');
Route::get('/intramurals/Intramurals Customize/customize', [IntramuralsController::class, 'customize'])->name('intramurals.Intramurals Customize.intramurals-customize');


// Local MASTS Page Navigation Routes
Route::get('/localMasts/Campus Points/campus-points', [LocalMastsController::class, 'campusPoints'])->name('localMasts.Campus Points.campus-points');


// Other Events Page Navigation Routes
Route::get('/otherEvents/Team Points/team-points', [OtherEventsController::class, 'teamPoints'])->name('otherEvents.Team Points.team-points');




// ------------------------DATABASES ROUTES-------------------------||

// ------------------EVENTS--------------------||
// Intramurals Create Event Routes PARA MAKA CRUD
Route::resource('intra-events', IntraEventController::class);
Route::post('/intra-events/bulk', [IntraEventController::class, 'storeMultiple'])->name('intra-events.store-multiple');

// Intramurals Edit Event Route
Route::put('/intra-events/{intra_event}', [IntraEventController::class, 'update'])->name('intra-events.update');

// Intramurals Delete Event Route
Route::delete('intra-events/{intra_event}', [IntraEventController::class, 'destroy'])->name('intra-events.destroy');



// - --------------COLLEGES--------------------||
Route::resource('intra-colleges', IntraCollegeController::class);

// Intramurals Edit Colleges Route
Route::put('/intra-colleges/{intra_college}', [IntraCollegeController::class, 'update'])->name('intra-colleges.update');

// Intramurals Delete Event Route
Route::delete('intra-colleges/{intra_college}', [IntraCollegeController::class, 'destroy'])->name('intra-colleges.destroy');


// ------------------LEADERBOARD--------------------||
// Update college points
Route::put('/intra-leaderboard/{college_id}', [IntraLeaderboardController::class, 'update'])->name('intra-leaderboard.update');

// Set overall ranking
// Route::post('/intra-leaderboard/set-overall', [IntraLeaderboardController::class, 'setOverallRanking'])->name('intra-leaderboard.set-overall');

// List all events for updating golds
Route::get('/intramurals/Department Points/event-list', [IntraLeaderboardController::class, 'eventList'])
    ->name('intramurals.Department Points.event-list');

// Show form to set golds for a specific event
Route::get('/intramurals/Department Points/event/{event}/edit-gold', [IntraLeaderboardController::class, 'editGold'])
    ->name('intramurals.Department Points.edit-gold');

// Save gold points for the selected event
Route::post('/intramurals/Department Points/event/{event}/update-gold', [IntraLeaderboardController::class, 'updateGold'])
    ->name('intramurals.Department Points.update-gold');





// ------------------------INTRAMURALS USER ROUTES-------------------------||
// Update leaderboard for users to view
Route::get('intramurals/home', [UserLeaderboardController::class, 'index'])->name('intramurals.Leaderboard.user-leaderboard');

// View events for users
Route::get('intramurals/events', [UserEventController::class, 'index'])->name('intramurals.Events.user-events');





// ---------------------ERROR HANDLING ROUTES------------------------||
Route::get('/error/520', [App\Http\Controllers\ErrorHandlingController::class, 'error520'])->name('error-handling.error520');












//  ------------------------OCR Test Routes-------------------------||
// OCR Feature
Route::get('/intramurals/Manage Events/add-events', [OCRController::class, 'index'])->name('ocr.index');
Route::post('/ocr/vision-extract', [OCRController::class, 'visionExtract'])->name('admin.ocr.extract');