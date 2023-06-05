<template>
    <div class="md:w-[40%] m-auto p-4">
        <hr />
        <div class="flex flex-col gap-2 p-4">
            <div>
                <label
                    for="name"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Nome</label
                >
                <div class="mt-2">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        v-model="client.name"
                        required
                        class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>
            <div>
                <label
                    for="email"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Email</label
                >
                <div class="mt-2">
                    <input
                        type="email"
                        name="email"
                        id="email"
                        v-model="client.email"
                        required
                        class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>
            <div>
                <label
                    for="cpf"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >CPF</label
                >
                <div class="mt-2">
                    <input
                        type="tel"
                        name="cpf"
                        id="cpf"
                        v-mask="'###.###.###-##'"
                        v-model="client.cpf"
                        required
                        class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>
            <div>
                <label
                    for="birthdate"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Data de nascimento</label
                >
                <div class="mt-2">
                    <input
                        type="tel"
                        name="birthdate"
                        id="birthdate"
                        v-mask="'##/##/####'"
                        v-model="client.birthdate"
                        required
                        class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>
            <div>
                <label
                    for="state"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Estado</label
                >
                <div class="mt-2">
                    <input
                        type="text"
                        name="state"
                        id="state"
                        v-model="client.state"
                        required
                        class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>
            <div>
                <label
                    for="city"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Cidade</label
                >
                <div class="mt-2">
                    <input
                        type="text"
                        name="city"
                        id="city"
                        v-model="client.city"
                        required
                        class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>
            <div>
                <label
                    for="password"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Senha</label
                >
                <div class="mt-2">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        v-model="client.password"
                        required
                        class="block w-full rounded border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                    />
                </div>
            </div>
            <div>
                <label
                    for="passwordConfirmation"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Confirme sua senha</label
                >
                <div class="mt-2">
                    <input
                        type="password"
                        name="passwordConfirmation"
                        id="passwordConfirmation"
                        v-model="client.password_confirmation"
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
                    Editar
                </button>
            </div>
        </div>
    </div>
    <Alert v-if="alertShow" :title="alertTitle" />
</template>

<script>
import Alert from "../Alert.vue";

export default {
    name: "UpdateAccount",
    components: { Alert },
    props: {
        client: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
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

            if (this.client.name.length < 1) {
                this.alert.message = "Campo nome é obrigatório";
                this.alert.show = true;
            } else if (this.client.email.length < 1) {
                this.alert.message = "Campo email é obrigatório";
                this.alert.show = true;
            } else if (this.client.cpf.length != 14) {
                this.alert.message = "Insira um CPF válido";
                this.alert.show = true;
            } else if (this.client.birthdate.length < 10) {
                this.alert.message = "Insira uma data de nascimento válida";
                this.alert.show = true;
            } else if (this.client.state.length < 1) {
                this.alert.message = "Campo estado é obrigatório";
                this.alert.show = true;
            } else if (this.client.city.length < 1) {
                this.alert.message = "Campo estado é obrigatório";
                this.alert.show = true;
            }

            if (!this.alert.show) {
                this.updateClient();
            }
        },
        updateClient() {
            axios
                .put(`/api/client/${this.client.id}`, this.client)
                .then((res) => {
                    console.log(res);
                    this.alertTitle =
                        "Seus dados foram atualizados com sucesso!!";
                    this.alertShow = true;
                    setTimeout(() => {
                        this.alertShow = false;
                        window.location.reload();
                    }, 3000);
                })
                .catch((error) => {
                    this.alert.message = error.response.data.error;
                    this.alert.show = true;
                });
        },
    },
    created() {
        console.log(this.client);
    },
};
</script>

<style></style>
