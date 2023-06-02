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
                    for="slug"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Url personalizada do produto</label
                >
                <div class="mt-2">
                    <input
                        type="text"
                        name="slug"
                        id="slug"
                        v-model="product.slug"
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
                        rows="3"
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
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 48 48"
                            id="image-files"
                            class="mx-auto h-10 w-10 text-pink-500"
                            fill="#db2777"
                        >
                            <path
                                d="M19 18.5a3.5 3.5 0 1 0-3.5 3.5 3.5 3.5 0 0 0 3.5-3.5Zm-5 0a1.5 1.5 0 1 1 1.5 1.5 1.5 1.5 0 0 1-1.5-1.5Zm26.12-2.79L29.29 4.88A3 3 0 0 0 27.17 4H10a3 3 0 0 0-3 3v5a1 1 0 0 0 2 0V7a1 1 0 0 1 1-1h17v9a3 3 0 0 0 3 3h9v15.37l-4.84-5.45a3 3 0 0 0-4.37-.13l-3.69 3.69-4.94-5.56a3 3 0 0 0-4.37-.13L9 33.59V16a1 1 0 0 0-2 0v25a3 3 0 0 0 3 3h28a3 3 0 0 0 3-3V17.83a3 3 0 0 0-.88-2.12ZM30 16a1 1 0 0 1-1-1V7.41L37.59 16ZM9 41v-4.59l9.21-9.2a.88.88 0 0 1 .73-.29.94.94 0 0 1 .72.33L32.77 42H10a1 1 0 0 1-1-1Zm29 1h-2.55l-8-9 3.78-3.77a.85.85 0 0 1 .73-.29.94.94 0 0 1 .72.33L39 36.38V41a1 1 0 0 1-1 1Z"
                                data-name="26 Image Files"
                            ></path>
                        </svg>

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
                                    accept="image/*"
                                    multiple
                                    tabindex="-1"
                                    ref="file"
                                    @change="fileController"
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
                <div v-if="alert.show" class="p-2 mb-4 bg-red-200 rounded">
                    <p class="text-red-600 text-sm">❗️ {{ alert.message }}</p>
                </div>
                <button
                    type="button"
                    @click="validateForm"
                    class="text-center w-full rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600"
                >
                    Adicionar
                </button>
            </div>
        </div>
    </div>
    <Alert v-if="alertShow" :title="alertTitle" />
</template>

<script>
import axios from "axios";
import Alert from "../Alert.vue";

export default {
    components: { Alert },
    name: "AddProduts",
    props: {
        sellerId: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            product: {
                seller_id: this.sellerId,
                name: "",
                slug: "",
                description: "",
                price: 0,
                category: "",
                images: [],
            },
            qtd: 0,
            alert: {
                show: false,
                message: "",
            },
            alertTitle: "",
            alertShow: "",
        };
    },
    methods: {
        fileController() {
            this.alert.show = false;
            this.alert.message = "";
            console.log(this.product.images);
            if (
                this.product.images.length === 3 ||
                this.$refs.file.files.length > 3
            ) {
                this.alert.show = true;
                this.alert.message = "Máximo de 3 imagens";
            } else {
                for (let img of this.$refs.file.files) {
                    this.qtd++;
                    this.formatImage(img);
                }
            }
        },
        formatImage(img) {
            const reader = new FileReader();
            reader.onload = (e) => {
                this.product.images.push(e.target.result);
            };
            reader.readAsDataURL(img);
            this.product.images = JSON.parse(
                JSON.stringify(this.product.images)
            );
        },
        validateForm() {
            this.alert.show = false;
            this.alert.message = "";

            if (this.product.name.length < 1) {
                this.alert.message = "Campo nome é obrigatório";
                this.alert.show = true;
            } else if (this.product.slug.length < 1) {
                this.alert.message = "Campo url é obrigatório";
                this.alert.show = true;
            } else if (this.product.description.length < 1) {
                this.alert.message = "Campo descrição é obrigatório";
                this.alert.show = true;
            } else if (this.product.price.length === 0) {
                this.alert.message = "Campo preço é obrigatório";
                this.alert.show = true;
            } else if (this.product.images.length === 0) {
                this.alert.message = "Envie uma imagem";
                this.alert.show = true;
            }

            if (!this.alert.show) {
                this.addProducts();
            }
        },
        addProducts() {
            this.product.slug = this.product.slug
                .replace(" ", "-")
                .toLowerCase();
            this.product.images = JSON.stringify(this.product.images);

            axios
                .post("http://127.0.0.1:8000/api/products", this.product)
                .then((res) => {
                    console.log(res);
                    this.alertTitle = "Seu produto foi postado com sucesso!!";
                    this.alertShow = true;
                    setTimeout(() => {
                        this.alertShow = false;
                    }, 3000);
                })
                .catch((error) => {
                    this.alert.message = error.response.data.error;
                    this.alert.show = true;
                });
        },
    },
    created() {
        console.log(this.sellerId);
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
