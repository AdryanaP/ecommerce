<x-guest-layout>
    <h1 class="text-center font-medium text-2xl uppercase">Meus produtos</h1>
    <div class="md:max-w-[75%] m-auto my-8">
        <MyProducts :sellerId="@js(Auth::user()->id)" />
    </div>

</x-guest-layout>