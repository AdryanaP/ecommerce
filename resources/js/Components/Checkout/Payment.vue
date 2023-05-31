<template>
    <div class="m-auto">
        <div
            class="flex flex-col lg:flex-row items-center lg:items-start gap-8"
        >
            <div class="grid md:grid-cols-2 lg:grid-cols-1 gap-4">
                <div class="border rounded p-4 flex justify-between">
                    <div class="flex gap-2">
                        <div>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                id="person"
                                class="mt-[2px]"
                            >
                                <path fill="none" d="M0 0h24v24H0V0z"></path>
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v1c0 .55.45 1 1 1h14c.55 0 1-.45 1-1v-1c0-2.66-5.33-4-8-4z"
                                ></path>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-4">
                            <p class="text-lg text-gray-800 font-medium">
                                Dados Pessoais
                            </p>
                            <div>
                                <p class="text-gray-600 text-sm">
                                    Nome: {{ user.name }}
                                </p>
                                <p class="text-gray-600 text-sm">
                                    Telefone: {{ user.cellphone }}
                                </p>
                                <p class="text-gray-600 text-xs">
                                    {{ user.email }}
                                </p>
                            </div>
                            <a
                                href="/logout"
                                class="lg:hidden border text-center border-black rounded text-sm py-2 w-44"
                                >Usar outra conta
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col justify-between items-end">
                        <!-- <button>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                id="edit"
                            >
                                <path
                                    fill="none"
                                    d="M0 0h24v24H0Z"
                                    data-name="Path 3622"
                                ></path>
                                <path
                                    fill="#525863"
                                    d="M5.1 21.6a2.7 2.7 0 0 1-2.7-2.7V5.1a2.7 2.7 0 0 1 2.7-2.7h8.7a.9.9 0 0 1 0 1.8H5.1a.9.9 0 0 0-.9.9v13.8a.9.9 0 0 0 .9.9h13.8a.9.9 0 0 0 .9-.9v-8.4a.9.9 0 1 1 1.8 0v8.4a2.7 2.7 0 0 1-2.7 2.7Zm1.971-5.2.634-3.713a.014.014 0 0 1 0-.008l4.24-4.24 5.517-5.512a1.793 1.793 0 0 1 1.272-.527 1.812 1.812 0 0 1 1.282.53l.527.527.53.53a1.8 1.8 0 0 1 0 2.545l-5.516 5.517-4.238 4.24a.016.016 0 0 1-.008 0l-3.713.633a.464.464 0 0 1-.078.007.456.456 0 0 1-.449-.529Zm6.149-6.685-3.84 3.84-.219 1.28 1.28-.219 3.84-3.84L19.8 5.261l-.53-.53-.53-.53Z"
                                    data-name="Path 2689"
                                ></path>
                            </svg>
                        </button> -->
                        <div></div>

                        <a
                            href="/logout"
                            class="hidden lg:block text-center w-44 border border-black rounded text-sm py-2"
                            >Usar outra conta
                        </a>
                    </div>
                </div>
                <div class="border rounded p-4 flex justify-between">
                    <div v-if="status === 'addressTrue'" class="w-full">
                        <div class="flex gap-2">
                            <div>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    id="home"
                                    class="mt-[2px]"
                                >
                                    <path
                                        fill="none"
                                        d="M0 0h24v24H0V0z"
                                    ></path>
                                    <path
                                        d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-4">
                                <p class="text-lg text-gray-800 font-medium">
                                    Entrega
                                </p>
                                <div class="md:grid grid-cols-2 items-center">
                                    <div
                                        class="border-b pb-4 md:border-b-0 md:pb-0 md:border-r md:pr-4"
                                    >
                                        <p class="text-pink-500 font-bold">
                                            Confirme o endereço de entrega
                                        </p>
                                        <p class="text-gray-600 text-sm">
                                            {{ address.street }}
                                            {{ address.number }},
                                            {{ address.district }} -
                                            {{ address.city }} -
                                            {{ address.state }}
                                            {{ address.zipcode }}
                                        </p>
                                    </div>
                                    <div
                                        v-if="
                                            Object.keys(selectedShipping)
                                                .length > 0
                                        "
                                        class="mt-2 md:mt-0"
                                    >
                                        <p
                                            class="text-sm text-gray-400 md:ml-4"
                                        >
                                            {{
                                                selectedShipping.ServiceDescription
                                            }}
                                        </p>
                                        <p
                                            class="text-sm text-gray-400 md:ml-4"
                                        >
                                            R$
                                            {{ selectedShipping.ShippingPrice }}
                                            -
                                            {{ selectedShipping.DeliveryTime }}
                                            dias utéis
                                        </p>
                                        <button
                                            type="button"
                                            class="md:ml-4 text-gray-500 text-sm underline"
                                            @click="getShipping"
                                        >
                                            Alterar frete
                                        </button>
                                    </div>
                                    <div v-else>
                                        <button
                                            type="button"
                                            class="md:ml-4 text-gray-500 text-sm underline"
                                            @click="getShipping"
                                        >
                                            Calcular entrega
                                        </button>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    @click="status = 'chooseAddress'"
                                    class="border border-dashed border-pink-500 text-sm text-pink-500 py-1 w-full lg:w-96 rounded"
                                >
                                    Alterar endereço de entrega
                                </button>
                            </div>
                            <!-- <div>
                                <button>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        id="edit"
                                    >
                                        <path
                                            fill="none"
                                            d="M0 0h24v24H0Z"
                                            data-name="Path 3622"
                                        ></path>
                                        <path
                                            fill="#525863"
                                            d="M5.1 21.6a2.7 2.7 0 0 1-2.7-2.7V5.1a2.7 2.7 0 0 1 2.7-2.7h8.7a.9.9 0 0 1 0 1.8H5.1a.9.9 0 0 0-.9.9v13.8a.9.9 0 0 0 .9.9h13.8a.9.9 0 0 0 .9-.9v-8.4a.9.9 0 1 1 1.8 0v8.4a2.7 2.7 0 0 1-2.7 2.7Zm1.971-5.2.634-3.713a.014.014 0 0 1 0-.008l4.24-4.24 5.517-5.512a1.793 1.793 0 0 1 1.272-.527 1.812 1.812 0 0 1 1.282.53l.527.527.53.53a1.8 1.8 0 0 1 0 2.545l-5.516 5.517-4.238 4.24a.016.016 0 0 1-.008 0l-3.713.633a.464.464 0 0 1-.078.007.456.456 0 0 1-.449-.529Zm6.149-6.685-3.84 3.84-.219 1.28 1.28-.219 3.84-3.84L19.8 5.261l-.53-.53-.53-.53Z"
                                            data-name="Path 2689"
                                        ></path>
                                    </svg>
                                </button>
                            </div> -->
                        </div>
                    </div>
                    <div v-else-if="status === 'chooseAddress'" class="w-full">
                        <div class="flex gap-2">
                            <div>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    id="home"
                                    class="mt-[2px]"
                                >
                                    <path
                                        fill="none"
                                        d="M0 0h24v24H0V0z"
                                    ></path>
                                    <path
                                        d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-4 w-full">
                                <p class="text-lg text-gray-800 font-medium">
                                    Entrega
                                </p>
                                <div class="flex items-end gap-4">
                                    <div>
                                        <label
                                            for="address.cep"
                                            class="block text-xs leading-6 text-gray-500"
                                            >CEP</label
                                        >
                                        <div>
                                            <input
                                                @keyup="searchCep()"
                                                type="tel"
                                                v-model="address.zipcode"
                                                name="address.cep"
                                                id="address.cep"
                                                class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                placeholder="00000-000"
                                                v-mask="'#####-###'"
                                            />
                                        </div>
                                    </div>
                                    <a
                                        target="_blank"
                                        href="https://buscacepinter.correios.com.br/app/endereco/index.php?t"
                                        class="py-2 text-sm hover:underline"
                                        >Não sei meu CEP</a
                                    >
                                </div>
                                <div>
                                    <label
                                        for="address.street"
                                        class="block text-xs leading-6 text-gray-500"
                                        >Endereço</label
                                    >
                                    <div>
                                        <input
                                            type="text"
                                            v-model="address.street"
                                            name="address.street"
                                            id="address.street"
                                            class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                        />
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label
                                            for="address.number"
                                            class="block text-xs leading-6 text-gray-500"
                                            >Número</label
                                        >
                                        <div>
                                            <input
                                                type="text"
                                                v-model="address.number"
                                                name="address.number"
                                                id="address.number"
                                                class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>
                                    <div>
                                        <label
                                            for="address.district"
                                            class="block text-xs leading-6 text-gray-500"
                                            >Bairro</label
                                        >
                                        <div>
                                            <input
                                                type="text"
                                                v-model="address.district"
                                                name="address.district"
                                                id="address.district"
                                                class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>

                                    <div>
                                        <label
                                            for="address.city"
                                            class="block text-xs leading-6 text-gray-500"
                                            >Cidade</label
                                        >
                                        <div>
                                            <input
                                                type="text"
                                                v-model="address.city"
                                                name="address.city"
                                                id="address.city"
                                                class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>
                                    <div>
                                        <label
                                            for="address.state"
                                            class="block text-xs leading-6 text-gray-500"
                                            >Estado</label
                                        >
                                        <div>
                                            <input
                                                type="text"
                                                v-model="address.state"
                                                name="address.state"
                                                id="address.state"
                                                v-mask="'AA'"
                                                class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label
                                        for="address.complement"
                                        class="block text-xs leading-6 text-gray-500"
                                        >Complemento</label
                                    >
                                    <div>
                                        <input
                                            type="text"
                                            v-model="address.complement"
                                            name="address.complement"
                                            id="address.complement"
                                            class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <label
                                        for="address.receiver"
                                        class="block text-xs leading-6 text-gray-500"
                                        >Destinatário</label
                                    >
                                    <div>
                                        <input
                                            type="text"
                                            v-model="address.receiver"
                                            name="address.receiver"
                                            id="address.receiver"
                                            class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                        />
                                    </div>
                                </div>
                                <div class="flex-1 md:flex md:justify-between">
                                    <p class="text-sm text-red-500">
                                        {{ this.errorMessage }}
                                    </p>
                                </div>
                                <div>
                                    <button
                                        @click="goTofrete"
                                        type="button"
                                        class="bg-pink-500 text-white w-full py-2 rounded font-medium uppercase"
                                    >
                                        Escolher frete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else-if="status === 'chooseShipping'" class="w-full">
                        <div class="flex gap-2">
                            <div>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    id="home"
                                    class="mt-[2px]"
                                >
                                    <path
                                        fill="none"
                                        d="M0 0h24v24H0V0z"
                                    ></path>
                                    <path
                                        d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-4 w-full">
                                <p class="text-lg text-gray-800 font-medium">
                                    Entrega
                                </p>

                                <p class="text-pink-500 font-bold">
                                    Escolha uma opção de frete
                                </p>

                                <div class="w-full">
                                    <form
                                        class="flex md:grid grid-cols-2 gap-4"
                                    >
                                        <div
                                            v-for="(
                                                option, index
                                            ) in shippingOptions"
                                            :key="index"
                                            @click="selectedShipping = option"
                                            :class="[
                                                selectedShipping === option
                                                    ? 'ring-2 ring-pink-500'
                                                    : 'ring-2 ring-transparent',
                                                'flex items-center gap-4 cursor-pointer border border-pink-500 rounded p-4',
                                            ]"
                                        >
                                            <div class="w-full">
                                                <p class="mb-2" :for="option">
                                                    {{
                                                        option.ServiceDescription
                                                    }}
                                                </p>
                                                <div
                                                    class="flex justify-between"
                                                >
                                                    <p
                                                        class="text-sm text-gray-500"
                                                    >
                                                        Em até
                                                        {{
                                                            option.DeliveryTime
                                                        }}
                                                        dias úteis
                                                    </p>
                                                    <p
                                                        class="text-sm text-gray-500"
                                                    >
                                                        R$
                                                        {{
                                                            option.ShippingPrice
                                                        }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="flex-1 md:flex md:justify-between">
                                    <p class="text-sm text-red-500">
                                        {{ this.errorMessage }}
                                    </p>
                                </div>
                                <button
                                    type="button"
                                    @click="saveTax"
                                    class="border border-pink-500 text-sm text-pink-500 py-1 w-full rounded"
                                >
                                    Confirmar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="border rounded p-4 flex justify-between md:col-span-2 lg:col-span-1"
                >
                    <div class="flex gap-2">
                        <div>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="512"
                                height="512"
                                viewBox="0 0 512 512"
                                id="card"
                                class="h-6 w-6 mt-[2px]"
                            >
                                <path
                                    d="M452 96H60c-15.5 0-27.9 12.5-28 28v264c.2 15.5 12.5 28 28 28h392c15.6 0 28-12.7 28-28.3V124.3c0-15.6-12.4-28.3-28-28.3zM77.1 128h357.7c6.9 0 12.1 5.1 13.1 12v20H64v-20.3c1-6.8 6.3-11.7 13.1-11.7zm357.8 256H77.1c-6.9 0-12.1-4.9-13.1-11.7V256h384v116c-1 6.9-6.3 12-13.1 12z"
                                ></path>
                                <path
                                    d="M96 304h192v16H96zM96 336h96v16H96zM352 304h64v48h-64z"
                                ></path>
                            </svg>
                        </div>
                        <div class="flex flex-col gap-4">
                            <p class="text-lg text-gray-800 font-medium">
                                Pagamento
                            </p>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div
                                    class="flex flex-col items-start gap-2 w-52 md:w-64"
                                >
                                    <button
                                        :class="[
                                            paymentType === 'cartao'
                                                ? 'bg-pink-500 text-white'
                                                : 'bg-transparent text-pink-500',
                                            'border border-pink-500 w-full py-1 rounded',
                                        ]"
                                        @click="paymentType = 'card'"
                                        type="button"
                                    >
                                        Cartão de crédito
                                    </button>
                                    <button
                                        :class="[
                                            paymentType === 'pix'
                                                ? 'bg-pink-500 text-white'
                                                : 'bg-transparent text-pink-500',
                                            'border border-pink-500 w-full py-1 rounded',
                                        ]"
                                        @click="paymentType = 'pix'"
                                        type="button"
                                    >
                                        Pix
                                    </button>
                                    <button
                                        :class="[
                                            paymentType === 'boleto'
                                                ? 'bg-pink-500 text-white'
                                                : 'bg-transparent text-pink-500',
                                            'border border-pink-500 w-full py-1 rounded',
                                        ]"
                                        @click="paymentType = 'boleto'"
                                        type="button"
                                    >
                                        Boleto bancário
                                    </button>
                                </div>
                                <div v-if="paymentType === 'card'">
                                    <div class="flex flex-col gap-4">
                                        <div>
                                            <label
                                                for="cardName"
                                                class="block leading-6 text-gray-500"
                                                >Nome do títular</label
                                            >
                                            <div>
                                                <input
                                                    type="text"
                                                    v-model="form.cardName"
                                                    name="cardName"
                                                    id="cardName"
                                                    required
                                                    class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                />
                                            </div>
                                        </div>

                                        <div>
                                            <label
                                                for="cardDocument"
                                                class="block leading-6 text-gray-500"
                                                >CPF do títular</label
                                            >
                                            <div>
                                                <input
                                                    type="tel"
                                                    v-model="form.cardDocument"
                                                    name="cardDocument"
                                                    id="cardDocument"
                                                    required
                                                    class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                />
                                            </div>
                                        </div>

                                        <div>
                                            <label
                                                for="cardNumber"
                                                class="block leading-6 text-gray-500"
                                                >Número do cartão</label
                                            >
                                            <div>
                                                <input
                                                    type="tel"
                                                    v-model="form.cardNumber"
                                                    name="cardNumber"
                                                    id="cardNumber"
                                                    required
                                                    v-mask="
                                                        '#### #### #### ####'
                                                    "
                                                    class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="grid grid-cols-3 items-end justify-between gap-2 mt-4"
                                        >
                                            <div>
                                                <label
                                                    for="cardMonth"
                                                    class="block leading-6 text-gray-500"
                                                    >Mês de validade</label
                                                >
                                                <div>
                                                    <select
                                                        required
                                                        id="cardMonth"
                                                        name="cardMonth"
                                                        v-model="form.cardMonth"
                                                        class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                    >
                                                        <option value="01">
                                                            01
                                                        </option>
                                                        <option value="02">
                                                            02
                                                        </option>
                                                        <option value="03">
                                                            03
                                                        </option>
                                                        <option value="04">
                                                            04
                                                        </option>
                                                        <option value="05">
                                                            05
                                                        </option>
                                                        <option value="06">
                                                            06
                                                        </option>
                                                        <option value="07">
                                                            07
                                                        </option>
                                                        <option value="08">
                                                            08
                                                        </option>
                                                        <option value="09">
                                                            09
                                                        </option>
                                                        <option value="10">
                                                            10
                                                        </option>
                                                        <option value="11">
                                                            11
                                                        </option>
                                                        <option value="12">
                                                            12
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label
                                                    for="cardYear"
                                                    class="block leading-6 text-gray-500"
                                                    >Ano de validade</label
                                                >
                                                <div>
                                                    <select
                                                        required
                                                        id="cardYear"
                                                        name="cardYear"
                                                        v-model="form.cardYear"
                                                        class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                    >
                                                        <option value="01">
                                                            2023
                                                        </option>
                                                        <option value="02">
                                                            2024
                                                        </option>
                                                        <option value="03">
                                                            2025
                                                        </option>
                                                        <option value="04">
                                                            2026
                                                        </option>
                                                        <option value="05">
                                                            2027
                                                        </option>
                                                        <option value="06">
                                                            2028
                                                        </option>
                                                        <option value="07">
                                                            2029
                                                        </option>
                                                        <option value="08">
                                                            2030
                                                        </option>
                                                        <option value="09">
                                                            2031
                                                        </option>
                                                        <option value="10">
                                                            2032
                                                        </option>
                                                        <option value="11">
                                                            2033
                                                        </option>
                                                        <option value="12">
                                                            2034
                                                        </option>
                                                        <option value="12">
                                                            2035
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label
                                                    for="cardCvv"
                                                    class="block leading-6 text-gray-500"
                                                    >CVV</label
                                                >
                                                <div>
                                                    <input
                                                        required
                                                        type="tel"
                                                        v-model="form.cardCvv"
                                                        name="cardCvv"
                                                        id="cardCvv"
                                                        v-mask="'####'"
                                                        class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label
                                                for="cardInstallments"
                                                class="block leading-6 text-gray-500"
                                                >Parcelamento</label
                                            >
                                            <div>
                                                <select
                                                    required
                                                    id="cardInstallments"
                                                    name="cardInstallments"
                                                    v-model="
                                                        form.cardInstallments
                                                    "
                                                    class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                >
                                                    <option value="1">
                                                        1x sem juros
                                                    </option>
                                                    <option value="2">
                                                        2x sem juros
                                                    </option>
                                                    <option value="3">
                                                        3x sem juros
                                                    </option>
                                                    <option value="4">
                                                        4x sem juros
                                                    </option>
                                                    <option value="5">
                                                        5x sem juros
                                                    </option>
                                                    <option value="6">
                                                        6x sem juros
                                                    </option>
                                                    <option value="7">
                                                        7x sem juros
                                                    </option>
                                                    <option value="8">
                                                        8x sem juros
                                                    </option>
                                                    <option value="9">
                                                        9x sem juros
                                                    </option>
                                                    <option value="10">
                                                        10x sem juros
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-else-if="paymentType === 'pix'">
                                    <div
                                        class="flex items-center bg-gray-100 p-4 h-full"
                                    >
                                        <p>
                                            Finalize sua compra para gerar o
                                            qrcode
                                        </p>
                                    </div>
                                </div>
                                <div v-else-if="paymentType === 'boleto'">
                                    <div
                                        class="flex items-center bg-gray-100 p-4 h-full"
                                    >
                                        <p>
                                            Finalize sua compra para gerar o
                                            boleto
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4 w-full lg:w-96">
                <div id="resumo" class="lg:w-80 bg-white p-2 rounded">
                    <div class="flex space-x-3">
                        <span
                            class="bg-black rounded-full p-3 flex items-center"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="w-4 h-4 text-white"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </span>
                        <span class="font-light text-sm uppercase"
                            >Compra<br />100% segura</span
                        >
                    </div>
                    <p class="text-lg font-medium">Resumo do pedido</p>
                    <div class="max-h-[13rem] overflow-y-auto">
                        <a
                            v-for="product in cartItems"
                            :key="product.id"
                            :href="`/produto/${product.attributes.slug}`"
                            class="flex justify-between border-t py-2 pr-4"
                        >
                            <img
                                :src="product.attributes.image"
                                :alt="product.name"
                                class="h-14 w-14"
                            />
                            <div>
                                <p>{{ product.name }}</p>
                                <p class="text-end text-lg font-medium">
                                    R$
                                    {{
                                        product.quantity > 1
                                            ? `${(
                                                  (product.price / 100) *
                                                  product.quantity
                                              ).toFixed(2)}`
                                            : (product.price / 100).toFixed(2)
                                    }}
                                </p>
                            </div>
                        </a>
                    </div>
                    <hr />
                    <!-- <button class="text-sm text-end">Voltar para o carrinho</button> -->
                    <div class="mt-2 grid grid-cols-3 items-end gap-2">
                        <div class="col-span-2">
                            <label
                                for="cupom"
                                class="block text-xs leading-6 text-gray-500"
                                >Insira o cupom</label
                            >
                            <div>
                                <input
                                    type="text"
                                    v-model="cupomName"
                                    name="cupomName"
                                    id="cupomName"
                                    placeholder="código"
                                    class="block w-full rounded-md border-0 border-black px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset outline-none ring-black placeholder:text-gray-400 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                />
                            </div>
                        </div>
                        <div>
                            <button
                                @click="getCupom"
                                type="button"
                                class="bg-black text-white uppercase rounded py-[0.30rem] px-2"
                            >
                                ADICIONAR
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 mt-2">
                        <p class="text-sm">Subtotal</p>
                        <p class="text-end text-sm">{{ subtotal }}</p>
                        <p class="text-sm">Descontos</p>
                        <p class="text-end">R$ -{{ cupom }}</p>
                        <p class="text-sm">Entrega</p>
                        <p class="text-end">
                            R$
                            {{
                                selectedShipping.ShippingPrice
                                    ? selectedShipping.ShippingPrice
                                    : "0,00"
                            }}
                        </p>
                        <p class="text-lg font-medium">Total</p>
                        <p class="text-end text-lg font-medium text-pink-500">
                            R$ {{ getTotalPrice() }}
                        </p>
                    </div>
                    <button
                        type="button"
                        @click="createOrder"
                        class="bg-pink-500 text-white py-2 text-xl font-bold w-full rounded mt-2"
                    >
                        FINALIZAR COMPRA
                    </button>
                </div>
            </div>
        </div>
    </div>
    <Alert v-if="alertShow" :title="titleError" />
