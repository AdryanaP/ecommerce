<x-guest-layout>
    <h3 class="text-center font-medium text-2xl uppercase mb-2">Meus pedidos</h3>

    <div class="flex flex-col items-center justify-between">
        <MyOrders :userId="@js(Auth::id())" />
    </div>
</x-guest-layout>