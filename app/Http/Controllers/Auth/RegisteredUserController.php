<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Notifications\EmailNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Client::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cpf' => ['required', 'string', 'max:14', 'unique:' . Client::class, 'cpf'],
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

        $data = [
            'subject' => 'Confime seu email para ganhar créditos!',
            'greeting' => 'Olá '.$client->name.', seja bem-vindo(a) ao 5labs!',
            'body' => 'Confirme seu email para ganhar 1.000 créditos. É muito simples! Basta clicar no botão abaixo:',
            'thanks' => 'Bom ter você conosco!',
            'actionText' => 'Ganhe 1.000 créditos',
            'actionURL' => url('/confirmar-email/' . $client->id),
        ];

        Auth::guard('seller')->logout();
        Auth::guard('client')->login($client);

        Notification::send($client, new EmailNotification($data));

        Toast::title('Bem-vindo! Confirme seu email para ganahr créditos')
            ->backdrop()
            ->autoDismiss(5);

        return redirect(RouteServiceProvider::HOME);
    }
}
