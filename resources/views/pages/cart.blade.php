<x-guest-layout>

    <div class="max-w-4xl mx-auto pt-10 pb-10 px-4 sm:px-6 lg:px-8 space-y-4 prose text-justify">

        <h3 class="uppercase font-bold text-2xl text-center mb-10">Minha sacola</h3>

        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            @if(!$cartItems->count())
                Sua sacola está vazia.
            @else
                <!-- Produtos -->
                <div>
                    <ul role="list" class="divide-y divide-gray-200 border-t border-b border-gray-200">
                        @foreach($cartItems as $item)
                            <li class="flex items-center py-2">
                                <div class="flex-shrink-0">
                                    <img src="{{ $item->attributes['image'] }}" class="h-24 w-24 rounded-lg object-cover object-center sm:h-24 sm:w-24">
                                </div>

                                <div class="relative ml-4 flex flex-1 items-center justify-between sm:ml-6">
                                    <div class="flex flex-col">
                                        <div class="pr-6">
                                            <h3 class="text-sm">
                                                <Link href="{{ route('pages.product', $item->attributes['slug']) }}" class="font-medium text-gray-700 hover:text-gray-800">{{ $item->name }}</Link>
                                            </h3>
                                            <p class="mt-1 text-sm text-gray-500">{{ $item->attributes['parentName'] }}</p>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <x-splade-form :default="$item" action="{{ route('cart.update') }}" method="post" class="flex justify-center items-center gap-1">
                                            <x-splade-input type="number" name="quantity" min="1" value="{{ $item->quantity }}" max="{{ $item->attributes['maxInStock'] }}" class="w-16 text-lg border-none focus:border-pink-500 focus:ring-pink-500" />
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                </svg>
                                            </button>
                                        </x-splade-form>

                                        <Link href="{{ route('cart.remove') }}" method="POST" :data="[{{ $item->id }}]" class="font-light text-sm text-pink-500 hover:text-pink-600 sm:ml-0 sm:mt-3 no-underline">
                                            Remover
                                        </Link>
                                    </div>

                                    <p class="text-right text-sm font-medium text-gray-900">R$ {{ number_format(($item->price / 100) * ($item->quantity), 2, ',', '.') }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Resumo -->
                <div class="mt-10 sm:ml-32 sm:pl-6">
                    <div class="rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:p-8">
                        <div class="flow-root">
                            <dl class="-my-4 divide-y divide-gray-200 text-sm">
                                <div class="flex items-center justify-between py-4">
                                    <dt class="text-gray-600">Subtotal</dt>
                                    <dd class="font-medium text-gray-900">R$ {{ number_format(str_replace(',', '', \Cart::session(Auth::id())->getSubTotal()) / 100, 2, ',', '.') }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <div class="mt-10">
                        <Link href="{{ route('checkout') }}"
                                class="w-full uppercase no-underline flex justify-center items-center rounded-sm border border-transparent bg-pink-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-50"
                        >
                            Ir para pagamento
                        </Link>
                    </div>

                    <div class="mt-6 text-center text-sm text-gray-500">
                        <p>
                            ou
                            <Link href="{{ route('welcome') }}" class="text-pink-500 hover:text-pink-600">
                                Continue Comprando
                                <span aria-hidden="true"> &rarr;</span>
                            </Link>
                        </p>
                    </div>
                </div>
            @endif
        </div>

    </div>

</x-guest-layout>
