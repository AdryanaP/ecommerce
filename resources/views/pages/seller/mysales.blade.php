<x-guest-layout>
    <h3 class="text-center font-medium text-2xl uppercase mb-2">Minhas vendas</h3>

    <div class="flex flex-col items-center justify-between">
        <MySales :userId="@js(Auth::id())" />
    </div>
</x-guest-layout>