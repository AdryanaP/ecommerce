<template>
    <div v-if="totalOrders.length">
        <div class="flex flex-col gap-6">
            <div
                v-for="(order, index) in totalOrders"
                :key="index"
                class="border rounded px-4 pb-4"
            >
                <div class="flex justify-between items-center border-b">
                    <p class="font-bold text-black my-4">{{ order.status }}</p>
                    <div class="flex gap-2 items-center">
                        <div>
                            <p class="m-0 text-xs">
                                Data do pedido:
                                {{
                                    new Date(
                                        order.created_at
                                    ).toLocaleDateString("pt-BR")
                                }}
                            </p>
                            <p class="m-0 text-xs text-end">
                                ID: 444494946464944
                            </p>
                        </div>
                        <!-- <div class="border-l pl-2">
                        <button class="flex items-center" type="button">
                            <p class="m-0 text-sm font-bold">
                                Detalhes do pedido
                            </p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                id="chevron"
                                class="h-6 w-6"
                            >
                                <path
                                    d="M11 10L7.859 6.58a.695.695 0 0 1 0-.978.68.68 0 0 1 .969 0l3.83 3.908a.697.697 0 0 1 0 .979l-3.83 3.908a.68.68 0 0 1-.969 0 .695.695 0 0 1 0-.978L11 10z"
                                ></path>
                            </svg>
                        </button>
                    </div> -->
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mt-4">
                        <div
                            v-if="order.products.data.length > 1"
                            class="flex gap-2 overflow-y-auto"
                        >
                            <a
                                v-for="product in order.products.data"
                                :key="product.id"
                                :href="`/produto/${
                                    product.parent
                                        ? product.parent.slug
                                        : product.slug
                                }`"
                            >
                                <img
                                    :src="product.image"
                                    alt="imagem produto"
                                    class="w-24 h-24 border p-2 m-0"
                                />
                            </a>
                        </div>
                        <div v-else class="flex gap-4">
                            <a
                                :href="`/produto/${
                                    order.products.data[0].parent
                                        ? order.products.data[0].parent.slug
                                        : order.products.data[0].slug
                                }`"
                            >
                                <img
                                    v-for="product in order.products.data"
                                    :key="product.id"
                                    :src="product.image"
                                    alt="imagem produto"
                                    class="w-24 h-24 border p-2 m-0"
                                />
                            </a>
                            <div class="text-sm flex flex-col gap-2">
                                <p class="m-0">
                                    {{ order.products.data[0].name_br }}
                                </p>
                                <p class="m-0">
                                    R$ {{ order.products.data[0].price }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 items-center">
                            <p class="m-0 font-bold text-sm">
                                Total: R$ {{ order.total }}
                            </p>
                            <a
                                :href="`/pedido/${order.id}`"
                                class="no-underline text-center block border border-pink-500 bg-pink-500 text-white w-44 rounded-full"
                            >
                                Detalhes do pedido
                            </a>
                            <button
                                v-if="order.status === 'pedido entregue'"
                                class="block border border-pink-500 text-pink-500 w-44 rounded-full"
                            >
                                Devolver
                            </button>
                            <button
                                v-else
                                class="block border border-pink-500 text-pink-500 w-44 rounded-full"
                            >
                                Rastrear entrega
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <p class="text-center my-8 italic text-gray-500 text-lg">
            Não há pedidos ainda
        </p>
    </div>
</template>

<script>
export default {
    name: "JustbeautyMyOrders",
    props: {
        orders: {
            type: Object,
            required: true,
        },
        user: {
            type: Number,
            required: true,
        },
    },

    data() {
        return {
            totalOrders: this.orders.data,
        };
    },
};
</script>
