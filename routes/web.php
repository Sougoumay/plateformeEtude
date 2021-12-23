<?php

use App\Http\Controllers\Matiere;
use Illuminate\Support\Facades\Route;

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

Route::view('/layouts','layouts/layoutsPrincipale');

Route::view('/index','index');

Route::post('/createUser',[Matiere::class,'createUser'])->name('createUser');

Route::view('/register','register');

Route::group(['prefix'=>'teacher','middleware'=>'IsTeacher'],function(){
    Route::post('/createSubject',[Matiere::class,'createSubject'])->name('createSubject');
    Route::get('/createSubject/get',[Matiere::class,'createSubjectGet'])->name('createSubjectGet');
    Route::view('/accueil','teacher/Accueil');
    Route::get('/detailsSubject/{id}',[Matiere::class,'detailsSubject'])
        ->name('detailsSubject')->where(['id'=>'[0-9]+']);
    Route::get('/register',[Matiere::class,'register'])->name('register');
    Route::get('/allSubject',[Matiere::class,'allSubject'])->name('allSubject');
    Route::get('/subjectFollowedBy',[Matiere::class,'subjectFollowedBy'])->name('subjectFollowedBy');
    Route::post('/updateSubject/{id}',[Matiere::class,'updateSubject'])
        ->name('updateSubject')->where(['id'=>'[0-9]+']);
    Route::get('/updateSubjectGet/{id}',[Matiere::class,'updateSubjectGet'])
        ->name('updateSubjectGet')->where(['id'=>'[0-9]+']);
    Route::post('/deleteSubject/{id}',[Matiere::class,'deleteSubject'])
        ->name('deleteSubject')->where(['id'=>'[0-9]+']);
    Route::get('/createTaskGet/{id}',[Matiere::class,'createTaskGet'])
        ->name('createTaskGet')->where(['id'=>'[0-9]+']);
    Route::post('/createTask/{id}',[Matiere::class,'createTask'])
        ->name('createTask')->where(['id'=>'[0-9]+']);
    Route::get('/viewTask/{id}',[Matiere::class,'viewTask'])->name('viewTask');
    Route::get('/updateTaskGet/{id}',[Matiere::class,'updateTaskGet'])
        ->name('updateTaskGet')->where(['id'=>'[0-9]+']);
    Route::post('/updateTask/{id}',[Matiere::class,'updateTask'])
        ->name('updateTask')->where(['id'=>'[0-9]+']);
    Route::get('/createSolutionGet/{id}',[Matiere::class,'createSolutionGet'])
        ->name('createSolutionGet')->where(['id'=>'[0-9]+']);
});

Route::group(['prefix'=>'student'],function(){
    Route::get('/accueil',[Matiere::class,'studentAccueil'])->name('student.accueil');
    Route::get('/addSujetGet',[Matiere::class,'studentPrendreSujetGet'])
        ->name('student.prendreSujetGet');
    Route::post('/addSubject/{id}',[Matiere::class,'addSubject'])
        ->name('student.addSubject')->where(['id'=>'[0-9]+']);
    Route::get('/deleteSubject/{id}',[Matiere::class,'studentDeleteSubject'])
        ->name('student.deleteSubject')->where(['id'=>'[0-9]+']);

});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
