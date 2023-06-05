<template>
    <div class="md:w-[40%] m-auto md:p-4">
        <hr />
        <div class="flex flex-col gap-2 my-4 md:mx-4">
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

            <div class="my-4">
                <div v-if="alert.show" class="p-2 mb-4 bg-red-200 rounded">
                    <p class="text-red-600 text-sm">❗️ {{ alert.message }}</p>
                </div>
                <button
                    type="button"
                    @click="validateForm"
                    class="text-center w-full rounded-md bg-pink-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500"
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
        product: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
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
            } 

            if (!this.alert.show) {
                this.addProducts();
            }
        },
        addProducts() {
            this.product.slug = this.product.slug
                .replace(" ", "-")
                .toLowerCase();

            axios
                .put(`/api/product/${this.product.id}`, this.product)
                .then((res) => {
                    console.log(res);
                    this.alertTitle = "Seu produto foi editado com sucesso!!";
                    this.alertShow = true;
                    setTimeout(() => {
                        this.alertShow = false;
                        window.location.href = "/meus-produtos";
                    }, 3000);
                })
                .catch((error) => {
                    this.alert.message = error.response.data.error;
                    this.alert.show = true;
                });
        },
    },
    created() {
        this.product.price = parseFloat(this.product.price).toFixed(2);
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
