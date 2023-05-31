<template>
    <div v-if="wishProducts.length > 0">
        <div v-for="wished in wishProducts" :key="wished.id">
            <div
                class="flex justify-between items-center mt-4 border p-4 rounded"
            >
                <div class="flex gap-4">
                    <a :href="`/produto/${wished.product.slug}`">
                        <img
                            :src="wished.product.images[0].link"
                            alt="imagem produto"
                            class="w-24 h-24 border p-2 m-0"
                        />
                    </a>
                    <div class="text-sm flex flex-col gap-2">
                        <p class="m-0">{{ wished.product.name }}</p>
                        <p class="m-0">R$ {{ wished.product.price }}</p>
                    </div>
                </div>
                <div class="flex flex-col gap-2 items-center">
                    <a
                        :href="`/produto/${wished.product.slug}`"
                        class="no-underline text-center block border border-pink-500 bg-pink-500 text-white w-44 rounded-full"
                    >
                        Ver produto
                    </a>
                    <button
                        @click="wishlistRemove(wished)"
                        class="no-underline text-center font-semibold block border border-pink-500 bg-pink-500 text-white w-44 rounded-full"
                    >
                        Remover da lista
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <p class="text-center my-8 italic text-gray-500 text-lg">
            Não há nenhum produto na sua wishlist
        </p>
    </div>
    <Alert v-if="alert" :title="alertTitle" />
</template>

<script>
import axios from "axios";
import Alert from "./Alert.vue";

export default {
    name: "JustbeautyWishlist",
    props: {
        products: {
            type: Object,
            required: true,
        },
    },
    components: { Alert },
    data() {
        return {
            wishProducts: "",
            alertTitle: "",
            alert: false,
        };
    },

    methods: {
        wishlistRemove(wished) {
            axios
                .post(`https://4bbeauty.com.br/api/wishlist/delete`, {
                    userId: wished.user_id,
                    productId: wished.product_id,
                })
                .then(() => {
                    this.alert = true;
                    this.alertTitle = "Produto removido da wishlist";
                    setTimeout(() => {
                        this.alert = false;
                        this.alertTitle = "";
                    }, 4000);
                    location.reload();
                });
        },
    },

    created() {
        this.wishProducts = this.products;
    },
};
</script>
