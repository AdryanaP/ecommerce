<x-guest-layout>
    <h1 class="text-center font-medium text-2xl uppercase">Meus produtos</h1>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-[75%] m-auto my-8">
        <MyProducts :sellerId="@js(Auth::user()->id)" />
    </div>

</x-guest-layout>