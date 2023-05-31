<x-guest-layout>
    <x-aside-categories>
        <x-slot name="breadcrumb">
            <Link href="{{ route('welcome') }}" class="hover:text-pink-500">Início</Link>
            /
            <span class="text-pink-500">SAC</span>
        </x-slot>

        <div class="mx-auto prose">
            <h2 class="text-3xl text-center">Mensagem enviada</h2>
        </div>

    </x-aside-categories>
</x-guest-layout>
