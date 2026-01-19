<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DashboardController;
use App\Http\Controllers\api\TeamController;
use App\Http\Controllers\api\PostController;

Route::get('/user', function (Request $request) {
    dd($request);
    return $request->user();
});

Route::prefix('user-management-system')->name('user-management-system.api.')->group(function () {

    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/user-detail/{id}', [DashboardController::class, 'userDetail']);

    // Route::get('/add-user/{id?}', [TailwindUserontroller::class, 'addUser'])->name('addUser');
    // Route::post('/create-user/{id?}', [TailwindUserontroller::class, 'createUser'])->name('createUser');
    // Route::get('/user-delete/{id}', [TailwindUserontroller::class, 'userDelete'])->name('userDelete');

    // Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('team')->name('team.')->group(function () {
            Route::get('/team-list', [TeamController::class, 'teamList']);
            Route::get('/team-list/{id}', [TeamController::class, 'teamDetail']);
            Route::post('/create-team', [TeamController::class, 'createTeam']);
            Route::delete('/team-delete/{id}', [TeamController::class, 'teamDelete']);

            Route::get('/team-member-list/{id}', [TeamController::class, 'memberList'])->name('memberList');
            Route::post('/add-team-member/{id}', [TeamController::class, 'addMember'])->name('addMember');
            Route::delete('/delete-team-member/{id}', [TeamController::class, 'deleteMember'])->name('deleteMember');
        });
        Route::prefix('post')->name('post.')->group(function () {
            Route::get('/post-list', [PostController::class, 'postList'])->name('postList');
            Route::get('/post-view/{id}', [PostController::class, 'postView'])->name('postView');
            Route::post('/add-post/{id?}', [PostController::class, 'addPost'])->name('addPost');
            Route::delete('/delete-post/{id}', [PostController::class, 'deletePost'])->name('deletePost');

        });

        Route::post('/logout', [AuthController::class, 'logout']);
    });
// });
