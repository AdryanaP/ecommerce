<x-guest-layout>
    <div class="mx-auto md:max-w-6xl md:px-6 lg:px-4 md:py-12">
        <x-splade-lazy>
            <x-slot:placeholder>
                <div class="col-span-full flex justify-center items-center h-64">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </x-slot:placeholder>

            <h2 class="uppercase font-medium">
                <Link href="{{ route('welcome') }}" class="hover:text-pink-500">Início</Link>
                /
                <Link href="/" class="hover:text-pink-500">{{ $product->category }}</Link>
                /
                <span class="text-pink-500">{{ $product->name }}</span>
            </h2>

            <ProductPage :product="@js($product)" :seller="@js($seller)" :client="@js(Auth::user())" />
        </x-splade-lazy>
    </div>
</x-guest-layout>
