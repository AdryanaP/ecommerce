<template>
    <a
        :href="`produto/${product.slug}`"
        class="flex flex-col justify-between gap-3 border border-pink-500 rounded"
    >
        <img
            :src="product.images[0]"
            :alt="`imagem produto ${product.name}`"
            class="w-40 h-40 object-contain self-center mt-2"
        />
        <p class="font-semibold ml-2">{{ product.name }}</p>
        <p class="text-sm capitalize ml-2">{{ product.category }}</p>
        <p class="text-2xl font-medium ml-2">R$ {{ product.price }}</p>
        <button
            type="button"
            class="text-sm font-medium uppercase py-2 bg-pink-500 text-white"
        >
            COMPRAR AGORA
        </button>
    </a>
</template>

<script>
export default {
    name: "ProductCard",
    props: {
        product: {
            typeof: Object,
            required: false,
        },
    },
    created() {
        this.product.images = JSON.parse(this.product.images);
    },
};
</script>
