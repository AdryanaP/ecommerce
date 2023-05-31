<template>
    <template v-if="clientId">
        <div class="lg:flex justify-between gap-2 grow">
            <div class="grow">
                <button
                    class="mt-2 lg:mt-0 w-full uppercase font-bold justify-center text-sm inline-flex items-center rounded-sm px-3 py-3 leading-4 bg-pink-500 text-white focus:outline-none"
                >
                    Comprar agora
                    <span class="h-6"></span>
                </button>
            </div>
            <div>
                <button
                    class="uppercase w-full mt-1 lg:mt-0 font-bold justify-center text-sm inline-flex items-center rounded-sm px-3 py-3 leading-4 bg-black text-white focus:outline-none"
                >
                    Adicionar à sacola
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8.25 4.5l7.5 7.5-7.5 7.5"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </template>

    <template v-else>
        <div class="border-l-4 border-yellow-400 bg-yellow-50 p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg
                        class="h-5 w-5 text-yellow-400"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        Você precisa fazer login para comprar este produto.
                        <Link
                            href="/login"
                            class="font-medium text-yellow-700 underline hover:text-yellow-600"
                            >Clique aqui para entrar ou se cadastrar.</Link
                        >
                    </p>
                </div>
            </div>
        </div>
    </template>
</template>

<script>
export default {
    props: {
        product: {
            type: Object,
            required: true,
        },

        productSlug: {
            type: String,
            required: true,
        },

        productName: {
            type: String,
            required: true,
        },

        clientId: {
            type: Number,
            required: false,
        },
    },

    data() {
        return {};
    },
};
</script>
