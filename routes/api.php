<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\DashboardController;
use App\Http\Controllers\api\TeamController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\PermissionController;

Route::get('/user', function (Request $request) {
    dd($request);
    return $request->user();
});

Route::get('/', [ClientController::class, 'client']);
Route::prefix('user-management-system')->name('user-management-system.api.')->group(function () {

    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/user-detail/{id}', [DashboardController::class, 'userDetail']);

    // Route::get('/add-user/{id?}', [TailwindUserontroller::class, 'addUser'])->name('addUser');
    // Route::post('/create-user/{id?}', [TailwindUserontroller::class, 'createUser'])->name('createUser');
    // Route::get('/user-delete/{id}', [TailwindUserontroller::class, 'userDelete'])->name('userDelete');

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('team')->name('team.')->group(function () {
            Route::get('/team-list', [TeamController::class, 'teamList']);
            Route::get('/team-list/{id}', [TeamController::class, 'teamDetail']);
            Route::post('/create-team', [TeamController::class, 'createTeam']);
            Route::delete('/team-delete/{id}', [TeamController::class, 'teamDelete']);

            Route::get('/team-member-list/{id}', [TeamController::class, 'memberList']);
            Route::post('/add-team-member/{id}', [TeamController::class, 'addMember']);
            Route::delete('/delete-team-member/{id}', [TeamController::class, 'deleteMember']);
        });
        Route::prefix('post')->name('post.')->group(function () {
            Route::get('/post-list', [PostController::class, 'postList']);
            Route::get('/post-view/{id}', [PostController::class, 'postView']);
            Route::post('/add-post/{id?}', [PostController::class, 'addPost']);
            Route::delete('/delete-post/{id}', [PostController::class, 'deletePost']);
        });
        Route::prefix('permission')->name('permission.')->group(function () {
            Route::get('/permission-list', [PermissionController::class, 'permissionList']);
            Route::get('/add-permission/{id?}', [PermissionController::class, 'addPermission'])->name('addPermission');
            Route::post('/create-permission/{id?}', [PermissionController::class, 'createPermission'])->name('createPermission');
            Route::get('/delete-permission/{id}', [PermissionController::class, 'deletePermission'])->name('deletePermission');
        });

        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
