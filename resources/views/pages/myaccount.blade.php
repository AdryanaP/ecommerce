<x-guest-layout>

    <div class="max-w-7xl mx-auto pt-10 pb-10 px-4 sm:px-6 lg:px-8 space-y-4 prose text-justify">

        <h3 class="uppercase font-bold text-2xl text-center mb-10">Minha conta</h3>

        <div class="flex flex-col lg:flex-row items-start justify-between gap-20">
            <x-aside-profile>
                <p>Olá <b>{{ Auth::user()->name }}</b> (não é <b>{{ Auth::user()->name }}</b>?
                    <Link href="{{ route('logout') }}" method="POST" class="font-normal">Sair</Link>)
                </p>

                <p>No painel da sua conta, você pode visualizar seus
                    <Link href="{{ route('pages.myorders') }}" class="font-normal">pedidos recentes</Link>, gerenciar seus endereços de envio e cobrança e editar sua senha e
                    <a href="{{ route('pages.mypersonaldata') }}" class="font-normal">detalhes da conta</a>.
                </p>
            </x-aside-profile>
        </div>

    </div>

</x-guest-layout>
