<template>
    <div v-for="product in products" :key="product.id">
        <UpdateProductCard :product="product" />
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
            .get(`http://127.0.0.1:8000/api/products/${this.sellerId}`)
            .then((res) => {
                console.log(res);
                this.products = res.data.data
            })
            .catch((error) => {});
    },
};
</script>

<style></style>
