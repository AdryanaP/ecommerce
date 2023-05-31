<template>
    <div class="lg:flex gap-14 mt-8">
        <div class="w-full lg:w-1/2">
            <ProductGallery :index="currentIndex" :product="product" />
        </div>

        <div class="w-full lg:w-1/2">
            <h2
                class="text-3xl font-bold tracking-tight text-gray-900 uppercase mt-8 lg:mt-0"
            >
                {{ product.name }}
            </h2>
            <p class="capitalize italic text-gray-500">
                {{ product.category }}
            </p>

            <hr class="mt-8 mb-6" />

            <div>
                <p class="font-medium text-3xl">R$ {{ product.price }}</p>
            </div>

            <hr class="mt-6 mb-8" />

            <div>
                <p>
                    Vendido por
                    <span class="italic text-pink-500">{{ seller.name }}</span>
                </p>
                <p>
                    Contato:
                    <button
                        type="button"
                        @click="copyEmail"
                        class="text-pink-500"
                    >
                        {{ seller.email }}
                    </button>
                </p>
            </div>
            <hr class="mt-6 mb-8" />

            <div
                class="flex flex-col lg:flex-row lg:items-center justify-between gap-4"
            >
                <ProductActionButtons
                    :product="this.product"
                    :product-slug="this.product.slug"
                    :product-name="this.product.name"
                    :clientId="this.clientId"
                />

                <WishlistToggle
                    v-if="this.clientId"
                    :product="this.product"
                    :clientId="this.clientId"
                />
            </div>

            <hr class="mt-6 mb-8" />

            <div>
                <p class="mb-8 prose" style="white-space: pre-wrap">
                    {{ product.description }}
                </p>
            </div>

            <hr class="my-8" />
        </div>
    </div>

    <!-- <div>
        <ProductFolders :product="product" />
    </div>
    <div>
        <ProductReviews :productId="product.id" />
    </div> -->
</template>

<script>
import ProductGallery from "./ProductGallery.vue";
import ProductActionButtons from "./ProductActionButtons.vue";
import WishlistToggle from "./WishlistToggle.vue";
import ProductReviews from "./ProductReviews.vue";

export default {
    components: {
        ProductGallery,
        ProductActionButtons,
        WishlistToggle,
        ProductReviews,
    },

    props: {
        product: {
            type: Object,
            required: true,
        },

        seller: {
            type: Object,
            required: true,
        },

        clientId: {
            type: Number,
            required: false,
        },
    },

    data() {
        return {
            currentIndex: 0,
        };
    },

    methods: {
        // copiar
        copyEmail() {
            navigator.clipboard.writeText(this.seller.email);
        },
    },

    created() {
        this.product.images = JSON.parse(this.product.images);
        console.log(this.product);
        console.log(this.seller);
    },
};
</script>
