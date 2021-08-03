<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Middleware\TrustHosts;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/profile/', [UserController::class, 'profile'])->name('user.profile');
Route::get('/portfolio', [UserController::class, 'userportfolio'])->name('portfolio');

Route::post('/portfolio/submit', [PortfolioController::class, 'add'])->name('media.portfolio');
Route::post('/portfolio/submit/socials', [PortfolioController::class, 'socials'])->name('media.links');



Route::get('/portfolio/view/', [PortfolioController::class, 'portflio_view'])->name('portfolio.view');
Route::get('/portfolio/edit/{id}/', [PortfolioController::class, 'portflio_edit'])->name('portfolio.edit');
Route::get('/portfolio/delete/{id}/', [PortfolioController::class, 'portflio_delete'])->name('portfolio.delete');
Route::post('/portfolio/view/update/', [PortfolioController::class, 'portfolio_update'])->name('portfolio.update');

Route::get('/portfolio/socials/view/', [PortfolioController::class, 'socials_view'])->name('socials.view');

Route::get('/portfolio/socials/edit/{id}/', [PortfolioController::class, 'socials_edit'])->name('socials.edit');
Route::get('/portfolio/socials/delete/{id}/', [PortfolioController::class, 'socials_delete'])->name('socials.delete');
Route::post('/portfolio/socials/update/socials/', [PortfolioController::class, 'socials_update'])->name('socials.update');

Route::get('/portfolio/view/edit/', [PortfolioController::class, 'portflio_edit'])->name('portfolio.edit');


Route::get('/edit/user/', [UserController::class, 'edit'])->name('user.edit');





Route::post('/edit/user/avatar/', [UserController::class, 'update_avatar'])->name('user.avatarupdate');
Route::post('/edit/user/profile', [UserController::class, 'update'])->name('user.update');
Route::post('/portfolio/view/edit/description', [UserController::class, 'description_update'])->name('user.description_update');
Route::get('/edit/password/user/', [UserController::class, 'passwordEdit'])->name('password.edit');
Route::post('/edit/password/user/', [UserController::class, 'passwordUpdate'])->name('passwordChange.update');


Route::get('/forgot-password', function () {
    return view('auth.passwords.request');
})->middleware('guest')->name('request');
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');


Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', function () {
  return view('posts.home');
})->name('home');


// Route::get(
//     '/edit/user/portfolio',
//     [UserController::class, 'userportfolio']
// )->middleware('auth.api')->name('portfolio');

