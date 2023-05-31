<x-splade-state>
    <x-splade-toggle>
        <nav>
            <!-- Primary Navigation Menu -->
            <div class="hidden xl:block">
                <div class="inline-flex space-x-8">
       

                    @auth
                        <div class="group pb-2">
                            <Link href="{{ route('pages.mypersonaldata') }}" class="uppercase font-bold cursor-pointer group-hover:text-pink-500 group-hover:underline group-hover:underline-offset-[10px] decoration-[2px] decoration-pink-500">Minha conta</Link>

                            <div class="hidden group-hover:flex hover:flex flex-col bg-white px-4 pb-3 pt-2 mt-2 rounded-md drop-shadow-lg absolute space-y-1">
                                <Link href="{{ route('pages.mypersonaldata') }}" class="uppercase font-bold cursor-pointer hover:text-pink-500">
                                    Meus Endereços
                                </Link>

                                <Link href="{{ route('pages.myorders') }}" class="uppercase font-bold cursor-pointer hover:text-pink-500">
                                    Meus pedidos
                                </Link>

                                <Link href="{{ route('pages.mywishlist') }}" class="uppercase font-bold cursor-pointer hover:text-pink-500">
                                    Lista de desejos
                                </Link>

                                <Link href="{{ route('logout') }}" method="POST" class="uppercase font-bold cursor-pointer hover:text-pink-500">
                                    Desconectar
                                </Link>
                            </div>
                        </div>
                    @endauth

                </div>
            </div>

            <!-- Responsive Navigation Menu Button -->
            <div @click.prevent="toggle" class="xl:hidden cursor-pointer flex items-center" style="-webkit-tap-highlight-color: transparent;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <span class="font-medium text-lg">
                    Menu
                </span>
            </div>

            <!-- Responsive Navigation Menu -->
            <div v-show="toggled" class="xl:hidden">
                <div role="dialog" aria-modal="true">
                    <div focus="true" class="fixed inset-0 z-10 overflow-y-auto bg-white px-6 py-6 xl:hidden">
                        <div class="flex h-9 items-center justify-end">
                            <div class="flex">
                                <button @click.prevent="setToggle(false)" style="-webkit-tap-highlight-color: transparent;" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-pink-500">
                                    <span class="sr-only">Close menu</span>
                                    <!-- Heroicon name: outline/x-mark -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="mt-6 pb-4 flow-root">
                            <div class="-my-6 divide-y divide-gray-100/10">

                                <div class="py-6">
                                    @if(Auth::check())
                                        <Link href="{{ route('pages.myaccount') }}" class="w-full inline-flex items-center justify-center rounded px-2.5 py-2 bg-black text-white font-medium uppercase">
                                            Minha conta
                                        </Link>
                                    @else
                                        <Link href="{{ route('login') }}" class="w-full inline-flex items-center justify-center rounded px-2.5 py-2 bg-black text-white font-medium uppercase">
                                            Fazer login
                                        </Link>
                                    @endif
                                </div>

                                <div class="divide-y py-3 divide-gray-100/10">
                                    <div>
                                        <x-splade-toggle data="isOpen" class="group py-2">
                                            <div @click.prevent="toggle('isOpen')"
                                                 class="flex items-center text-lg justify-between uppercase font-bold cursor-pointer hover:text-pink-500"
                                            >
                                      

                                                <svg v-show="!isOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                                                </svg>

                                                <svg v-show="isOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </div>

                                            <x-splade-transition show="isOpen" class="flex flex-col space-y-2 p-3">
                                       

                                                <p
                                                      class="uppercase hover:text-pink-500"
                                                >Todos os produtos</p>
                                            </x-splade-transition>
                                        </x-splade-toggle>
                                    </div>
                                </div>

                                <div class="divide-y py-3 divide-gray-100/10">
                                    <div>
                                        <x-splade-toggle data="isOpen" class="group py-2">
                                            <div @click.prevent="toggle('isOpen')"
                                                 class="flex items-center text-lg justify-between uppercase font-bold cursor-pointer hover:text-pink-500"
                                            >
                                                <span>Fale conosco</span>

                                                <svg v-show="!isOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                                                </svg>

                                                <svg v-show="isOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </div>

                                        </x-splade-toggle>
                                    </div>
                                </div>

                                @if(Auth::check())
                                    <div class="divide-y py-3 divide-gray-100/10">
                                        <div>
                                            <x-splade-toggle data="isOpen" class="group py-2">
                                                <div @click.prevent="toggle('isOpen')"
                                                     class="flex items-center text-lg justify-between uppercase font-bold cursor-pointer hover:text-pink-500"
                                                >
                                                    <span>Minha conta</span>

                                                    <svg v-show="!isOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                                                    </svg>

                                                    <svg v-show="isOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                                                    </svg>
                                                </div>

                                                <x-splade-transition show="isOpen" class="flex flex-col space-y-2 p-3">
                                                    <Link href="{{ route('pages.mypersonaldata') }}" class="uppercase hover:text-pink-500">Meus Endereços</Link>

                                                    <Link href="{{ route('pages.myorders') }}" class="uppercase hover:text-pink-500">Meus pedidos</Link>

                                                    <Link href="{{ route('pages.mywishlist') }}" class="uppercase hover:text-pink-500">Lista de desejos</Link>

                                                    <Link href="{{ route('logout') }}" method="POST" class="uppercase hover:text-pink-500">Desconectar</Link>
                                                </x-splade-transition>
                                            </x-splade-toggle>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </x-splade-toggle>
</x-splade-state>
