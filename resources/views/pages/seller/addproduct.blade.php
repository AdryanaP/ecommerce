<x-guest-layout>
    <h1 class="text-center font-medium text-2xl uppercase">Adicionar produto</h1>

    <AddProducts :sellerId="@js(Auth::user()->id)" />

</x-guest-layout>