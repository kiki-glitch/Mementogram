<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Middleware\TrustHosts;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HiquipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminControleer;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioHubController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;




Route::get('/dashboard/', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/contact/{id}/', [ContactController::class, 'contact_form'])->name('contact');
Route::get('/contact/success/')->name('contact.success');
Route::post('/contact/', [ContactController::class, 'contact_form_save'])->name('contact.save');


Route::get('/hiquip/', [HiquipController::class, 'hiquipview'])->name('hiquip');
Route::get('/hiquip/product/productid/{id}/', [HiquipController::class, 'hiquipview_product'])->name('hiquip.product');
Route::get('/hiquip/add_to_cart/{product}/', [HiquipController::class, 'add_to_cart'])->name('cart.add')->middleware('auth');
Route::get('/hiquip/cart/', [HiquipController::class, 'cart'])->name('cart.index')->middleware('auth');
Route::get('/hiquip/cart/destroy/{itemId}/', [HiquipController::class, 'cart_destroy'])->name('cart.destroy')->middleware('auth');
Route::post('/hiquip/cart/update/{itemId}/', [HiquipController::class, 'cart_update'])->name('cart.update')->middleware('auth');
Route::get('/hiquip/cart/ceckout/', [HiquipController::class, 'checkout'])->name('cart.checkout');
Route::post('/hiquip/cart/orders/', [HiquipController::class, 'checkout_order'])->name('orders.store')->middleware('auth');



Route::get('/admin/user/view/', [AdminControleer::class, 'user_view'])->name('admin_user.view');
Route::get('/admin/add user/view/', [AdminControleer::class, 'adduser_view'])->name('add_user');
Route::get('/admin/user/portfolios/', [AdminControleer::class, 'portfolios_view'])->name('portfolios.view');
Route::get('/admin/user/social links/', [AdminControleer::class, 'sociallinks_view'])->name('usersocials.view');
Route::get('/admin/hiquip/view/', [AdminControleer::class, 'hiquip_view'])->name('admin.hiquip_view');
Route::get('/admin/add product/view/', [AdminControleer::class, 'addproduct_view'])->name('add_product');
Route::post('/admin/add product/', [AdminControleer::class, 'addproduct'])->name('add.product');
Route::get('/admin/reset/password/user/{id}/', [AdminControleer::class, 'passwordEdit'])->name('userpassword.edit');
Route::post('/admin/edit/password/user/', [AdminControleer::class, 'passwordUpdate'])->name('userpasswordChange.update');
Route::get('/admin/delete/password/user/{id}/', [AdminControleer::class, 'user_delete'])->name('user.softdelete');
Route::get('/admin/restore/password/user/{id}/', [AdminControleer::class, 'user_restore'])->name('user.restore');
Route::get('/admin/permanent/delete/password/user/{id}/', [AdminControleer::class, 'user_forcedelete'])->name('user.forcedelete');

Route::get('/admin/edit/user/{id}/', [AdminControleer::class, 'editUserView'])->name('admin.editUserView');
Route::post('/admin/update/profile/user/', [AdminControleer::class, 'adminUser_update'])->name('adminUser.update');
Route::get('/admin/delete/portfilio/user/{id}/', [AdminControleer::class, 'portfolio_delete'])->name('user.softdelete');
Route::get('/admin/delete/sociallinks/user/{id}/', [AdminControleer::class, 'sociallinks_delete'])->name('sociallinks.softdelete');
Route::get('/admin/restore/sociallinks/user/{id}/', [AdminControleer::class, 'sociallinks_restore'])->name('sociallinks.restore');
Route::get('/admin/restore/portfolio/user/{id}/', [AdminControleer::class, 'portfolio_restore'])->name('portfolio.restore');
Route::get('/admin/permanent/delete/sociallinks/user/{id}/', [AdminControleer::class, 'sociallink_forcedelete'])->name('sociallinks.forcedelete');
Route::get('/admin/permanent/delete/portfolio/user/{id}/', [AdminControleer::class, 'portfolios_forcedelete'])->name('portfolios.forcedelete');
Route::post('/admin/add/user', [AdminControleer::class, 'add_user'])->name('add.user');
Route::post('/admin/edit/useravatar', [AdminControleer::class, 'edit_useravatar'])->name('admin.user.avatarupdate');
Route::post('/admin/edit/user_description', [AdminControleer::class, 'edit_user_description'])->name('admin.user.user_description');




Route::get('/profile/', [UserController::class, 'profile'])->name('user.profile');
Route::get('/portfolio', [UserController::class, 'userportfolio'])->name('portfolio');

Route::get('/portfoliohub/', [PortfolioHubController::class, 'userportfolio'])->name('portfoliohub');
Route::get('/portfoliohub/view/user/{id}/', [PortfolioHubController::class, 'portfoliohub_view'])->name('portfoliohub.view');

Route::post('/portfolio/submit', [PortfolioController::class, 'add'])->name('media.portfolio');
Route::post('/portfolio/submit/socials', [PortfolioController::class, 'socials'])->name('media.links');



Route::get('/portfolio/view/', [PortfolioController::class, 'portflio_view'])->name('portfolio.view');
Route::get('/portfolio/edit/{id}/', [PortfolioController::class, 'portflio_edit'])->name('portfolio.edit');
Route::get('/portfolio/disable/{id}/', [PortfolioController::class, 'portflio_delete'])->name('portfolio.delete');
Route::get('/portfolio/restore/{id}/', [PortfolioController::class, 'portflio_restore'])->name('portfolio.delete');
Route::get('/portfolio/force_delete/{id}/', [PortfolioController::class, 'portflio_forcedelete'])->name('portfolio.delete');
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
  return view('layout.sidebar');
})->name('home');


// Route::get(
//     '/edit/user/portfolio',
//     [UserController::class, 'userportfolio']
// )->middleware('auth.api')->name('portfolio');

