<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

use App\Http\Controllers\HazardProneAreaController;
use App\Http\Controllers\EmergencyHotlineController;
use App\Http\Controllers\EvacuationAreaController;

Route::get('/hazards', [HazardProneAreaController::class, 'index'])->name('hazards.index');
Route::post('/hazards/store', [HazardProneAreaController::class, 'store'])->name('hazards.store');
Route::delete('/hazards/{id}', [HazardProneAreaController::class, 'destroy'])->name('hazards.destroy');
Route::get('/hazards/{id}', [HazardProneAreaController::class, 'show'])->name('hazards.show');

route::get('/emergency-hotlines', [EmergencyHotlineController::class, 'index'])->name('emergency-hotlines.index');
Route::post('/emergency-hotlines', [EmergencyHotlineController::class, 'store'])->name('emergency-hotlines.store');
Route::get('/emergency-hotlines/{id}/edit', [EmergencyHotlineController::class, 'edit'])->name('emergency-hotlines.edit');
Route::put('/emergency-hotlines/{id}', [EmergencyHotlineController::class, 'update'])->name('emergency-hotlines.update');
Route::delete('/emergency-hotlines/{id}', [EmergencyHotlineController::class, 'destroy'])->name('emergency-hotlines.destroy');


Route::get('/evacuation-areas', [EvacuationAreaController::class, 'index'])->name('evacuation-areas.index');
Route::get('/evacuation-areas/create', [EvacuationAreaController::class, 'create'])->name('evacuation-areas.create');
Route::post('/evacuation-areas', [EvacuationAreaController::class, 'store'])->name('evacuation-areas.store');
Route::get('/evacuation-areas/{id}/edit', [EvacuationAreaController::class, 'edit'])->name('evacuation-areas.edit');
Route::put('/evacuation-areas/{id}', [EvacuationAreaController::class, 'update'])->name('evacuation-areas.update');
Route::delete('/evacuation-areas/{id}', [EvacuationAreaController::class, 'destroy'])->name('evacuation-areas.destroy');

Route::get('/', [PageController::class, 'signIn'])->name('SignIn');
Route::get('/SignUp', [PageController::class, 'signUp'])->name('SignUp');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/EvacuationAreas', [PageController::class, 'evacuationAreas'])->name('EvacuationAreas');
Route::get('/ApproveLectures', [PageController::class, 'approveLectures'])->name('ApproveLectures');
Route::get('/Feedbacks', [PageController::class, 'feedbacks'])->name('Feedbacks');
Route::get('/GenerateCertificates', [PageController::class, 'generateCertificates'])->name('GenerateCertificates');
Route::get('/MonitorHazard', [PageController::class, 'monitorHazard'])->name('MonitorHazard');
Route::get('/Employee', [PageController::class, 'employees'])->name('Employee');

Route::get('/Lectures', [PageController::class, 'lectures'])->name('Lectures');
Route::get('/LectureQuiz', [PageController::class, 'lectureQuiz'])->name('LectureQuiz');
