<template>
    <div class="md:w-[40%] m-auto p-4">
        <h1 class="mb-4 font-bold text-2xl text-pink-500 text-center">
            Adicionar Produto
        </h1>
        <hr />
        <div class="flex flex-col gap-2 p-4">
            <div>
                <label
                    for="name"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Nome do produto</label
                >
                <div class="mt-2">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        v-model="product.name"
                        required
                        class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>
            <div>
                <label
                    for="description"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Descrição do produto</label
                >
                <div class="mt-2">
                    <textarea
                        name="description"
                        id="description"
                        v-model="product.description"
                        required
                        class="block resize-none rounded w-full border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                    >
                    </textarea>
                </div>
            </div>
            <div>
                <label
                    for="category"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Categoria do produto</label
                >
                <div class="mt-2">
                    <input
                        type="text"
                        name="category"
                        id="category"
                        v-model="product.category"
                        required
                        class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>
            <div>
                <label
                    for="price"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Preço</label
                >
                <div class="mt-2">
                    <input
                        type="number"
                        name="price"
                        id="price"
                        v-model="product.price"
                        required
                        class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>

            <div class="col-span-full">
                <label
                    for="cover-photo"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Imagens do produto</label
                >
                <div
                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10"
                >
                    <div class="text-center">
                        <PhotoIcon
                            class="mx-auto h-12 w-12 text-gray-300"
                            aria-hidden="true"
                        />
                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                            <label
                                for="file-upload"
                                class="relative cursor-pointer rounded-md bg-white font-semibold text-pink-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-pink-600 focus-within:ring-offset-2 hover:text-pink-500"
                            >
                                <span>Upload os arquivos</span>
                                <input
                                    id="file-upload"
                                    name="file-upload"
                                    type="file"
                                    class="sr-only"
                                    multiple
                                />
                            </label>
                            <p class="pl-1">ou arraste até aqui</p>
                        </div>
                        <p class="text-xs leading-5 text-gray-600">
                            PNG, JPG, GIF até 10MB
                        </p>
                        <p class="text-xs leading-5 text-gray-600">
                            max: 3 imagens
                        </p>
                    </div>
                </div>
            </div>

            <div class="my-4">
                <button
                    type="button"
                    class="text-center w-full rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600"
                >
                    Adicionar
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Input from "../../../../vendor/protonemedia/laravel-splade/lib/Components/Input.vue";
export default {
    components: { Input },
    name: "AddProduts",
    props: {
        sellerId: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            product: {
                name: "",
                description: "",
                price: 0,
                category: "",
                images: [],
            },
        };
    },
    methods: {},
    created() {
       console.log(this.sellerId)
    },
};
</script>

<style scopped>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type="number"] {
    -moz-appearance: textfield;
}
</style>
