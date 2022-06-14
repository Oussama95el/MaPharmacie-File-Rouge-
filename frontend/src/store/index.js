import { createStore } from "vuex";
import axios from "axios";

export default createStore({
  state: {
    products: [],
    categories: [],
    currentCategory: [],
    currentPage: 1,
    similarProducts: JSON.parse(localStorage.getItem("similarProducts")) || [],
    currentProduct: JSON.parse(localStorage.getItem("CP")),
    cartItems: JSON.parse(localStorage.getItem("cartItems")) || [],
    cartTotal: JSON.parse(localStorage.getItem("cartTotal")) || 0,
  },
  mutations: {
    getProducts(state, products) {
      state.products = products;
    },
    getCategories(state, categories) {
      state.categories = categories;
    },
    getCurrentCategory(state, category) {
      state.currentCategory = category;
    },
    setCurrentProduct(state, product) {
      state.currentProduct = product;
      localStorage.setItem("CP", JSON.stringify(state.currentProduct));
    },
    setSimilarProducts(state, products) {
      state.similarProducts = products;
      console.log(products);
      localStorage.setItem(
        "similarProducts",
        JSON.stringify(state.similarProducts)
      );
    },
    setCart(state, cartItems) {
      state.cartItems = cartItems;
      localStorage.setItem("cartItems", JSON.stringify(state.cartItems));
    },
    removeCartItem(state, id) {
      state.cartItems = state.cartItems.filter((item) => item.id != id);
      console.log(state.cartItems);
      localStorage.setItem("removeCartItem", JSON.stringify(state.cartItems));
    },
    clearCart(state) {
      state.cartItems = [];
      localStorage.setItem("cartItems", JSON.stringify(state.cartItems));
    },
    setTotal(state, total) {
      state.cartTotal = total;
    },
    changePage(state, page) {
      state.currentPage = page;
    },
  },
  actions: {
    async fetchProducts({ commit }, category, page) {
      console.log(category);
      let endpoint = `http://localhost/MaPharmacie/backend/public/products?`;
      if (category) {
        endpoint += `category=${category}`;
      }
      if (page) {
        endpoint += `&page=${page}`;
      }
      axios.get(endpoint).then((res) => {
        commit("getProducts", res.data);
        commit("changePage", page);
      });
    },
    async fetchCategories({ commit }) {
      const endpoint = "http://localhost/MaPharmacie/backend/public/categories";
      axios.get(endpoint).then((res) => {
        if (res.status !== 200) {
          this.message = "Api connection failed";
        } else {
          commit("getCategories", res.data);
        }
      });
    },
    async fetchTotalPages({ commit }) {
      const endpoint =
        "http://localhost/MaPharmacie/backend/public/products/totalPages";
      return axios.get(endpoint).then((res) => {
        if (res.status !== 200) {
          this.message = "Api connection failed";
          return false;
        } else {
          return res.data;
        }
      });
    },
    fetchSimilarProducts: async function ({ commit }, category) {
      const endpoint = `http://localhost/MaPharmacie/backend/public/products/similarProd/${category}`;
      axios.get(endpoint).then((res) => {
        commit("setSimilarProducts", res.data);
      });
    },
  },
});
