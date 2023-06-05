<x-guest-layout>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="flex  justify-center gap-32">
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold">Já possui uma conta?</h2>

                <hr class="my-8 border-1 border-black">

                <span>Se você tiver uma conta, faça login com seu endereço de e-mail.</span>

                <!-- Session Status -->
                <x-auth-session-status class="my-4" />

                <x-splade-form action="{{ route('login') }}" class="space-y-4 mt-5">
                    <x-splade-input id="email" type="email" name="email" :label="__('Email')" required />
                    <PasswordInput :form="form" />

                    <div class="flex items-center justify-end gap-4">
                        @if (Route::has('password.request'))
                            <Link class="underline text-sm hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </Link>
                        @endif

                        <x-splade-submit :label="__('Entrar')" />
                    </div>
                </x-splade-form>
            </div>
        </div>
    </div>
</x-guest-layout>
