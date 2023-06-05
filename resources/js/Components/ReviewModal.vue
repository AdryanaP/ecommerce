<template>
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
                        v-model="name"
                        required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
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
                        autocomplete="email"
                        v-model="email"
                        required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                        placeholder=""
                    />
                </div>
            </div>
            <div>
                <RadioGroup v-model="selectedColor">
                    <RadioGroupLabel
                        class="block text-sm font-medium leading-6 text-gray-900"
                        >Avalie esse produto</RadioGroupLabel
                    >
                    <div class="mt-4 flex items-center space-x-3">
                        <RadioGroupOption
                            as="template"
                            v-for="rating in ratings"
                            :key="rating.number"
                            :value="rating"
                            @click="selectedRating = rating.number"
                            v-model="selectedRating"
                        >
                            <div>
                                <svg
                                    class="w-7 h-7 text-pink-400 cursor-pointer transition-all"
                                    :fill="
                                        selectedRating >= rating.number
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
                        </RadioGroupOption>
                    </div>
                </RadioGroup>
            </div>
            <div>
                <label
                    for="comment"
                    class="block text-sm font-medium leading-6 text-gray-900"
                    >Deixe seu comentário</label
                >
                <div class="mt-2">
                    <textarea
                        rows="4"
                        name="comment"
                        id="comment"
                        v-model="comment"
                        class="block resize-none w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:py-1.5 sm:text-sm sm:leading-6"
                    >
                    </textarea>
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
                class="inline-flex w-full justify-center rounded-md bg-pink-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500"
                @click="postReview"
            >
                Avaliar
            </button>
        </div>
    </div>
</template>

<script>
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";
import axios from "axios";

export default {
    name: "ReviewModal",
    components: { RadioGroup, RadioGroupLabel, RadioGroupOption },
    props: {
        product: {
            type: Number,
            required: true,
        },
        userId: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            alert: {
                show: false,
                color: "",
                message: "",
            },
            open: true,
            editReview: false,
            reviewId: "",
            selectedRating: 0,
            name: "",
            email: "",
            comment: "",
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

    methods: {
        postReview() {
            this.alert.show = false;
            this.alert.message = "";

            if (this.selectedRating === 0) {
                this.alert.color = "text-red-500";
                this.alert.message = "Avalie o produto";
                this.alert.show = true;
            } else {
                const data = {
                    name: this.name,
                    email: this.email,
                    comment: this.comment,
                    rating_number: this.selectedRating,
                    product: this.product.parent_id != null ? this.product.parent_id : this.product.id,
                    user_id: this.userId,
                };

                if (this.editReview) {
                    axios
                        .put(`/api/avaliacoes/${reviewId}`, data)
                        .then(() => {
                            this.alert.message =
                                "Cometário editado com sucesso";
                            this.alert.color = "text-green-500";
                            this.alert.show = true;
                            setTimeout(() => {
                                location.reload();
                            }, 5000);
                        })
                        .catch((error) => {
                            this.alert.color = "text-red-500";
                            this.alert.message = error;
                            this.alert.show = true;
                        });
                } else {
                    axios
                        .post("/api/avaliacoes", data)
                        .then(() => {
                            this.alert.message =
                                "Cometário enviado com sucesso";
                            this.alert.color = "text-green-500";
                            this.alert.show = true;
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        })
                        .catch((error) => {
                            this.alert.color = "text-red-500";
                            this.alert.message = error;
                            this.alert.show = true;
                        });
                }
            }
        },
    },

    created() {
        axios
            .get(
                `/api/avaliacao/${this.product.parent_id != null ? this.product.parent_id : this.product.id}/${this.userId}`,
                {
                    headers: {
                        Accept: "application/json",
                        //   Authorization: "Bearer " + token,
                    },
                }
            )
            .then((res) => {
                if (res.data != "sem avaliação") {
                    this.name = res.data.name;
                    this.reviewId = res.data.id;
                    this.email = res.data.email;
                    this.comment = res.data.comment;
                    this.selectedRating = res.data.rating_number;
                    this.editReview = true;
                }
            });
    },
};
</script>
