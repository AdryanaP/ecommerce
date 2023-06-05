<template>
    <Disclosure as="nav" class="shadow" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between items-center">
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
                    <div class="hidden md:ml-6 md:flex md:gap-4">
                        <div
                            v-for="(button, index) in navbar"
                            :key="index"
                            :class="[
                                button.type === user || button.type === 'all' ? 'flex' : 'hidden',
                                'items-end',
                            ]"
                        >
                            <a
                                v-if="
                                    button.type === user ||
                                    button.type === 'all'
                                "
                                :href="button.href"
                                :class="[
                                    windowHref === button.href
                                        ? 'border-pink-500 hover:border-pink-600'
                                        : 'border-transparent',
                                    'inline-flex items-center border-b-2 px-1 pt-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700',
                                ]"
                                >{{ button.name }}</a
                            >
                        </div>
                    </div>
                </div>
                <div
                    v-if="userSeller"
                    class="md:ml-4 md:flex md:flex-shrink-0 md:items-center"
                >
                    <a
                        href="/logoutSeller"
                        class="text-center rounded-md border border-pink-500 px-3 py-2 text-sm font-semibold text-pink-500 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500"
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
                        class="text-center rounded-md border border-pink-500 px-3 py-2 text-sm font-semibold text-pink-500 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500"
                    >
                        Sair
                    </a>
                </div>
                <div class="flex items-center" v-else>
                    <div class="gap-2 hidden md:grid md:grid-cols-2">
                        <a
                            href="/cadastro"
                            class="text-center rounded-md bg-pink-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500"
                        >
                            Quero Comprar
                        </a>
                        <a
                            href="/cadastro-vendedor"
                            class="text-center rounded-md bg-pink-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500"
                        >
                            Quero Vender
                        </a>
                    </div>
                    <div
                        class="md:ml-4 md:flex md:flex-shrink-0 md:items-center"
                    >
                        <a
                            href="/login-tipo"
                            class="text-center rounded-md border border-pink-500 px-3 py-2 text-sm font-semibold text-pink-500 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500"
                        >
                            Entrar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <DisclosurePanel class="md:hidden">
            <div class="space-y-1 pb-3 pt-2">
                <div v-for="(button, index) in navbar" :key="index">
                    <DisclosureButton
                        v-if="button.type === user || button.type === 'all'"
                        as="a"
                        :href="button.href"
                        :class="[
                            windowHref === button.href
                                ? 'border-pink-500  bg-pink-50 text-pink-700'
                                : 'border-transparent text-gray-500 bg-transparent',
                            'block border-l-4  py-2 pl-3 pr-4 text-base font-medium text-gray-500 sm:pl-5 sm:pr-6',
                        ]"
                        >{{ button.name }}</DisclosureButton
                    >
                </div>
            </div>
            <div
                class="border-t border-gray-200 pb-3 pt-4 px-2"
                v-if="!userClient && !userSeller"
            >
                <div class="flex flex-col gap-2">
                    <a
                        href="/cadastro"
                        class="text-center rounded-md bg-pink-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500"
                    >
                        Quero Comprar
                    </a>
                    <a
                        href="/cadastro-vendedor"
                        class="text-center rounded-md bg-pink-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500"
                    >
                        Quero Vender
                    </a>
                </div>
            </div>
        </DisclosurePanel>
    </Disclosure>
    <Banner v-if="userClient && user.email_verified_at === null" />
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
import Banner from "./Banner.vue";

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
        user: {
            type: Object,
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
        Banner,
    },

    data() {
        return {
            user: "",
            windowHref: "",
            navbar: [
                {
                    name: "Home",
                    href: "/",
                    type: "all",
                },
                {
                    name: "Minhas Compras",
                    href: "/minhas-compras",
                    type: "client",
                },
                {
                    name: "Meus Favoritos",
                    href: "/favoritos",
                    type: "client",
                },
                {
                    name: "Minha Conta",
                    href: "/minha-conta",
                    type: "client",
                },
                {
                    name: "Meus Produtos",
                    href: "/meus-produtos",
                    type: "seller",
                },
                {
                    name: "Adicionar Produto",
                    href: "/adicionar-produto",
                    type: "seller",
                },
                {
                    name: "Produtos Vendidos",
                    href: "/minhas-vendas",
                    type: "seller",
                },
            ],
        };
    },

    created() {
        if (this.userClient) {
            this.user = "client";
        } else if (this.userSeller) {
            this.user = "seller";
        }
        this.windowHref = window.location.pathname;
    },
};
</script>
