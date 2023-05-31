<x-guest-layout>
    <h1 class="text-center font-medium text-2xl uppercase">Todos os produtos</h1>
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-[75%] m-auto my-8">
        @foreach($products as $product)
        <ProductCard :product="@js($product)" />
        @endforeach
    </div>

</x-guest-layout>