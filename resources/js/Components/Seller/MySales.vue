<template>
    <div v-if="orders.length" class="flex flex-col gap-6 px-2 md:w-[60%] my-4">
        <div
            v-for="(order, index) in orders"
            :key="index"
            class="border border-pink-500 rounded px-4 pb-4"
        >
            <div
                class="flex flex-col md:flex-row gap-2 justify-between items-center border-b border-pink-500 py-4"
            >
                <div class="flex gap-2 items-center">
                    <p class="m-0 text-xs">
                        Data do pedido:
                        {{
                            new Date(order.created_at).toLocaleDateString(
                                "pt-BR"
                            )
                        }}
                    </p>
                </div>
                <p class="m-0 text-xs text-end">ID: {{ order.uuid }}</p>
            </div>
            <div>
                <div class="flex justify-between items-center mt-4">
                    <div class="flex gap-4">
                        <a :href="`/produto/${order.product.slug}`">
                            <img
                                :src="order.product.images[0]"
                                alt="imagem produto"
                                class="w-32 h-32 object-contain border p-2 m-0"
                            />
                        </a>
                        <div class="text-sm flex flex-col gap-2">
                            <p class="font-bold text-lg">
                                {{ order.product.name }}
                            </p>
                            <p class="font-medium">
                                R$ {{ order.product.price }}
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col text-sm gap-2 items-center justify-center">
                        <p class="text-center font-medium text-pink-500">
                            Comprador
                        </p>
                        <p class="italic font-medium text-gray-700">
                            {{ order.client.name }}
                        </p>
                        <p class="text-center font-medium text-pink-500">
                            Contato
                        </p>
                        <p class="italic font-medium text-gray-700">{{ order.client.email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <p class="text-center my-4 italic text-gray-500">
            Não há pedidos ainda
        </p>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "MyOrders",
    props: {
        userId: {
            type: Number,
            required: true,
        },
    },

    data() {
        return {
            orders: {},
        };
    },

    created() {
        console.log(this.userId);
        axios
            .get(`/api/seller-orders/${this.userId}`)
            .then((res) => {
                console.log(res.data);
                this.orders = res.data;

                this.orders.forEach((order) => {
                    order.product.images = JSON.parse(order.product.images);
                    order.product.price = parseFloat(
                        order.product.price
                    ).toFixed(2);
                });
                console.log(this.orders);
            })
            .catch((error) => {});
    },
};
</script>
