<template>
    <div
        v-if="products.length"
        class="grid md:grid-cols-2 lg:grid-cols-4 gap-4"
    >
        <div v-for="product in products" :key="product.id">
            <UpdateProductCard :product="product" />
        </div>
    </div>
    <div v-else>
        <p class="italic text-center mt-6 text-gray-600">
            Nenhum produto favorito
        </p>
    </div>
</template>

<script>
import axios from "axios";
import UpdateProductCard from "./UpdateProductCard.vue";

export default {
    name: "MyProduts",
    components: { UpdateProductCard },
    props: {
        sellerId: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            products: {},
        };
    },

    created() {
        axios
            .get(`http://127.0.0.1:8000/api/my-products/${this.sellerId}`)
            .then((res) => {
                console.log(res);
                this.products = res.data.data;
            })
            .catch((error) => {});
    },
};
</script>

<style></style>
