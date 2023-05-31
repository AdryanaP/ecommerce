<template>
    <div>
        <button type="button" @click="searchOpen = !searchOpen">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-6 h-6 inline cursor-pointer"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                />
            </svg>
        </button>
        <div
            v-if="searchOpen"
            class="relative"
            style="z-index: 9999 !important"
            @focusout="handleFocusOut"
        >
            <div class="absolute -right-2 lg:-right-10 top-[0.40rem]">
                <div class="relative rounded-md shadow-sm">
                    <div>
                        <input
                            type="text"
                            id="search"
                            ref="search"
                            name="search"
                            v-model="search"
                            class="border-2 border-pink-500 pr-10 py-[0.75rem] rounded-lg text-sm w-80 lg:w-96 placeholder-gray-300 italic focus:ring-0 focus:border-pink-500"
                            placeholder="Pesquise acessórios, corretivos, esmaltes..."
                        />
                        <div
                            class="font-bold text-gray-500 top-3 absolute right-0 flex justify-center items-center"
                        >
                            <div
                                v-if="search.length >= 3 && loader === false"
                                class="flex justify-center cursor-pointer z-50 pr-2"
                            >
                                <button type="button" @click="clearSearch()">
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
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    </svg>
                                </button>
                            </div>
                            <div
                                v-if="loader"
                                class="flex justify-center relative z-50 top-1 animate-spin mr-3"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    id="spinner"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="rounded-full"
                                >
                                    <path
                                        fill="#444"
                                        d="M12.9 3.1C14.2 4.3 15 6.1 15 8c0 3.9-3.1 7-7 7s-7-3.1-7-7c0-1.9.8-3.7 2.1-4.9l-.8-.8C.9 3.8 0 5.8 0 8c0 4.4 3.6 8 8 8s8-3.6 8-8c0-2.2-.9-4.2-2.3-5.7l-.8.8z"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div
                        v-if="products.length"
                        class="overflow-y-scroll max-h-[20rem] border-b border-x z-50 px-2 bg-white border-pink-500 rounded-b text-sm w-80 lg:w-96 placeholder-gray-300 italic focus:ring-0 focus:border-pink-500"
                    >
                        <div>
                            <a
                                v-for="product in products"
                                :key="product.id"
                                :href="`/produto/${
                                    product.parent
                                        ? product.parent.slug
                                        : product.slug
                                }`"
                                class="flex items-center gap-4 not-italic py-2"
                            >
                                <img
                                    :src="product.image"
                                    alt="imagem do produto"
                                    class="h-12 w-12 border p-2"
                                />
                                <div class="flex justify-between w-full">
                                    <p>
                                        {{ product.name }}
                                        <!-- <span
                                            class="uppercase text-gray-600 text-xs"
                                            >(CÓD: {{ product.sku }})</span
                                        > -->
                                    </p>
                                </div>
                            </a>
                            <!-- <p class="uppercase text-center text-gray-500 text-xs not-italic my-2">Veja todos os produtos... ({{ qtdProducts }})</p> -->
                        </div>
                    </div>
                    <div v-else-if="noProducts">
                        <p
                            class="not-italic border-b border-x text-gray-400 z-50 p-2 bg-white border-pink-500 rounded-b text-sm w-80 lg:w-96 placeholder-gray-300 focus:ring-0 focus:border-pink-500"
                        >
                            Nenhum resultado
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { debounce } from "@/Utils/debounce";

export default {
    name: "JustbeautySearch",

    data() {
        return {
            searchOpen: false,
            search: "",
            loader: false,
            products: [],
            noProducts: false,
        };
    },

    created() {
        this.debounceFetch = debounce(() => {
            this.loader = true;
            this.doSearch();
        }, 500);
    },

    watch: {
        search() {
            this.debounceFetch();
        },
    },

    methods: {
        clearSearch() {
            this.noProducts = false;
            this.search = "";
            this.products = [];
        },

        handleFocusOut() {
            this.searchOpen = false;
        },
        doSearch() {
            axios
                .get(`https://4bbeauty.com.br/api/search/${this.search}`)
                .then((res) => {
                    this.qtdProducts = res.data.length;
                    this.products = res.data;
                    if (this.qtdProducts === 0) {
                        this.noProducts = true;
                    }
                    this.loader = false;
                })
                .catch((error) => {
                    this.loader = false;
                });
        },
    },
};
</script>

<style scoped>
/* ===== Scrollbar CSS ===== */
/* Firefox */
* {
    scrollbar-width: auto;
    scrollbar-color: #ec4899 #ffffff;
}

/* Chrome, Edge, and Safari */
*::-webkit-scrollbar {
    width: 9px;
}

*::-webkit-scrollbar-track {
    background: #ffffff;
}

*::-webkit-scrollbar-thumb {
    background-color: #ec4899;
    border-radius: 20px;
    border: 3px solid #ffffff;
}
</style>
