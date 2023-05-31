<x-guest-layout>
    <div class="max-w-xl mx-auto py-10 px-4 sm:px-6 lg:px-8">

        <h2 class="text-3xl font-bold">Complete seu cadastro</h2>

        <hr class="my-8 border-1 border-black">

        <x-splade-form action="{{ route('register.request') }}" class="space-y-4 mt-5">
            <x-splade-input id="name" type="text" name="name" :label="__('Nome')" required autofocus />
            <x-splade-input id="cpf" type="tel" name="cpf" :label="__('CPF')" required v-mask="'###.###.###-##'" />
            <x-splade-input id="birthdate" type="tel" name="birthdate" :label="__('Data de nascimento')" required v-mask="'##/##/####'" />
            <x-splade-input id="state" type="text" name="state" :label="__('Estado')" required />
            <x-splade-input id="city" type="text" name="city" :label="__('Cidade')" required />

            <x-splade-input id="email" type="email" name="email" :label="__('Email (usado para entrar na sua conta)')" required />
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
