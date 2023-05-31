<x-guest-layout>

    <div class="max-w-xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold">Recuperação de senha</h2>

        <hr class="my-8 border-1 border-black">

        <span>Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um e-mail com um link de redefinição de senha que permitirá que você escolha uma nova.</span>

        <!-- Session Status -->
        <x-auth-session-status class="my-4" />

        <x-splade-flash>
            <div v-if="flash.has('status')">
                <x-splade-modal opened>
                    <h1 class="font-medium text-xl text-center text-green-600">Enviamos seu link de redefinição de senha por e-mail!</h1>

                    <div class="flex justify-center mt-4">
                        <Link href="{{ route('login') }}" class="uppercase font-bold justify-center inline-flex items-center rounded-sm border border-pink-500 px-3 text-white py-3 leading-4 bg-pink-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">
                            OK, fechar!
                        </Link>
                    </div>
                </x-splade-modal>
            </div>
        </x-splade-flash>



        <x-splade-form action="{{ route('password.email') }}" class="space-y-4 mt-5">
            <!-- Email Address -->
            <x-splade-input id="email" type="email" name="email" :label="__('Email')" required autofocus />

            <div class="flex items-center justify-end gap-4">
                <x-splade-submit :label="__('Recuperar senha')" />
            </div>
        </x-splade-form>
    </div>

</x-guest-layout>
