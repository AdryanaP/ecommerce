<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use ProtoneMedia\Splade\Facades\Toast;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Client::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cpf' => ['required', 'string', 'max:14', 'unique:'.Client::class, 'cpf'],
            'birthdate' => ['required', 'string'],
            'state' => ['required', 'string', 'max:2'],
            'city' => ['required', 'string'],
        ]);

        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'birthdate' => $request->birthdate,
            'state' => $request->state,
            'city' => $request->city,
            'credits' => 10000,
            'type' => "cliente",
        ]);


        $client->save();

        Auth::guard('client')->login($client);

        Toast::title('Bem-vindo!')
            ->backdrop()
            ->autoDismiss(1);

        return redirect(RouteServiceProvider::HOME);
    }
}
