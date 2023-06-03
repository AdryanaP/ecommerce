<x-guest-layout>
    <h1 class="text-center font-medium text-2xl uppercase mb-2">Minha conta</h1>

    <div class="flex flex-col items-center justify-center">
        <p>Olá <b>{{ Auth::user()->name }}</b> (não é <b>{{ Auth::user()->name }}</b>?
            <Link href="{{ route('logout-client') }}" method="GET" class="font-normal">Sair</Link>)
        </p>
        <p>Você tem <span class="text-pink-500 font-bold">{{Auth::user()->credits}} créditos</span>
        </p>
    </div>

    <h2 class="text-center font-medium text-2xl uppercase mt-6">Editar Meus Dados</h2>

    <UpdateAccount :client="@js(Auth::user())" />
    </div>

</x-guest-layout>