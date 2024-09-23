<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;/*コントローラーの位置*/
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;


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
Route::get('/website', [WebsiteController::class, 'index']);/*ルーティング、コントローラーを経由*/

Route::get('/users', [UserController::class, 'index']);

Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::get('/quizzes/{id}', [QuizController::class, 'show'])->name('quizzes.show');

// 編集画面を表示するルート 
Route::get('/quizzes/{id}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
// クイズタイトルを更新するルート
Route::put('/quizzes/{id}', [QuizController::class, 'update'])->name('quizzes.update');
// ※nameはルートにアクセスするときの名前、viewをリターンする時はeditとかのbladeの名前でいい

Route::delete('/quizzes/{id}', [QuizController::class, 'destroy'])->name('quizzes.destroy');


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/quizzes/create', [AdminController::class, 'create'])->name('quizzes.create');
    Route::post('/quizzes', [AdminController::class, 'store'])->name('quizzes.store');

    // 管理画面のダッシュボードへのルート
    Route::get('/quizzes/start', [AdminController::class, 'index'])->name('quizzes.start');

    Route::get('/quizzes/{quiz}/questions', [AdminController::class, 'listQuestions'])->name('quizzes.questions.index');
    Route::get('/quizzes/{quiz}/questions/create', [AdminController::class, 'createQuestion'])->name('quizzes.questions.create');
    Route::post('/quizzes/{quiz}/questions', [AdminController::class, 'storeQuestion'])->name('quizzes.questions.store');

    Route::get('/quizzes/{quiz}/questions/{question}/edit', [AdminController::class, 'editQuestion'])->name('quizzes.questions.edit');
    Route::put('/quizzes/{quiz}/questions/{question}', [AdminController::class, 'updateQuestion'])->name('quizzes.questions.update');

    Route::delete('/quizzes/{quiz}/questions/{question}', [AdminController::class, 'destroyQuestion'])->name('quizzes.questions.destroy');

});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