</template>

<script>
import axios from "axios";
import Alert from "../Alert.vue";

export default {
    name: "JustbeautyPayment",
    props: {
        form: {
            type: Object,
            required: true,
        },

        cartItems: {
            type: Object,
            required: true,
        },

        amount: {
            type: Object,
            required: true,
        },

        user: {
            type: Object,
            required: true,
        },
    },
    components: { Alert },
    data() {
        return {
            hasErrors: false,
            alertShow: false,
            titleError: "",
            errorMessage: "",
            shippingOptions: [],
            selectedShipping: {},
            cupomName: "",
            cupom: 0.0,
            typeCupom: "",
            paymentType: "pix",
            address: {
                zipcode: "",
                street: "",
                number: "",
                district: "",
                city: "",
                state: "",
                complement: "",
                receiver: "",
            },
            status: "addressTrue",
        };
    },

    computed: {
        subtotal() {
            return Intl.NumberFormat("pt-BR", {
                style: "currency",
                currency: "BRL",
            }).format(
                Object.values(this.cartItems).reduce(
                    (total, item) => total + (item.price * item.quantity) / 100,
                    0
                )
            );
        },

        total() {
            return Intl.NumberFormat("pt-BR", {
                style: "currency",
                currency: "BRL",
            }).format(
                Object.values(this.cartItems).reduce(
                    (total, item) => total + (item.price * item.quantity) / 100,
                    0
                )
            );
        },
    },

    methods: {
        getCupom() {
            axios
                .get(`https://4bbeauty.com.br/api/coupom/${this.cupomName}`)
                .then((res) => {
                    console.log(res);
                    if (res.data === "cupom inativo") {
                        this.titleError = "Cupom inativo ou inexistente";
                        this.alertShow = true;
                    } else {
                        this.typeCupom = res.data.data.type;
                        if (this.typeCupom === "subtração") {
                            const value = res.data.data.value;
                            this.cupom = parseFloat(value).toFixed(2);
                        } else {
                            const value = parseInt(res.data.data.value);
                            console.log(value);
                            console.log(this.amount.subtotal);
                            this.cupom = ((value / 100) * this.amount.subtotal).toFixed(2);
                            console.log(this.cupom);
                        }
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        saveTax() {
            this.hasErrors = false;
            this.errorMessage = "";
            if (Object.keys(this.selectedShipping).length > 0) {
                this.status = "addressTrue";
            } else {
                this.hasErrors = true;
                this.errorMessage =
                    "Selecione uma opção de frete para continuar";
            }
        },
        getTotalPrice() {
            const totalString = this.total.match(/\d/g);
            const total = totalString.join("") / 100;

            const priceProducts = parseFloat(total);
            let priceShipping = 0;
            if (this.selectedShipping.ShippingPrice) {
                priceShipping = parseFloat(this.selectedShipping.ShippingPrice);
            }

            if (this.typeCupom === "subtração") {
                return (priceProducts - this.cupom + priceShipping).toFixed(2);
            } else if (this.typeCupom === "porcentagem") {
                return (priceProducts - this.cupom + priceShipping).toFixed(2);
            }

            return (priceProducts + priceShipping).toFixed(2);
        },
        getShipping() {
            this.status = "chooseShipping";
            let cep = this.address.zipcode.replace("-", "");
            let ShippingItemArray = Object.keys(this.cartItems).map((item) => {
                return {
                    Height: this.cartItems[item].attributes.height,
                    Length: this.cartItems[item].attributes.length,
                    Quantity: this.cartItems[item].quantity,
                    Weight: this.cartItems[item].attributes.weight,
                    Width: this.cartItems[item].attributes.width,
                };
            });

            axios
                .post("https://4bbeauty.com.br/api/calcular-frete", {
                    SellerCEP: "88316000",
                    RecipientCEP: cep,
                    ShippingItemArray: ShippingItemArray,
                    RecipientCountry: "BR",
                    Price: this.amount.subtotal,
                })
                .then((response) => {
                    this.status = "chooseShipping";
                    this.shippingOptions =
                        response.data.response.ShippingSevicesArray;
                })
                .catch((error) => {
                    this.errorMessage =
                        "Ocorreu um erro ao consultar opções de entrega, tente novamente!";
                    this.hasErrors = true;
                });
        },

        searchCep() {
            this.errorMessage = "";
            this.hasErrors = false;
            const cep = this.address.zipcode.replace(/\.|\-/g, "");

            if (this.address.zipcode.length === 9) {
                axios
                    .get(`https://viacep.com.br/ws/${cep}/json`)
                    .then((response) => {
                        if (response.data.erro) {
                            this.address.state = "";
                            this.address.city = "";
                            this.address.district = "";
                            this.address.street = "";

                            this.errorMessage =
                                "Ocorreu um erro ao consultar o CEP, tente novamente!";
                            this.hasErrors = true;
                            return;
                        }

                        this.address.state = response.data.uf;
                        this.address.city = response.data.localidade;
                        this.address.district = response.data.bairro;
                        this.address.street = response.data.logradouro;

                        this.errorMessage = "";
                        this.hasErrors = false;
                    })
                    .catch((error) => {
                        this.errorMessage =
                            "Ocorreu um erro ao consultar o CEP, tente novamente!";
                        this.hasErrors = true;
                    });
            } else {
                this.address.state = "";
                this.address.city = "";
                this.address.district = "";
                this.address.street = "";
            }
        },

        goTofrete() {
            this.errorMessage = "";
            this.hasErrors = false;

            if (this.address.zipcode.length != 9) {
                this.errorMessage = "Insira um endereço válido";
                this.hasErrors = true;
            } else if (this.address.street.length < 3) {
                this.errorMessage = "Insira um endereço válido";
                this.hasErrors = true;
            } else if (this.address.number.length < 1) {
                this.errorMessage = "Campo número é obrigatório";
                this.hasErrors = true;
            } else if (this.address.district.length < 1) {
                this.errorMessage = "Campo bairro é obrigatório";
                this.hasErrors = true;
            } else if (this.address.city.length < 1) {
                this.errorMessage = "Campo cidade é obrigatório";
                this.hasErrors = true;
            } else if (this.address.state.length != 2) {
                this.errorMessage = "Insira um estado válido. Exemplo: RJ";
                this.hasErrors = true;
            }

            if (!this.hasErrors) {
                this.form.paymentType = this.paymentType;
                this.form.zipcode = this.address.zipcode;
                this.form.state = this.address.state;
                this.form.city = this.address.city;
                this.form.street = this.address.street;
                this.form.district = this.address.district;
                this.form.number = this.address.number;
                this.selectedShipping = {};
                this.getShipping();
                this.status = "chooseShipping";
            }
        },

        selectShipping() {
            this.form.shippingServiceDescription =
                this.selectedShipping.ServiceDescription;
            this.form.shippingCarrier = this.selectedShipping.Carrier;
            this.form.shippingCarrierCode = this.selectedShipping.CarrierCode;
            this.form.shippingDeliveryTime = this.selectedShipping.DeliveryTime;
            this.form.shippingOriginalDeliveryTime =
                this.selectedShipping.OriginalDeliveryTime;
            this.form.shippingOriginalShippingPrice =
                this.selectedShipping.OriginalShippingPrice;
            this.form.shippingServiceCode = this.selectedShipping.ServiceCode;
            this.form.shippingShippingPrice =
                this.selectedShipping.ShippingPrice;
            this.form.type = this.paymentType;
        },

        clearErrors() {
            this.titleError = "";
            this.alertShow = false;
        },

        createOrder() {
            const priceShipping = parseFloat(
                this.selectedShipping.ShippingPrice
            );
            const total = (this.amount.subtotal - this.cupom  + priceShipping).toFixed(2);

            const data = {
                shipping_carrier: this.selectedShipping.Carrier,
                shipping_carrier_code: this.selectedShipping.CarrierCode,
                shipping_service_code: this.selectedShipping.ServiceCode,
                shipping_service_description:
                    this.selectedShipping.ServiceDescription,
                shipping_delivery_time: this.selectedShipping.DeliveryTime,
                shipping_original_delivery_time:
                    this.selectedShipping.OriginalDeliveryTime,
                shipping_shipping_price: parseFloat(
                    this.selectedShipping.ShippingPrice
                ),
                shipping_original_shipping_price:
                    this.selectedShipping.OriginalShippingPrice,
                paymentType: this.paymentType,
                zipcode: this.address.zipcode,
                state: this.address.state,
                city: this.address.city,
                street: this.address.street,
                district: this.address.district,
                number: this.address.number,
                complement: this.address.complement,
                name: this.user.name,
                document: this.user.document,
                email: this.user.email,
                id: this.user.id,
                cardName: this.form.cardName,
                cardNumber: this.form.cardNumber,
                cardMonth: this.form.cardMonth,
                cardYear: this.form.cardYear,
                cardCvv: this.form.cardCvv,
                cardInstallments: this.form.cardInstallments,
                cartItems: this.cartItems,
                total: parseFloat(total),
                subtotal: this.amount.subtotal,
            };
            if (Object.keys(this.selectedShipping).length < 1) {
                this.titleError =
                    "Preencha todos os campos corretamente para finalizar a compra";
                this.alertShow = true;
                this.hasErrors = true;
                setTimeout(this.clearErrors, 5000);
            } else if (this.paymentType === "card") {
                if (
                    this.form.cardCvv.length < 3 ||
                    this.form.cardNumber.length < 19 ||
                    this.form.cardInstallments.length < 1 ||
                    this.form.cardYear.length < 1 ||
                    this.form.cardMonth.length < 1 ||
                    this.form.cardName.length < 1
                ) {
                    this.titleError =
                        "Preencha todos os campos corretamente para finalizar a compra";
                    this.hasErrors = true;
                    this.alertShow = true;
                    setTimeout(this.clearErrors, 5000);
                }
            }
            if (!this.hasErrors) {
                this.selectShipping;
                axios
                    .post("https://4bbeauty.com.br/api/pagamento", data)
                    .then((res) => {
                        const orderId = JSON.stringify(res.data);
                        window.location.href = `/sucesso/${orderId}`;
                    });
            }
        },
    },

    created() {
        this.form.id = this.user.id;
        this.form.name = this.user.name;
        this.form.document = this.user.document;
        this.form.email = this.user.email;
        this.form.phone = this.user.cellphone;
        this.form.cardCvv = "";
        this.form.cardNumber = "";
        this.form.cardInstallments = "";
        this.form.cardYear = "";
        this.form.cardMonth = "";
        this.form.cardName = "";

        if (this.user.address_id) {
            this.address = this.user.address;
        } else {
            this.status = "chooseAddress";
        }
    },
};
</script>

<style scoped>
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield;
}
</style>
