<template>
    <div>
        <p class="text-3xl font-medium text-center">Avaliações</p>
        <div v-if="reviews.length">
            <div v-for="review in reviews" :key="review.id">
                <div
                    class="flex flex-col gap-2 md:w-[38rem] m-auto my-4 border-b p-4"
                >
                    <div class="flex justify-between">
                        <div class="flex gap-2 items-center">
                            <div v-for="rating in ratings" :key="rating.number">
                                <svg
                                    class="w-7 h-7 text-pink-400"
                                    :fill="
                                        review.rating_number >= rating.number
                                            ? 'currentColor'
                                            : 'gray'
                                    "
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-sm">
                                    ({{ review.rating_number }}.0)
                                </p>
                            </div>
                        </div>
                        <p class="text-xs">
                            {{
                                new Date(review.created_at).toLocaleDateString(
                                    "pt-BR"
                                )
                            }}
                        </p>
                    </div>
                    <p class="font-bold">{{ review.name }}</p>
                    <p class="text-sm">
                        {{ review.comment }}
                    </p>
                </div>
            </div>
        </div>
        <div v-else>
            <h1 class="text-center my-8 italic text-gray-500 text-lg">
                Não há avaliações ainda
            </h1>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "JustbeautyProductReviews",
    props: {
        productId: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            reviews: [],
            ratings: [
                {
                    number: "1",
                },
                {
                    number: "2",
                },
                {
                    number: "3",
                },
                {
                    number: "4",
                },
                {
                    number: "5",
                },
            ],
        };
    },

    methods: {},

    created() {
        axios
            .get(`https://4bbeauty.com.br/api/avaliacoes/${this.productId}`)
            .then((res) => {
                this.reviews = res.data;
            });
    },
};
</script>
