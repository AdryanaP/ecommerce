import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

import VueTheMask from "vue-the-mask";

import PasswordInput from "./Components/Forms/PasswordInput.vue";
import PasswordConfirmationInput from "./Components/Forms/PasswordConfirmationInput.vue";

import ReviewModal from "./Components/ReviewModal.vue";

import AddProducts from "./Components/Seller/AddProducts.vue";
import MyProducts from "./Components/Seller/MyProducts.vue";
import UpdateProductCard from "./Components/Seller/UpdateProductCard.vue";
import UpdateProduct from "./Components/Seller/UpdateProduct.vue";
import MySales from "./Components/Seller/MySales.vue";

import MyFavorites from "./Components/Client/MyFavorites.vue";
import UpdateAccount from "./Components/Client/UpdateAccount.vue";
import MyOrders from "./Components/Client/MyOrders.vue";


import Home from "./Components/Home.vue";
import Navbar from "./Components/Navbar.vue";

import Alert from "./Components/Alert.vue";
import Modal from "./Components/Modal.vue";

import ProductCard from "./Components/ProductCard.vue";

import ProductReviews from "./Components/Product/ProductReviews.vue";
import ProductGallery from "./Components/Product/ProductGallery.vue";
import ProductActionButtons from "./Components/Product/ProductActionButtons.vue";
import WishlistToggle from "./Components/Product/WishlistToggle.vue";
import ProductPage from "./Components/Product/ProductPage.vue";

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el }),
})
    .use(SpladePlugin, {
        max_keep_alive: 10,
        transform_anchors: false,
        progress_bar: {
            delay: 250,
            color: "#ec4899",
            css: true,
            spinner: false,
        },
        components: {
            PasswordInput,
            PasswordConfirmationInput,
            ProductGallery,
            ProductActionButtons,
            WishlistToggle,
            MyOrders,
            ReviewModal,
            ProductReviews,
            Alert,
            Navbar,
            Home,
            AddProducts,
            ProductCard,
            ProductPage,
            MyFavorites,
            MyProducts,
            UpdateProductCard,
            UpdateProduct,
            UpdateAccount,
            Modal,
            MySales
        },
    })
    .use(VueTheMask)
    .mount(el);
