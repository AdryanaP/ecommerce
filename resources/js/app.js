import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

import VueTheMask from "vue-the-mask";

import PasswordInput from "./Components/Forms/PasswordInput.vue";
import PasswordConfirmationInput from "./Components/Forms/PasswordConfirmationInput.vue";

import Search from "./Components/Search.vue";
import MyOrders from "./Components/MyOrders.vue";
import MyOrder from "./Components/MyOrder.vue";
import MyAccount from "./Components/MyAccount.vue";

import ReviewModal from "./Components/ReviewModal.vue";

import AddProducts from "./Components/Seller/AddProducts.vue";
import MyProducts from "./Components/Seller/MyProducts.vue";
import UpdateProductCard from "./Components/Seller/UpdateProductCard.vue";
import UpdateProduct from "./Components/Seller/UpdateProduct.vue";

import MyFavorites from "./Components/Client/MyFavorites.vue";

import Navbar from "./Components/Navbar.vue";

import Alert from "./Components/Alert.vue";
import ProductCard from "./Components/ProductCard.vue";

import Wishlist from "./Components/Wishlist.vue";

import ProductReviews from "./Components/Product/ProductReviews.vue";
import ProductGallery from "./Components/Product/ProductGallery.vue";
import ProductActionButtons from "./Components/Product/ProductActionButtons.vue";
import WishlistToggle from "./Components/Product/WishlistToggle.vue";
import ProductPage from "./Components/Product/ProductPage.vue";

import Payment from "./Components/Checkout/Payment.vue";

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
            Search,
            MyOrders,
            MyOrder,
            ReviewModal,
            ProductReviews,
            Alert,
            Wishlist,
            Payment,
            Navbar,
            MyAccount,
            AddProducts,
            ProductCard,
            ProductPage,
            MyFavorites,
            MyProducts,
            UpdateProductCard,
            UpdateProduct
        },
    })
    .use(VueTheMask)
    .mount(el);
