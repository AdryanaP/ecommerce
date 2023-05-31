<template>
    <div>
        <button
            class="underline text-pink-500 text-sm mt-2"
            type="button"
            @click="open = true"
        >
            Editar dados
        </button>
        <TransitionRoot as="template" :show="open">
            <Dialog as="div" class="relative z-10" @close="open = false">
                <TransitionChild
                    as="template"
                    enter="ease-out duration-300"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="ease-in duration-200"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div
                        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    />
                </TransitionChild>

                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div
                        class="flex md:min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                    >
                        <TransitionChild
                            as="template"
                            enter="ease-out duration-300"
                            enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            enter-to="opacity-100 translate-y-0 sm:scale-100"
                            leave="ease-in duration-200"
                            leave-from="opacity-100 translate-y-0 sm:scale-100"
                            leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        >
                            <DialogPanel
                                class="md:max-h-[34rem] 2xl:max-h-[44rem] overflow-y-auto relative w-full transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:max-w-[42rem] sm:p-6"
                            >
                                <div>
                                    <div class="text-center my-2">
                                        <DialogTitle
                                            as="h3"
                                            class="text-lg font-semibold leading-6 text-gray-900"
                                            >Minha Conta</DialogTitle
                                        >
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div>
                                    <div class="flex flex-col gap-4">
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
                                                    autocomplete="name"
                                                    v-model="user.name"
                                                    required
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-col md:grid grid-cols-2 gap-4 md:gap-2"
                                        >
                                            <div>
                                                <label
                                                    for="document"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >CPF</label
                                                >
                                                <div class="mt-2">
                                                    <input
                                                        type="tel"
                                                        name="document"
                                                        id="document"
                                                        autocomplete="document"
                                                        v-model="user.document"
                                                        v-mask="
                                                            '###.###.###-##'
                                                        "
                                                        required
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                    />
                                                </div>
                                            </div>
                                            <!-- <div>
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
                                                        autocomplete="birthdate"
                                                        v-model="user.birthdate"
                                                        v-mask="'##/##/####'"
                                                        required
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                    />
                                                </div>
                                            </div> -->
                                            <div>
                                                <label
                                                    for="cellphone"
                                                    class="block text-sm font-medium leading-6 text-gray-900"
                                                    >Celular</label
                                                >
                                                <div class="mt-2">
                                                    <input
                                                        type="tel"
                                                        name="cellphone"
                                                        id="cellphone"
                                                        autocomplete="phone"
                                                        v-model="user.cellphone"
                                                        v-mask="
                                                            '(##) #####-####'
                                                        "
                                                        required
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                    />
                                                </div>
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
                                                    type="text"
                                                    name="email"
                                                    id="email"
                                                    autocomplete="email"
                                                    v-model="user.email"
                                                    required
                                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                />
                                            </div>
                                        </div>
                                        <div>
                                            <label
                                                for="genre"
                                                class="block text-sm font-medium leading-6 text-gray-900"
                                                >Com qual gênero você se
                                                identifica?</label
                                            >
                                            <div class="mt-2 flex gap-4">
                                                <div
                                                    class="flex items-center gap-2 text-sm"
                                                >
                                                    <input
                                                        type="radio"
                                                        name="genre"
                                                        id="female"
                                                        value="f"
                                                        v-model="user.genre"
                                                        class="checked:bg-pink-500 checked:hover:bg-pink-500 checked:active:bg-pink-500 checked:focus:bg-pink-500 focus:bg-pink-500 focus:outline-none focus:ring-1 focus:ring-pink-500"
                                                    />
                                                    <label for="female"
                                                        >Feminino</label
                                                    >
                                                </div>
                                                <div
                                                    class="flex items-center gap-2 text-sm"
                                                >
                                                    <input
                                                        type="radio"
                                                        name="genre"
                                                        id="male"
                                                        value="m"
                                                        v-model="user.genre"
                                                        class="checked:bg-pink-500 checked:hover:bg-pink-500 checked:active:bg-pink-500 checked:focus:bg-pink-500 focus:bg-pink-500 focus:outline-none focus:ring-1 focus:ring-pink-500"
                                                    />
                                                    <label for="male"
                                                        >Masculino</label
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="alert.show" class="pt-4">
                                    <p :class="[alert.color, 'text-sm']">
                                        {{ alert.message }}
                                    </p>
                                </div>
                                <div class="mb-2 mt-6 flex gap-2">
                                    <button
                                        type="button"
                                        @click="verifyForm"
                                        class="inline-flex w-full justify-center rounded-md bg-pink-500 px-3 py-2 font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500"
                                    >
                                        Editar
                                    </button>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
    </div>
    <Alert v-if="alertShow" :title="titleError" />
</template>

<script>
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";

export default {
    name: "JustbeautyMyAccount",
    props: {
        user: {
            type: Object,
            required: true,
        },
        address: {
            type: Object,
            required: true,
        },
    },
    components: {
        Dialog,
        DialogPanel,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
    },
    data() {
        return {
            open: false,
            alertShow: false,
            titleError: "",
            alert: {
                show: false,
                message: "",
                color: "",
            },
        };
    },

    methods: {
        verifyForm() {
            (this.alert.show = false),
                (this.alert.message = ""),
                (this.titleError = ""),
                (this.alertShow = false);

            if (this.user.name.length < 1) {
                this.alert.message = "Campo nome é obrigatório";
                this.alert.show = true;
            } else if (this.user.document.length < 1) {
                this.alert.message = "Campo CPF é obrigatório";
                this.alert.show = true;
            } else if (this.user.cellphone.length < 1) {
                this.alert.message = "Campo celular é obrigatório";
                this.alert.show = true;
            } else if (this.user.email.length < 1) {
                this.alert.message = "Campo email é obrigatório";
                this.alert.show = true;
            } else if (this.user.genre.length === 0) {
                this.alert.message = "Marque uma opção de gênero";
                this.alert.show = true;
            }

            if (!this.alert.show) {
                this.editUser();
            }
        },
        editUser() {
            axios
                .put(
                    `https://4bbeauty.com.br/api/account/${this.user.id}`,
                    this.user
                )
                .then((res) => {
                    this.titleError = "Dados editados!";
                    this.alertShow = true;
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                })
                .catch((error) => {
                    this.alert.color = "text-red-500";
                    this.alert.message = error;
                    this.alert.show = true;
                });
        },
    },
};
</script>

<style scoped>
/* ===== Scrollbar CSS ===== */
/* Firefox */
* {
    scrollbar-width: auto;
    scrollbar-color: #ec4899 #ededed;
}

/* Chrome, Edge, and Safari */
*::-webkit-scrollbar {
    width: 12px;
}

*::-webkit-scrollbar-track {
    background: #ededed00;
}

*::-webkit-scrollbar-thumb {
    background-color: #ec4899;
    border-radius: 52px;
    border: 4px solid #ffffff;
}
</style>
