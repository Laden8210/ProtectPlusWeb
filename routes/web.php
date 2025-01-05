<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('SignIn');
})->name('SignIn');

Route::get('/SignUp', function () {
    return view('SignUp');
})->name('SignUp');

Route::get('/dashboard', function () {
    return view('Dashboard');
})->name('dashboard');

Route::get('/EvacuationAreas', function () {
    return view('EvacuationAreas');
})->name('EvacuationAreas');

Route::get('/ApproveLectures', function () {
    return view('ApproveLectures');
})->name('ApproveLectures');

Route::get('/Feedbacks', function () {
    return view('Feedbacks');
})->name('Feedbacks');
Route::get('/GenerateCertificates', function () {
    return view('GenerateCertificates');
})->name('GenerateCertificates');

Route::get('/MonitorHazard', function () {
    return view('MonitorHazard');
})->name('MonitorHazard');

Route::get('/Employee', function () {
    return view('Employees');
})->name('Employee');
Route::get('/EmergencyHotline', function () {
    return view('EmergencyHotlines');
})->name('EmergencyHotline');
Route::get('/HazardAreas', function () {
    return view('HazardAreas');
})->name('HazardAreas');
Route::get('/Lectures', function () {
    return view('Lectures');
})->name('Lectures');
Route::get('/LectureQuiz', function () {
    return view('LectureQuiz');
})->name('LectureQuiz');


