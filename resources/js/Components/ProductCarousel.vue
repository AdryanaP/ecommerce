<template>
    <div class="mt-16" v-if="Object.keys(products.data).length > 0">
        <h4 v-if="this.title" class="text-center text-3xl font-bold mb-10">
            {{ this.title }}
        </h4>
        <carousel
            :breakpoints="breakpoints"
            :wrap-around="true"
            snapAlign="start"
        >
            <slide v-for="product in this.products.data" :key="product">
                <div class="col-span-1 text-start cursor-pointer md:w-96 mx-2">
                    <img
                        :src="product.image"
                        class="h-52 w-52 mx-auto object-cover"
                        alt=""
                    />

                    <div
                        v-if="product.subproducts.data.length > 1"
                        class="text-center bg-gray-100 py-2"
                    >
                        <span
                            >+{{ product.subproducts.data.length }} opções
                        </span>
                    </div>

                    <div v-else class="h-10"></div>

                    <Link :href="'/produto/' + product.slug">
                        <span
                            v-text="product.name"
                            class="block font-bold mt-4 h-[45px]"
                        ></span>

                        <span
                            v-text="product.name_br"
                            class="block mt-2 h-[30px] text-sm"
                        ></span>

                        <!-- <div
                            class="flex flex-wrap h-28 justify-center items-center content-start mt-3 gap-1"
                        >
                            <label
                                v-for="subproduct in product.subproducts.data"
                                :key="subproduct"
                                class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer hover:ring hover:ring-black hover:ring-inset"
                            >
                                <span
                                    :style="
                                        'background-color:' +
                                        subproduct.meta_color_hex
                                    "
                                    class="h-7 w-7 border border-black border-opacity-10 rounded-full"
                                ></span>
                            </label>
                        </div> -->
                    </Link>
                    <!--                    <ProductColorPicker-->
                    <!--                        v-if="Object.keys(product.subproducts.data).length > 0"-->
                    <!--                        :index="currentIndex"-->
                    <!--                        :products="product.subproducts.data"-->
                    <!--                        :homepage="true"-->
                    <!--                        @colorChanged="colorChanged"-->
                    <!--                    />-->
                    <div
                        class="lg:flex flex-col justify-between gap-2 grow mt-4"
                    >
                        <div class="grow">
                            <a
                                :href="`/produto/${product.slug}`"
                                class="mt-2 lg:mt-0 w-full transition-all uppercase font-bold justify-center text-sm inline-flex items-center rounded-sm px-3 py-3 leading-4 bg-pink-500 text-white focus:outline-none"
                            >
                                Comprar agora
                                <span class="h-6"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </slide>
            <template #addons>
                <navigation />
            </template>
        </carousel>
    </div>
</template>

<script>
import "vue3-carousel/dist/carousel.css";
import ProductColorPicker from "./Product/ProductColorPicker.vue";
import { Carousel, Slide, Pagination, Navigation } from "vue3-carousel";

export default {
    components: {
        Carousel,
        Slide,
        Navigation,
        ProductColorPicker,
    },

    props: {
        title: {
            type: String,
            required: false,
        },

        products: {
            type: Object,
            required: true,
        },
    },

    data() {
        return {
            currentIndex: 0,
            quantity: 1,
            maxQuantity: 1,
            breakpoints: {
                300: {
                    itemsToShow: 1,
                    snapAlign: "center",
                },
                700: {
                    itemsToShow: 2,
                    snapAlign: "center",
                },
                1024: {
                    itemsToShow: 4,
                    snapAlign: "start",
                },
                1500: {
                    itemsToShow: 5,
                    snapAlign: "start",
                },
            },
        };
    },

    methods: {
        colorChanged(index) {
            this.currentIndex = index;
        },
    },
};
</script>
