<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Seller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function pageClientLogin()
    {
        return view('auth.login-client');
    }

    public function pageSellerLogin()
    {
        return view('auth.login-seller');
    }

    public function clientLogin(LoginRequest $request)
    {
        $request->authenticate();

        Auth::guard('seller')->logout();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function sellerLogin(Request $request)
    {

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        $seller = Seller::where('email', $request->email)->first();
        info($seller);
        if (!empty($seller)) {
            if ($seller?->status != "aprovado") {
                Toast::title('Opss!')
                    ->warning()
                    ->message('Seu cadastro como vendedor está ' . $seller->status)
                    ->backdrop()
                    ->autoDismiss(5);
                return redirect(RouteServiceProvider::HOME);
            }
        }

        if (\Auth::guard('seller')->attempt($request->only(['email', 'password']), $request->get('remember'))) {
            Auth::guard('client')->logout();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function adminLogin(Request $request)
    {

        $admin = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        if (\Auth::guard('admin')->attempt($request->only(['email', 'password']), $request->get('remember'))) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */

    public function logoutSeller()
    {
        Auth::guard('seller')->logout();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logoutClient()
    {
        Auth::guard('client')->logout();
        info("aa");

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
