<x-guest-layout>

    <div class="max-w-xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold">Escolha uma senha</h2>

        <hr class="my-8 border-1 border-black">

        <!-- Session Status -->
        <x-auth-session-status class="my-4" />

        <x-splade-form :default="['email' => $request->email, 'token' => $request->route('token')]" action="{{ route('password.store') }}" class="space-y-4 mt-5">
            <!-- Email Address -->
            <x-splade-input id="email" type="email" name="email" :label="__('Email')" required autofocus />
            <x-splade-input id="password" type="password" name="password" :label="__('Senha')" required />
            <x-splade-input id="password_confirmation" type="password" name="password_confirmation" :label="__('Confirme sua senha')" required />

            <div class="flex items-center justify-end gap-4">
                <x-splade-submit :label="__('Redefinir senha')" />
            </div>
        </x-splade-form>
    </div>

</x-guest-layout>
