import { createRouter, createWebHistory } from "vue-router";
// import public accessed routes
import User from "../layouts/User.vue";
import Home from "../views/Home.vue";
import Login from "../views/Login.vue";
import Product from "../views/Product.vue";
import Cart from "../views/Cart.vue";
import About from "../views/About.vue";
import Contact from "../views/Contact.vue";
// import admin accessed routes
import Dashboard from "../views/Admin/Dashboard.vue";
import Admin from "../layouts/Admin.vue";
import Products from "../views/Admin/Products.vue";

const routes = [
    //  define public user routes
    {
        path: "/user",
        redirect: "/login",
        component: User,
        children: [
            {
                path: "/",
                component: Home
            },
            {
                path: "/login",
                component: Login
            },
            {
                path: "/product",
                component: Product
            },
            {
                path: "/cart",
                component: Cart
            },
            {
                path: "/about",
                component: About
            },
            {
                path: "/contact",
                component: Contact
            },],},
    // define admin restricted routes
    {
        path: "/admin",
        redirect: "/admin/dashboard",
        component: Admin,
        children: [
            {
                path: "/admin/dashboard",
                component: Dashboard,
            },
            {
                path: "/admin/products",
                component: Products,
            },
            // {
            //   path: "/admin/tables",
            //   component: Tables,
            // },
            // {
            //   path: "/admin/maps",
            //   component: Maps,
            // },
        ],
    },


];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;