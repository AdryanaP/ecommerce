<x-guest-layout>

    <div class="max-w-7xl mx-auto pt-10 pb-10 px-4 sm:px-6 lg:px-8 space-y-4 prose text-justify">

        <h3 class="uppercase font-bold text-2xl text-center mb-10">Meus dados</h3>

        <div class="flex flex-col lg:flex-row items-start justify-between gap-20">
            <x-aside-profile>
                <MyAddresses :user="@js(Auth::user())"/>
                <!-- <x-splade-form action="{{ route('pages.mypersonaldata.update') }}" :default="$user" class="space-y-4 mt-5">
                    <x-splade-input id="name" type="text" name="name" :label="__('Nome')" required autofocus />
                    <x-splade-input id="document" type="tel" name="document" :label="__('CPF')" required placeholder="Digite somente números" v-mask="'###.###.###-##'" />
                    <x-splade-input id="birthdate" type="tel" name="birthdate" :label="__('Data de nascimento')" required placeholder="dd/mm/aaaa" v-mask="'##/##/####'" />
                    <x-splade-input id="cellphone" type="tel" name="cellphone" :label="__('Celular')" required placeholder="Digite somente números" v-mask="'(##) #####-####'" />
                    <x-splade-input id="email" type="email" name="email" :label="__('Email')" required />

                    <div class="grid gap-y-6 text-gray-800 py-4">
                        <x-splade-group name="genre" id="genre" label="Com qual gênero você se identifica?" inline>
                            <x-splade-radio name="genre" value="f" label="Feminino" />
                            <x-splade-radio name="genre" value="m" label="Masculino" />
                        </x-splade-group>

                        <x-splade-checkbox name="newsletter" value="1" label="Receber novidades, promoções e ofertas personalizadas" />

                    </div>

                    <div class="flex items-center justify-end mt-2">
                        <x-splade-submit class="ml-4" :label="__('Salvar')" />
                    </div>
                </x-splade-form> -->
            </x-aside-profile>
        </div>

    </div>

</x-guest-layout>
