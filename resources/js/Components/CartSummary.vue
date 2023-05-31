<template>
    calcular
</template>

<script>

import axios from "axios";

export default {

    props: {
        items: {
            type: Object,
            required: true
        },
    },

    data() {
        return {

            recipientCEP: "14270000",
            shipmentInvoiceValue: 0,
            shippingItemArray: [],

        }
    },

    beforeMount() {
        const arr = Array.from(this.items);

        arr.forEach((item) => console.log(item));
    },

    // beforeMount() {
    //     this.items.forEach(function (item) {
    //         this.shippingItemArray.push({
    //             "Weight": item.attributes.weight,
    //             "Height": item.attributes.height,
    //             "Length": item.attributes.length,
    //             "Width": item.attributes.width,
    //             "SKU": item.attributes.sku,
    //             "Quantity": item.quantity,
    //         })
    //     })
    // },

    methods: {

        //

    },

    mounted() {
        // axios.post(
        //     'https://api.frenet.com.br/shipping/quote',
        //     {
        //             "SellerCEP": "88316000",
        //             "RecipientCEP": this.recipientCEP,
        //             "ShipmentInvoiceValue": this.shipmentInvoiceValue,
        //             "ShippingServiceCode": null,
        //             "ShippingItemArray": this.shippingItemArray,
        //             "RecipientCountry": "BR"
        //             },
        //     {
        //             headers: {
        //                 "Accept": "application/json",
        //                 "Content-Type": "application/json",
        //                 "token": "7EF4937BR1EE4R445FR930CR3212FE9397AD"
        //             }
        //         }
        //     )
        //     .then(
        //         (res) => {
        //             console.log(res.data)
        //         }
        //     )
        //     .catch(
        //         (error) => {
        //             console.log(error)
        //         }
        //     );
    },

}

</script>
