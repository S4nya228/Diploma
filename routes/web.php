<?php

use Illuminate\Support\Facades\Route;

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
Route::group(["namespace" => "App\Http\Controllers\User\Email"], function () {
    Route::get('/email/verify', EmailVerificationPromtController::class)->middleware('auth')->name(
        'verification.notice'
    );
    Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)->middleware(['auth', 'signed'])->name(
        'verification.verify'
    );
    Route::post('/email/verification-notification', EmailVerificationNotificationController::class)->middleware(
        ['auth']
    )->name('verification.send');
});
Route::middleware("auth")->group(function () {
    Route::get("/logout", function () {
        auth("web")->logout();
        return redirect()->route("main.index");
    })->name("logout");
    Route::group(["namespace" => "App\Http\Controllers\User"], function () {
        Route::group(['namespace' => 'Profile'], function () {
            Route::patch("/account/{user}", UpdateController::class)->name("user.profile.update");
        });
        Route::group(['namespace' => 'ProfileContent'], function () {
            Route::group(['namespace' => 'MyProp'], function () {
                Route::get("/account/my_prop", IndexController::class)->name("user.my-prop.index");
            });
            Route::group(['namespace' => 'MyVotes'], function () {
                Route::get("/account/my_votes", IndexController::class)->name("user.my-votes.index");
            });
            Route::group(['namespace' => 'MyFavorite'], function () {
                Route::get("/account/favorite", IndexController::class)->name("user.favorite.index");
            });
        });
        Route::group(['namespace' => 'ProfileDetails'], function () {
            Route::get("/account/personal_details", ShowController::class)->name("user.personal-details");
        });
    });
    Route::group(['namespace' => "App\Http\Controllers"], function () {
        Route::group(['namespace' => "Proposals"], function () {
            Route::get("/proposals/add", CreateController::class)->name("proposals.create");
            Route::post("/proposals/add", StoreController::class)->name("proposals.store");
        });
    });
});

Route::group(['namespace' => "App\Http\Controllers"], function () {
    Route::group(['namespace' => "HomePage"], function () {
        Route::get("/", IndexController::class)->name("main.index");
    });
    Route::group(['namespace' => "Help"], function () {
        Route::get("/help/{id}", IndexController::class)->name("help.index");
    });
    Route::group(['namespace' => "Proposals"], function () {
        Route::get("/proposals/{proposal}", ShowController::class)->name("proposals.show");
    });
    Route::group(['namespace' => "Terms"], function () {
        Route::get("/terms_and_conditions", IndexController::class)->name("terms.index");
    });
});

Route::middleware("guest")->group(function () {
    Route::group(["namespace" => "App\Http\Controllers\User"], function () {
        Route::group(['namespace' => 'Authorization'], function () {
            Route::get("/login", IndexController::class)->name("login");
            Route::post("/login_process", StoreController::class)->name("login_process");
        });
        Route::group(['namespace' => 'Registration', "prefix" => "registration"], function () {
            Route::get("/", IndexController::class)->name("register");
            Route::post("/register_process", StoreController::class)->name("register_process");
        });
    });
    Route::group(["namespace" => "App\Http\Controllers\User\Authorization"], function () {
        Route::group(['namespace' => 'ForgotPassword'], function () {
            Route::get("/forgot_password", IndexController::class)->name("forgot.index");
            Route::post("/forgot_password/", StoreController::class)->name("forgot.store");
        });
        Route::group(['namespace' => 'ResetPassword'], function () {
            Route::get("/reset_password/{token}", IndexController::class)->name("reset.index");
            Route::patch("/reset_password/{token}", UpdateController::class)->name("reset.update");
        });
    });
});

Route::group(["namespace" => "App\Http\Controllers\Admin", "prefix" => "admin", "middleware" => ['auth', 'admin']],
    function () {
        Route::get("/", IndexController::class)->name("admin.index");

        Route::group(["namespace" => "Proposals", "prefix" => "proposals"], function () {
            Route::get("/", IndexController::class)->name("admin.proposals.index");
            Route::get("/{proposal}", ShowController::class)->name("admin.proposals.show");
            Route::get("/edit/{proposal}", EditController::class)->name("admin.proposals.edit");
            Route::patch("/edit/{proposal}", UpdateController::class)->name("admin.proposals.update");
            Route::delete("/{proposal}", DestroyController::class)->name("admin.proposals.destroy");
        });
        Route::group(["namespace" => "Roles", "prefix" => "roles"], function () {
            Route::get("/", IndexController::class)->name("admin.roles.index");
            Route::get("/create", CreateController::class)->name("admin.roles.create");
            Route::post("/create", StoreController::class)->name("admin.roles.store");
            Route::get("/edit/{roles}", EditController::class)->name("admin.roles.edit");
            Route::patch("/edit/{roles}", UpdateController::class)->name("admin.roles.update");
            Route::delete("/{roles}", DestroyController::class)->name("admin.roles.destroy");
        });
        Route::group(["namespace" => "Users", "prefix" => "users"], function () {
            Route::get("/", IndexController::class)->name("admin.users.index");
            Route::get("/{user}", ShowController::class)->name("admin.users.show");
            Route::get("/edit/{user}", EditController::class)->name("admin.users.edit");
            Route::patch("/edit/{user}", UpdateController::class)->name("admin.users.update");
            Route::delete("/{user}", DestroyController::class)->name("admin.users.destroy");
        });
        Route::group(["namespace" => "Help", "prefix" => "helps"], function () {
            Route::get("/", IndexController::class)->name("admin.helps.index");
            Route::get("/{help}", ShowController::class)->name("admin.helps.show");
            Route::delete("/{help}", DestroyController::class)->name("admin.helps.destroy");
            Route::get("/edit/{help}", EditController::class)->name("admin.helps.edit");
            Route::patch("/edit/{help}", UpdateController::class)->name("admin.helps.update");
            Route::get("/help/create", CreateController::class)->name("admin.helps.create");
            Route::post("/create", StoreController::class)->name("admin.helps.store");
        });
    });

