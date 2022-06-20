import { createRouter, createWebHistory } from "vue-router";
// import public accessed routes
import User from "../layouts/User.vue";
import Home from "../views/Home.vue";
import Login from "../views/Login.vue";
import Product from "../views/Product.vue";
import Cart from "../views/Cart.vue";
import About from "../views/About.vue";
import Contact from "../views/Contact.vue";
import Store from "../views/Store.vue";
// import admin accessed routes
import Dashboard from "../views/Admin/Dashboard.vue";
import Admin from "../layouts/Admin.vue";
import Products from "../views/Admin/Products.vue";
import category from "../views/Admin/Category.vue";
import DeliveryStaff from "../views/Admin/DeliveryStaff.vue";
import ValidOrders from "../views/Admin/ValidOrders.vue";
import InvalidOrders from "../views/Admin/InvalidOrders.vue";
// import livreur accessed routes
import Livreur from "../layouts/Livreur.vue";
import LivreurDashboard from "../views/Livreur/LivreurDashboard.vue";
import Delivery from "../views/Livreur/Delivery.vue";
import Orders from "../views/Livreur/Orders.vue";

const routes = [
  //  define public user routes
  {
    path: "/user",
    redirect: "/login",
    component: User,
    children: [
      {
        path: "/",
        component: Home,
      },
      {
        path: "/login",
        component: Login,
      },
      {
        path: "/product",
        component: Product,
      },
      {
        path: "/cart",
        component: Cart,
      },
      {
        path: "/about",
        component: About,
      },
      {
        path: "/contact",
        component: Contact,
      },
      {
        path: "/store",
        component: Store,
      },
    ],
  },
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
      {
        path: "/admin/category",
        component: category,
      },
      {
        path: "/admin/deliveryStaff",
        component: DeliveryStaff,
      },
      {
        path: "/admin/validOrders",
        component: ValidOrders,
      },
      {
        path: "/admin/invalidOrders",
        component: InvalidOrders,
      },
    ],
  },
  {
    path: "/livreur",
    component: Livreur,
    redirect: "/livreur/Dashboard",
    children: [
      {
        path: "/livreur/Orders",
        component: Orders,
      },
      {
        path: "/livreur/Dashboard",
        component: LivreurDashboard,
      },
      {
        path: "/livreur/Delivery",
        component: Delivery,
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
