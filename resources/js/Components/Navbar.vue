<template>
    <Disclosure as="nav" class="shadow" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex">
                    <div class="-ml-2 mr-2 flex items-center md:hidden">
                        <!-- Mobile menu button -->
                        <DisclosureButton
                            class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-pink-500"
                        >
                            <span class="sr-only">Abrir menu</span>
                            <svg
                                v-if="!open"
                                class="block h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                />
                            </svg>

                            <svg
                                v-else
                                class="block h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </DisclosureButton>
                    </div>
                    <div class="flex flex-shrink-0 items-center">
                        <img
                            class="block h-14 w-auto"
                            src="../../../public/media/images/logos/store-front.png"
                            alt="Your Company"
                        />
                    </div>
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a
                            href="/"
                            class="inline-flex items-center border-b-2 border-pink-500 px-1 pt-1 text-sm font-medium text-gray-900"
                            >Home</a
                        >

                        <a
                            v-if="userSeller"
                            href="/meus-produtos/"
                            class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                            >Meus Produtos</a
                        >
                        <a
                            v-if="userSeller"
                            href="/adicionar-produto"
                            class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                            >Adicionar Produto</a
                        >
                        <a
                            v-if="userSeller"
                            href="#"
                            class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                            >Produtos Vendidos</a
                        >
                        <a
                            v-if="userClient"
                            href="#"
                            class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                            >Minhas Compras</a
                        >
                        <a
                            v-if="userClient"
                            href="/favoritos"
                            class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                            >Meus Favoritos</a
                        >
                        <a
                            v-if="userClient"
                            href="/minha-conta"
                            class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                            >Minha Conta</a
                        >
                    </div>
                </div>
                <div
                    v-if="userSeller"
                    class="md:ml-4 md:flex md:flex-shrink-0 md:items-center"
                >
                    <a
                        href="/logoutSeller"
                        class="text-center rounded-md border border-pink-600 px-3 py-2 text-sm font-semibold text-pink-600 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600"
                    >
                        Sair
                    </a>
                </div>
                <div
                    v-else-if="userClient"
                    class="md:ml-4 md:flex md:flex-shrink-0 md:items-center"
                >
                    <a
                        href="/logoutClient"
                        class="text-center rounded-md border border-pink-600 px-3 py-2 text-sm font-semibold text-pink-600 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600"
                    >
                        Sair
                    </a>
                </div>
                <div class="flex items-center" v-else>
                    <div class="gap-2 hidden md:grid md:grid-cols-2">
                        <a
                            href="/cadastro"
                            class="text-center rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600"
                        >
                            Quero Comprar
                        </a>
                        <a
                            href="/cadastro-vendedor"
                            class="text-center rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600"
                        >
                            Quero Vender
                        </a>
                    </div>
                    <div
                        class="md:ml-4 md:flex md:flex-shrink-0 md:items-center"
                    >
                        <a
                            href="/login-tipo"
                            class="text-center rounded-md border border-pink-600 px-3 py-2 text-sm font-semibold text-pink-600 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600"
                        >
                            Entrar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <DisclosurePanel class="md:hidden">
            <div class="space-y-1 pb-3 pt-2">
                <!-- Current: "bg-pink-50 border-pink-500 text-pink-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
                <DisclosureButton
                    as="a"
                    href="/"
                    class="block border-l-4 border-pink-500 bg-pink-50 py-2 pl-3 pr-4 text-base font-medium text-pink-700 sm:pl-5 sm:pr-6"
                    >Home</DisclosureButton
                >

                <DisclosureButton
                    v-if="userSeller"
                    as="a"
                    href="/adicionar-produto"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6"
                    >Adicionar Produto</DisclosureButton
                >
                <DisclosureButton
                    v-if="userSeller"
                    as="a"
                    href="/meus-produtos/"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6"
                    >Meus Produto</DisclosureButton
                >
                <DisclosureButton
                    v-if="userSeller"
                    as="a"
                    href="/"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6"
                    >Produtos Vendidos</DisclosureButton
                >
                <DisclosureButton
                    v-if="userClient"
                    as="a"
                    href="/"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6"
                    >Minhas Compras</DisclosureButton
                >
                <DisclosureButton
                    v-if="userClient"
                    as="a"
                    href="/favoritos"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6"
                    >Meus Favoritos</DisclosureButton
                >
                <DisclosureButton
                    v-if="userClient"
                    as="a"
                    href="/minha-conta"
                    class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700 sm:pl-5 sm:pr-6"
                    >Minha conta</DisclosureButton
                >
            </div>
            <div
                class="border-t border-gray-200 pb-3 pt-4 px-2"
                v-if="!userClient && !userSeller"
            >
                <div class="flex flex-col gap-2">
                    <a
                        href="/cadastro"
                        class="text-center rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600"
                    >
                        Quero Comprar
                    </a>
                    <a
                        href="/cadastro-vendedor"
                        class="text-center rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600"
                    >
                        Quero Vender
                    </a>
                </div>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>

<script>
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from "@headlessui/vue";

export default {
    name: "Navbar",
    props: {
        userClient: {
            type: Boolean,
            required: true,
        },
        userSeller: {
            type: Boolean,
            required: true,
        },
    },
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
    },

    created() {},
};
</script>
