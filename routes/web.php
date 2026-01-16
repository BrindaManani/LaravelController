<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Tailwind\HomeController as TailwindHomeController;
use App\Http\Controllers\Tailwind\UserController as TailwindUserontroller;
use App\Http\Controllers\Tailwind\AuthController as TailwindAuthontroller;
use App\Http\Controllers\Tailwind\PermissionController as TailwindPermissionController;
use App\Http\Controllers\Tailwind\DepartmentController as TailwindDepartmentController;
use App\Http\Controllers\Tailwind\TeamController as TailwindTeamController;
use App\Http\Controllers\Tailwind\PostController as TailwindPostController;
use App\Http\Middleware\DataMiddleware;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::get('/add/{id?}', [UserController::class, 'addUser'])->name('addUser');
Route::post('/createUser', [UserController::class, 'createUser'])->name('createUser');
Route::get('/userdelete/{id}', [UserController::class, 'userdelete'])->name('userdelete');
Route::get('/delete', function () {
    session()->forget('users');
});

Route::prefix('user-management-system')->name('user-management-system.')->group(function () {
    Route::get('/register-form', [TailwindAuthontroller::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [TailwindAuthontroller::class, 'register'])->name('register');

    Route::get('/login-form', [TailwindAuthontroller::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [TailwindAuthontroller::class, 'login'])->name('login');

    Route::get('/', [TailwindHomeController::class, 'index'])->name('index');
    Route::get('/user-list', [TailwindHomeController::class, 'userList'])->name('userList');
    Route::get('/user-detail/{id}', [TailwindHomeController::class, 'userDetail'])->name('userDetail');

    Route::get('/add-user/{id?}', [TailwindUserontroller::class, 'addUser'])->name('addUser');
    Route::post('/create-user/{id?}', [TailwindUserontroller::class, 'createUser'])->name('createUser');
    Route::get('/user-delete/{id}', [TailwindUserontroller::class, 'userDelete'])->name('userDelete');

    Route::prefix('permission')->name('permission.')->group(function(){
        Route::get('/permission-list', [TailwindPermissionController::class, 'permissionList'])->name('permissionList');
        Route::get('/add-permission/{id?}', [TailwindPermissionController::class, 'addPermission'])->name('addPermission');
        Route::post('/create-permission/{id?}', [TailwindPermissionController::class, 'createPermission'])->name('createPermission');
        Route::get('/delete-permission/{id}', [TailwindPermissionController::class, 'deletePermission'])->name('deletePermission');
    });
    Route::prefix('department')->name('department.')->group(function(){
        Route::get('/department-list', [TailwindDepartmentController::class, 'deptList'])->name('deptList');
        Route::get('/add-dept/{id?}', [TailwindDepartmentController::class, 'addDept'])->name('addDept');
        Route::post('/create-dept/{id?}', [TailwindDepartmentController::class, 'createDept'])->name('createDept');
        Route::get('/department-delete/{id}', [TailwindDepartmentController::class, 'deptDelete'])->name('deptDelete');

        Route::get('/department-member-list/{id}', [TailwindDepartmentController::class, 'memberList'])->name('memberList');
        Route::get('/add-department-member/{id}', [TailwindDepartmentController::class, 'addMember'])->name('addMember');
        Route::post('/create-department-member/{id}', [TailwindDepartmentController::class, 'createMember'])->name('createMember');
        Route::get('/delete-team-member/{id}', [TailwindDepartmentController::class, 'deleteMember'])->name('deleteMember');
    }); 

    Route::prefix('team')->name('team.')->group(function(){
        Route::get('/team-list', [TailwindTeamController::class, 'teamList'])->name('teamList');
        Route::get('/add-team', [TailwindTeamController::class, 'addTeam'])->name('addTeam');
        Route::post('/create-team', [TailwindTeamController::class, 'createTeam'])->name('createTeam');
        Route::get('/team-delete/{id}', [TailwindTeamController::class, 'teamDelete'])->name('teamDelete');

        Route::get('/add-team-member', [TailwindTeamController::class, 'addMember'])->name('addMember');
        Route::post('/create-team-member', [TailwindTeamController::class, 'createTeamMember'])->name('createTeamMember');
        Route::get('/team-member-list/{id}', [TailwindTeamController::class, 'memberList'])->name('memberList');
        Route::get('/add-team-member/{id}', [TailwindTeamController::class, 'addMember'])->name('addMember');
        Route::post('/create-team-member/{id}', [TailwindTeamController::class, 'createMember'])->name('createMember');
        Route::get('/delete-team-member/{id}', [TailwindTeamController::class, 'deleteMember'])->name('deleteMember');
    });

    Route::prefix('post')->name('post.')->group(function(){
        Route::get('/post-list', [TailwindPostController::class, 'postList'])->name('postList');
        Route::get('/add-post/{id?}', [TailwindPostController::class, 'addPost'])->name('addPost');
        Route::post('/create-post/{id?}', [TailwindPostController::class, 'createPost'])->name('createPost');
        Route::get('/delete-post/{id}', [TailwindPostController::class, 'deletePost'])->name('deletePost');
    });
});


require __DIR__.'/auth.php';
