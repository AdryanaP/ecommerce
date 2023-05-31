<template>
    <div class="flex flex-col gap-4">
        <div class="flex justify-between border p-4 rounded">
            <p class="m-0 font-bold text-xl text-black capitalize">
                {{ order.status }}
            </p>
            <button
                class="block border border-pink-500 text-pink-500 w-44 rounded-full"
            >
                Rastrear entrega
            </button>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex items-start gap-4 border p-4 rounded">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    id="pin"
                    class="h-8 w-8"
                >
                    <path
                        fill="none"
                        stroke="#000"
                        stroke-miterlimit="10"
                        d="M10 2C6.7 2 4 4.8 4 8.2c0 2.7 3.6 7.4 5.2 9.4.4.5 1.1.5 1.5 0 1.6-2 5.2-6.8 5.2-9.4C16 4.8 13.3 2 10 2zm0 8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"
                    ></path>
                </svg>
                <div>
                    <p class="m-0 text-sm">{{ order.customer_name }}</p>
                    <p class="m-0 text-sm">
                        {{ order.address.street }},
                        {{ order.address.district }}, {{ order.address.city }},
                        {{ order.address.state }} - {{ order.address.zipcode }}
                    </p>
                </div>
            </div>
            <div class="flex items-start gap-4 border p-4 rounded">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="64"
                    height="64"
                    viewBox="0 0 16.933 16.933"
                    id="bill"
                    class="h-7 w-7"
                >
                    <path
                        style="
                            line-height: normal;
                            font-variant-ligatures: normal;
                            font-variant-position: normal;
                            font-variant-caps: normal;
                            font-variant-numeric: normal;
                            font-variant-alternates: normal;
                            font-feature-settings: normal;
                            text-indent: 0;
                            text-align: start;
                            text-decoration-line: none;
                            text-decoration-style: solid;
                            text-decoration-color: #000;
                            text-transform: none;
                            text-orientation: mixed;
                            shape-padding: 0;
                            isolation: auto;
                            mix-blend-mode: normal;
                        "
                        d="M1.854 0C.819 0 0 .83 0 1.852c-.002 4.94.002 9.878.002 14.816 0 .221.256.345.429.207l1.488-1.19 1.488 1.19a.265.265 0 0 0 .33 0l1.488-1.19 1.49 1.19a.265.265 0 0 0 .33 0l1.489-1.19 1.488 1.19a.265.265 0 0 0 .33 0l1.487-1.19 1.488 1.19c.174.139.43.015.43-.207l.002-8.733h2.91a.26.26 0 0 0 .263-.263V1.854A1.85 1.85 0 0 0 15.083 0Zm0 .53h11.932c-.35.337-.556.8-.556 1.324l-.002 14.265-1.222-.98a.265.265 0 0 0-.33 0l-1.49 1.191-1.488-1.191a.264.264 0 0 0-.33 0L6.878 16.33 5.391 15.14a.265.265 0 0 0-.33 0L3.575 16.33 2.085 15.14a.264.264 0 0 0-.33 0l-1.224.98L.53 1.852c0-.77.634-1.322 1.324-1.322zm13.228 0c.73 0 1.324.586 1.324 1.324v5.554H13.76V1.854c0-.738.592-1.324 1.322-1.324zM3.707 3.439c-.133 0-.265.089-.265.266v.287c-.599.116-1.058.63-1.058 1.252 0 .42.217.672.48.799.264.127.552.147.816.174.265.027.506.06.639.125.133.064.181.15.181.32 0 .406-.34.743-.782.746-.384-.014-.658-.23-.784-.623-.106-.339-.614-.175-.503.162.152.475.48.844 1.011.96v.294c0 .354.53.354.53 0v-.282c.598-.116 1.058-.635 1.058-1.257 0-.388-.18-.654-.48-.799-.264-.126-.552-.146-.817-.173-.264-.028-.502-.056-.639-.126-.122-.062-.181-.142-.181-.32 0-.41.34-.742.783-.745.421.016.666.26.783.622.107.339.615.175.504-.162-.152-.474-.5-.857-1.012-.959v-.295c0-.177-.132-.266-.264-.266zm2.645.265c-.355 0-.355.527 0 .53h4.763c.353 0 .353-.53 0-.53zm0 1.852c-.355 0-.355.53 0 .53h4.763c.352 0 .353-.53 0-.53zm0 1.852c-.355 0-.355.527 0 .527h4.763c.352 0 .352-.527 0-.527zM2.649 9.26c-.356 0-.356.537 0 .529h8.466c.352 0 .352-.53 0-.53zm0 1.852c-.356 0-.356.53 0 .53h8.466c.352 0 .352-.53 0-.53zm0 1.852c-.356 0-.356.529 0 .53h8.466c.352 0 .352-.53 0-.53z"
                        color="#000"
                        font-family="sans-serif"
                        font-weight="400"
                        overflow="visible"
                    ></path>
                </svg>
                <div>
                    <p class="m-0 text-sm">Subtotal: R$ {{ order.subtotal }}</p>
                    <p class="m-0 text-sm">Preço total: R$ {{ order.total }}</p>
                    <p class="m-0 text-sm">
                        Data do pedido:
                        {{
                            new Date(order.created_at).toLocaleDateString(
                                "pt-BR"
                            )
                        }}
                    </p>
                </div>
            </div>
        </div>
        <div>
            <div class="flex flex-col gap-4 border rounded p-4">
                <div
                    class="flex justify-between"
                    v-for="product in order.products.data"
                    :key="product.id"
                >
                    <div class="flex gap-6">
                        <a
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
                        <div class="text-sm flex flex-col gap-2">
                            <p class="m-0">{{ product.name }}</p>
                            <p class="m-0">R$ {{ product.price }}</p>
                        </div>
                    </div>
                    <div
                        v-if="order.status === 'entregue'"
                        class="flex flex-col gap-2 items-center justify-center"
                    >
                        <button
                            @click="open = true"
                            class="no-underline text-center block border border-pink-500 bg-pink-500 text-white w-48 rounded-full"
                        >
                            Avaliar
                        </button>
                        <button
                            class="block border border-pink-500 text-pink-500 w-48 rounded-full"
                        >
                            Devolver
                        </button>
                    </div>
                    <div
                        v-else
                        class="flex flex-col gap-2 items-center justify-center"
                    >
                        <a
                            :href="`/produto/${
                                product.parent
                                    ? product.parent.slug
                                    : product.slug
                            }`"
                            class="no-underline text-center block border border-pink-500 bg-pink-500 text-white w-48 rounded-full"
                        >
                            Ver Produto
                        </a>
                    </div>
                    <TransitionRoot as="template" :show="open">
                        <Dialog
                            as="div"
                            class="relative z-10"
                            @close="open = false"
                        >
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
                                            class="relative w-full transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6"
                                        >
                                            <div>
                                                <div class="text-center my-2">
                                                    <DialogTitle
                                                        as="h3"
                                                        class="text-lg font-semibold leading-6 text-gray-900"
                                                        >Avaliação</DialogTitle
                                                    >
                                                </div>
                                            </div>
                                            <div>
                                                <ReviewModal
                                                    :product="product"
                                                    :userId="user"
                                                />
                                            </div>
                                        </DialogPanel>
                                    </TransitionChild>
                                </div>
                            </div>
                        </Dialog>
                    </TransitionRoot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import ReviewModal from "./ReviewModal.vue";

export default {
    name: "JustbeautyMyOrder",
    props: {
        order: {
            type: Object,
            required: true,
        },
        user: {
            type: Number,
            required: true,
        },
    },
    components: {
        Dialog,
        DialogPanel,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        ReviewModal,
    },
    data() {
        return {
            totalOrder: this.order.data,
            open: false,
        };
    },
    created() {
        console.log(order.products);
    },
};
</script>
