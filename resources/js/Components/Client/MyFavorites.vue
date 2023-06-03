<template>
    <h1 class="text-center font-medium text-2xl uppercase">
        Produtos Favoritos
    </h1>
    <div
        v-if="wishlist.length"
        class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-[75%] m-auto my-8"
    >
        <div v-for="wish in wishlist" :key="wish.id">
            <ProductCard :product="wish.product" />
        </div>
    </div>
    <div v-else>
        <p class="italic text-center mt-6 text-gray-600">Nenhum produto favorito</p>
    </div>
</template>

<script>
import ProductCard from "../ProductCard.vue";

export default {
    name: "MyFavorites",
    props: {
        wishlist: {
            typeof: Object,
            required: true,
        },
    },
    components: { ProductCard },
};
</script>
