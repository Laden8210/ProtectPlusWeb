<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'signIn'])->name('SignIn');
Route::get('/SignUp', [PageController::class, 'signUp'])->name('SignUp');
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/EvacuationAreas', [PageController::class, 'evacuationAreas'])->name('EvacuationAreas');
Route::get('/ApproveLectures', [PageController::class, 'approveLectures'])->name('ApproveLectures');
Route::get('/Feedbacks', [PageController::class, 'feedbacks'])->name('Feedbacks');
Route::get('/GenerateCertificates', [PageController::class, 'generateCertificates'])->name('GenerateCertificates');
Route::get('/MonitorHazard', [PageController::class, 'monitorHazard'])->name('MonitorHazard');
Route::get('/Employee', [PageController::class, 'employees'])->name('Employee');
Route::get('/EmergencyHotline', [PageController::class, 'emergencyHotline'])->name('EmergencyHotline');
Route::get('/HazardAreas', [PageController::class, 'hazardAreas'])->name('HazardAreas');
Route::get('/Lectures', [PageController::class, 'lectures'])->name('Lectures');
Route::get('/LectureQuiz', [PageController::class, 'lectureQuiz'])->name('LectureQuiz');
