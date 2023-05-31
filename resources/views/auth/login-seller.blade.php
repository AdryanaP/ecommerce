<x-guest-layout>
    <div class="max-w-6xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="flex-none md:flex justify-between gap-32">

            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold">Já possui uma conta?</h2>

                <hr class="my-8 border-1 border-black">

                <span>Se você tiver uma conta, faça login com seu endereço de e-mail.</span>

                <!-- Session Status -->
                <x-auth-session-status class="my-4" />

                <x-splade-form action="{{ route('login.seller') }}" class="space-y-4 mt-5">
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

            <div class="w-full md:w-1/2 mt-10 sm:mt-0">
                <h2 class="text-3xl font-bold">Novos clientes</h2>

                <hr class="my-8 border-1 border-black">

                <span>Criar uma conta tem muitos benefícios: check-out mais rápido, manter mais de um endereço, rastrear pedidos e muito mais.</span>

                <div>
                    <Link href="{{ route('register.seller') }}" class="inline-flex uppercase font-bold justify-center mt-5 items-center rounded-sm border border-pink-500 px-3 py-3 leading-4 text-pink-500 hover:bg-pink-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">
                        Crie a sua conta aqui
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </Link>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
