<template>
    <div class="max-w-[75%] m-auto">
        <div class="flex justify-between gap-4 mb-6">
            <div class="flex gap-4">
                <div>
                    <label
                        for="location"
                        class="block text-sm font-medium leading-6 text-gray-900"
                    ></label>
                    <select
                        id="category"
                        name="category"
                        v-model="category"
                        @change="filterdProduct"
                        class="mt-2 md:w-[14rem] block rounded border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-pink-500 sm:text-sm sm:leading-6"
                    >
                        <option selected value="" disabled>Categorias</option>
                        <option
                            v-for="(data, index) in categories"
                            :key="index"
                            :value="data.category"
                            class="capitalize"
                        >
                            {{ data.category }}
                        </option>
                    </select>
                </div>
                <div>
                    <label
                        for="orderPrice"
                        class="block text-sm font-medium leading-6 text-gray-900"
                    ></label>
                    <select
                        id="orderPrice"
                        name="orderPrice"
                        v-model="orderPrice"
                        @change="filterdProduct"
                        class="mt-2 block md:w-[14rem] rounded border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-pink-500 sm:text-sm sm:leading-6"
                    >
                        <option selected value="" disabled>Ordernar por</option>
                        <option value="ASC">Preço mais baixo</option>
                        <option value="DESC">Preço mais alto</option>
                    </select>
                </div>
            </div>
            <div>
                <div class="flex items-center justify-center gap-2">
                    <label
                        for="search"
                        class="block mt-2 text-sm font-medium leading-6 text-gray-900"
                        >Pesquisar</label
                    >
                    <div class="mt-2">
                        <input
                            type="text"
                            name="search"
                            id="search"
                            v-model="search"
                            class="block md:w-[14rem] rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                            placeholder="nome do produto"
                        />
                    </div>
                    <button @click="filterdProduct">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            id="searching"
                            class="w-6 h-6 mt-2"
                            fill="#db2777"
                        >
                            <g data-name="Layer 19">
                                <path
                                    d="M9,5A1,1,0,0,0,9,7a2,2,0,0,1,2,2,1,1,0,0,0,2,0A4,4,0,0,0,9,5Z"
                                ></path>
                                <path
                                    d="M20.71,19.29l-6-6-.13-.08A6.93,6.93,0,0,0,16,9a7,7,0,1,0-7,7,6.93,6.93,0,0,0,4.21-1.42l.08.13,6,6a1,1,0,0,0,1.42,0A1,1,0,0,0,20.71,19.29ZM9,14a5,5,0,1,1,5-5A5,5,0,0,1,9,14Z"
                                ></path>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- <h1 class="text-center font-medium text-2xl uppercase">
            Todos os produtos
        </h1> -->
        <div
            class="grid sm:grid-cols-2 lg:grid-cols-4 justify-between items-stretch gap-4 my-8"
        >
            <div v-for="product in totalProducts" :key="product.id">
                <ProductCard :product="product" />
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "Home",
    props: {
        products: {
            type: Object,
            required: true,
        },
    },

    data() {
        return {
            categories: {},
            category: "",
            orderPrice: "DESC",
            search: "",
            totalProducts: {},
        };
    },

    methods: {
        filterdProduct() {
            axios
                .get(
                    `/api/products/${this.orderPrice}?filter[name]=${this.search}&filter[category]=${this.category}`
                )
                .then((res) => {
                    this.totalProducts = res.data.data;
                    this.totalProducts.forEach((product, index) => {
                        product.images = JSON.parse(product.images);
                    });
                });
        },
    },

    created() {
        // console.log(this.products);
        // this.totalProducts = this.products.data;
        this.filterdProduct();
        axios.get("/api/categories").then((res) => {
            this.categories = [
                ...new Map(res.data.map((m) => [m.category, m])).values(),
            ];
        });
    },
};
</script>
