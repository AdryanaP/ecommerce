<template>
    <div
        class="flex flex-col justify-between gap-3 border border-pink-500 rounded"
    >
        <div class="text-end">
            <button type="button" @click="deleteProduct()">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 50 50"
                    id="trash"
                    class="w-9 h-9 bg-pink-200 rounded-full p-1 m-2"
                    fill="#db2777"
                >
                    <path
                        d="M10.289 14.211h3.102l1.444 25.439a1 1 0 0 0 .998.943h18.933a1 1 0 0 0 .998-.944l1.421-25.438h3.104a1 1 0 1 0 0-2h-3.741c-.055 0-.103.023-.156.031-.052-.008-.1-.031-.153-.031h-5.246V9.594a1 1 0 0 0-1-1h-9.409a1 1 0 0 0-1 1v2.617h-5.248c-.046 0-.087.021-.132.027-.046-.007-.087-.027-.135-.027H10.29a1 1 0 0 0-.001 2zm11.295-3.617h7.409v1.617h-7.409v-1.617zm13.598 3.617L33.82 38.594H16.778l-1.384-24.383h19.788z"
                    ></path>
                    <path
                        d="M20.337 36.719l.058-.001a.999.999 0 00.941-1.055l-1.052-18.535a1.012 1.012 0 00-1.055-.942.999.999 0 00-.941 1.055l1.052 18.535a1 1 0 00.997.943zM30.147 36.718l.058.001a1 1 0 00.997-.943l1.052-18.535a1 1 0 00-.941-1.055 1.011 1.011 0 00-1.055.942l-1.052 18.535a1 1 0 00.941 1.055zM25.289 36.719a1 1 0 001-1V17.184a1 1 0 10-2 0v18.535a1 1 0 001 1z"
                    ></path>
                </svg>
            </button>
        </div>
        <img
            :src="product.images[0]"
            :alt="`imagem produto ${product.name}`"
            class="w-40 h-40 object-contain self-center mt-2"
        />
        <p class="font-semibold ml-2">{{ product.name }}</p>
        <p class="text-sm capitalize ml-2">{{ product.category }}</p>
        <p class="text-2xl font-medium ml-2">R$ {{ product.price }}</p>

        <a
            :href="`http://127.0.0.1:8000/editar-produto/${product.slug}`"
            type="button"
            class="text-sm text-center font-medium uppercase py-2 bg-pink-500 text-white"
        >
            EDITAR
        </a>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "ProductCard",
    props: {
        product: {
            typeof: Object,
            required: false,
        },
    },
    methods: {
        deleteProduct() {
            axios
                .delete(`http://127.0.0.1:8000/api/product/${this.product.id}`)
                .then((res) => {
                    console.log(res);
                });
        },
    },
    created() {
        this.product.images = JSON.parse(this.product.images);
    },
};
</script>
