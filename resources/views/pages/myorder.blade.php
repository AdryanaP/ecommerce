<x-guest-layout>

    <div class="max-w-7xl mx-auto pt-10 pb-10 px-4 sm:px-6 lg:px-8 space-y-4 prose text-justify">

        <h3 class="uppercase font-bold text-2xl text-center mb-10">Pedido {{ $order->uuid }}</h3>

        <div class="flex flex-col lg:flex-row items-start justify-between gap-20">
            <x-aside-profile>
                <MyOrder :order="@js($order)" :user="@js(Auth::id())"/>
            </x-aside-profile>
        </div>

    </div>

</x-guest-layout>
