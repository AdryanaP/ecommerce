<template>
    <div v-for="product in products" :key="product.id">
        <ProductCard :product="product" />
    </div>
</template>

<script>
import axios from "axios";
import ProductCard from "../ProductCard.vue";

export default {
    name: "MyProduts",
    components: { ProductCard },
    props: {
        sellerId: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            product: {},
        };
    },

    created() {
        axios
            .get(`http://127.0.0.1:8000/api/products/${this.sellerId}`)
            .then((res) => {
                console.log(res);
            })
            .catch((error) => {});
    },
};
</script>

<style></style>
