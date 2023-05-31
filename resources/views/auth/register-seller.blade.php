<x-guest-layout>
    <div class="max-w-xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

        <h2 class="text-3xl font-bold">Complete seu cadastro</h2>

        <hr class="my-8 border-1 border-black">

        <x-splade-form action="{{ route('register.seller.request') }}" class="space-y-4 mt-5">
            <x-splade-input id="name" autocomplete="name" type="text" name="name" :label="__('Nome')" required autofocus />
            <x-splade-input id="email" autocomplete="email" type="email" name="email" :label="__('Email (usado para entrar na sua conta)')" required />
            <PasswordInput :form="form" />
            <PasswordConfirmationInput :form="form" />


            <div class="flex items-center justify-end">
                <Link class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já possui uma conta?') }}
                </Link>

                <x-splade-submit class="ml-4" :label="__('Criar conta')" />
            </div>
        </x-splade-form>

    </div>
</x-guest-layout>
