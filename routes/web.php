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
use App\Http\Controllers\Admin\Intramurals\UserCollegesController;

// Database Controllers LOCAL MASTS
use App\Http\Controllers\Admin\LocalMasts\LocalEventController;
use App\Http\Controllers\Admin\LocalMasts\LocalCampusController;
use App\Http\Controllers\Admin\LocalMasts\LocalLeaderboardController;


// AI OCR and Chatbot Feature Controller
use App\Http\Controllers\Admin\OCRController;
use App\Http\Controllers\Admin\LocalOCRController;
use App\Http\Controllers\Admin\IsaiChatbotController;

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
Route::get('/localMasts/Campus Points/campus-points', [LocalLeaderboardController::class, 'index'])->name('localMasts.Campus Points.campus-points');
Route::get('/localMasts/Manage Campuses/manage-localM-campuses', [LocalCampusController::class, 'index'])->name('localMasts.Manage Campuses.manage-localM-campuses');
Route::get('/localMasts/Manage Events/manage-localM-events', [LocalEventController::class, 'index'])->name('localMasts.Manage Events.manage-localM-events');
Route::get('/localMasts/LocalMasts Customize/localM-customize', [LocalMastsController::class, 'customize'])->name('localMasts.LocalMasts Customize.localM-customize');
    

// Other Events Page Navigation Routes
Route::get('/otherEvents/Team Points/team-points', [OtherEventsController::class, 'teamPoints'])->name('otherEvents.Team Points.team-points');




/*
|--------------------------------------------------------------------------
| DATABASE ROUTES INTRAMURALS
|--------------------------------------------------------------------------
|
| Here is where the routes related to intramurals admin and user 
|
*/

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

// View colleges for users
Route::get('intramurals/colleges', [UserCollegesController::class, 'index'])->name('intramurals.Colleges.user-colleges');




/*
|--------------------------------------------------------------------------
| DATABASE ROUTES LOCAL MASTS
|--------------------------------------------------------------------------
|
| Here is where the routes related to local masts admin and user
|
*/

// ------------------EVENTS--------------------||
// LocalMasts Create Event Routes PARA MAKA CRUD
Route::resource('localM-events', LocalEventController::class);
Route::post('/localM-events/bulk', [LocalEventController::class, 'storeMultiple'])->name('localM-events.store-multiple');

// Intramurals Edit Event Route
Route::put('/localM-events/{localM_event}', [LocalEventController::class, 'update'])->name('localM-events.update');

// Intramurals Delete Event Route
Route::delete('localM-events/{localM_event}', [LocalEventController::class, 'destroy'])->name('localM-events.destroy');



// - --------------CAMPUSES--------------------|
Route::resource('localM-campuses', LocalCampusController::class);

// Local Masts Edit Campuses Route
Route::put('/localM-campuses/{localM-campuses}', [LocalCampusController::class, 'update'])->name('localM-campuses.update');

// Local Masts Delete Campuses Route
Route::delete('localM-campuses/{localM-campuses}', [LocalCampusController::class, 'destroy'])->name('localM-campuses.destroy');



// ------------------LEADERBOARD--------------------||
// Update campus points
Route::put('/localM-leaderboard/{campus_id}', [LocalLeaderboardController::class, 'update'])->name('localM-leaderboard.update');

// Set overall ranking
// Route::post('/localM-leaderboard/set-overall', [LocalLeaderboardController::class, 'setOverallRanking'])->name('localM-leaderboard.set-overall');

// List all events for updating golds
Route::get('/localMasts/Campus Points/localMasts-event-list', [LocalLeaderboardController::class, 'eventList'])
    ->name('localMasts.Campus Points.localM-event-list');

// Show form to set golds for a specific event
Route::get('/localMasts/Campus Points/event/{event}/edit-gold', [LocalLeaderboardController::class, 'editGold'])
    ->name('localMasts.Campus Points.edit-gold');

// Save gold points for the selected event
Route::post('/localMasts/Campus Points/event/{event}/update-gold', [LocalLeaderboardController::class, 'updateGold'])
    ->name('localMasts.Campus Points.update-gold');







// ---------------------ERROR HANDLING ROUTES------------------------||
Route::get('/error/520', [App\Http\Controllers\ErrorHandlingController::class, 'error520'])->name('error-handling.error520');







//  ------------------------OCR Test Routes-------------------------||
// OCR Feature INTRAMURALS
Route::get('/intramurals/Manage Events/add-events', [OCRController::class, 'index'])->name('ocr.index');
Route::post('/ocr/vision-extract', [OCRController::class, 'visionExtract'])->name('admin.ocr.extract');

// OCR Feature LOCAL MASTS
Route::get('/localMasts/Manage Events/add-localM-events', [LocalOCRController::class, 'index'])->name('localMasts.ocr.index');
Route::post('/localMasts/ocr/vision-extract', [LocalOCRController::class, 'visionExtract'])->name('localMasts.ocr.extract');


// ------------------------ISAI CHATBOT Test Routes-------------------------||
Route::get('/isai-chatbot', [IsaiChatbotController::class, 'index'])->name('isai-chatbot');