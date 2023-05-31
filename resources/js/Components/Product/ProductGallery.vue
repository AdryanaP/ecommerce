<template>
    <div class="flex flex-col-reverse">
        <div class="mt-6 pb-4 pt-2 px-1 flex overflow-x-auto space-x-4">
            <div
                v-for="(image, index) in product.images"
                class="flex-none cursor-pointer"
                :key="index"
                @click="changeImage(index)"
            >
                <div
                    class="h-32 p-0.5 flex items-center cursor-pointer pointer-events-none rounded-md"
                    :class="{
                        'border-2 border-pink-500':
                            image === this.currentImage,
                        'border-0': image !== this.currentImage,
                    }"
                >
                    <img
                        :src="image"
                        alt="imagem produto"
                        class="h-28 object-cover object-center"
                    />
                </div>
            </div>
        </div>

        <div class="aspect-w-1 aspect-h-1 w-full">
            <div>
                <img
                    :src="this.currentImage"
                    class="h-full w-full object-cover object-center sm:rounded-lg"
                />
            </div>
        </div>
    </div>

    <!-- <div class="mt-8 items-center justify-center hidden">
        <span>{{
            this.currentIndex +
            "/" +
            (this.variations
                ? this.product.subproducts.data[this.index].images.length
                : this.product.images.length)
        }}</span>
    </div> -->
</template>

<script>
export default {
    props: {
        index: {
            type: Number,
            required: true,
        },

        product: {
            type: Object,
            required: true,
        },
    },

    data() {
        return {
            currentImage: this.product.images[0],
            currentIndex: 1,
        };
    },

    methods: {
        changeImage(index) {
            this.currentImage = this.product.images[index];
            this.currentIndex = index + 1;
        },
    },

    watch: {
        index: function (newIndex) {
            this.currentImage = this.product.images[newIndex];
            this.currentIndex = 1;
        },
    },
};
</script>

<style scoped>
/* ===== Scrollbar CSS ===== */
  /* Firefox */
  * {
    scrollbar-width: auto;
    scrollbar-color: #ec4899 #ffffff;
  }

  /* Chrome, Edge, and Safari */
  *::-webkit-scrollbar {
    width: 2px;
  }

  *::-webkit-scrollbar-track {
    background: #ffffff;
  }

  *::-webkit-scrollbar-thumb {
    background-color: #ec4899;
    border-radius: 10px;
    border: 6px solid #ffffff;
  }
</style>