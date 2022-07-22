import { createStore } from "vuex";
import router from "../router";
import axios from "axios";
import swal from "sweetalert";

export default createStore({
  state: {
    // setting state
    delivery: [],
    livreurs:[],
    products: [],
    categories: [],
    validOrders: [],
    invalidOrders:[],
    // handling login state
    user: {
      client: JSON.parse(localStorage.getItem("client")) || null,
      livreur: JSON.parse(localStorage.getItem("livreur")) || null,
      admin: JSON.parse(localStorage.getItem("admin")) || null,
    },
    clientInfo: {},
    currentCategory: undefined,
    currentDetail: undefined,
    currentOrder:undefined,
    currentLivreur:undefined,
    currentPage: 1,
    loggedIn: true,
    showModal: false,
    detailCard: 'hidden',
    orderId: null,
    // Cart State handeled in localStorage
    similarProducts: JSON.parse(localStorage.getItem("similarProducts")) || [],
    currentProduct: JSON.parse(localStorage.getItem("CP")),
    cartItems: JSON.parse(localStorage.getItem("cartItems")) || [],
    cartTotal: JSON.parse(localStorage.getItem("cartTotal")) || 0,
  },
  // handle mutations in store (mutations are like events)
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
      localStorage.setItem(
        "similarProducts",
        JSON.stringify(state.similarProducts)
      );
    },
    setOrderId(state, orderId) {
      state.orderId = orderId;
    },
    logout(state) {
      this.state.loggedIn = !this.state.loggedIn;
    },
    setClientInfo(state, client) {
        state.clientInfo = client;
    },
    setClient(state, client) {
      state.user.client = client
      localStorage.setItem("client", JSON.stringify(client)
      );
    },
    setLivreur(state, livreur) {
      state.user.livreur = livreur;
          localStorage.setItem(
        "livreur",
        JSON.stringify(livreur)
      );
    },
    setLivreurs(state,Livreurs){
      state.livreurs = Livreurs
    },
    clearUser(state) {
      state.user.client = state.user.livreur = null
      localStorage.clear();
    },
    setCart(state, cartItems) {
      state.cartItems = cartItems;
      localStorage.setItem("cartItems", JSON.stringify(state.cartItems));
    },
    removeCartItem(state, id) {
      state.cartItems = state.cartItems.filter((item) => item.id != id);
      localStorage.setItem("removeCartItem", JSON.stringify(state.cartItems));
    },
    clearCart(state) {
      state.cartItems = [];
      localStorage.setItem("cartItems", JSON.stringify(state.cartItems));
    },
    setTotal(state, total) {
      state.cartTotal = total;
    },
    toggleModal(state) {
      state.showModal = !state.showModal;
    },
    changePage(state, page) {
      state.currentPage = page;
    },
    setDelivery(state, delivery) {
      state.delivery = delivery;
    },
    addLivreur(state, livreur) {
      state.livreurs.push(livreur);
      state.livreurs.sort((a, b) => a.id - b.id);
    },
    deleteLivreur(state, id) {
      console.log(id);
      state.livreurs = state.livreurs.filter((item) => item.id != id);
    },
    setValidOrders(state,orders){
      state.validOrders = orders
    },
    setInvalidOrders(state, orders){
      state.invalidOrders = orders
      state.invalidOrders = state.invalidOrders.filter((item) => item.status !== "Valid")
    },
    setCurrentOrder(state,order){
      state.currentOrder = order
    },
    setCurrentDetail(state,detail){
      state.currentDetail = detail
    },
    displayDetailCard(state){
      state.detailCard = 'block'
    },
    closeDetailCard(state){
      state.detailCard = 'hidden'
    },
    setCurrentLivreur(state,id){
      state.currentLivreur = id
    }
  },
  // handle actions in store (actions are like events)
  actions: {
    async register({ commit }, user) {
      axios
        .post(
          "http://localhost/MaPharmacie/backend/public/client/register",
          user
        )
        .then((res) => {
          swal("Success", "You are registered", "success");
        });
    },
    async loginClient({ commit }, user) {
      const endpoint =
        "http://localhost/MaPharmacie/backend/public/client/login";
      axios.post(endpoint, user).then((res) => {
        if (res.data == 'error') {
          swal("Oops", "Login Failed", "error");
        } else {
          commit("setClient", res.data);
          router.push("/store");
        }
      });
    },
    async loginAdmin({ commit }, user) {
      const endpoint =
        "http://localhost/MaPharmacie/backend/public/admin/login";
      axios.post(endpoint, user).then((res) => {
        if (res.data == 'error') {
          swal("Oops", "Login Failed", "error");
        } else {
          router.push("/admin");
        }
      });
    },
    async loginLivreur({ commit }, user) {
      const endpoint =
        "http://localhost/MaPharmacie/backend/public/livreur/login";
      axios.post(endpoint, user).then((res) => {
        console.log(res.data);
        if (res.data == 'error') {
          swal("Oops", "Login Failed", "error");
        } else {
          router.push("/livreur");
        }
      });
    },
    async fetchProducts({ commit}, payload) {
      const { category, page } = payload ?? {};
      let endpoint = `http://localhost/MaPharmacie/backend/public/products?`;
      if (category) {
        endpoint += `category=${category}`;
      }
      if (page) {
        endpoint += `&page=${page}`;
      }
      axios.get(endpoint).then((res) => {
        commit("getProducts", res.data);
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
    fetchLivreur: async function ({ commit }) {
      const endpoint =
        "http://localhost/MaPharmacie/backend/public/livreur/getAllLivreur";
      axios.get(endpoint).then((res) => {
        commit("setLivreurs", res.data);
      });
    },
    addStaff: async function ({ commit }, payload) {
      const endpoint =
        "http://localhost/MaPharmacie/backend/public/livreur/addLivreur";
      axios.post(endpoint, payload).then((res) => {
        if (res.status !== 200) {
          this.message = "Api connection failed";
        } else {
          commit("addLivreur", payload);
        }
      });
    },
    updateLivreur: async function ({ commit }, payload) {
      const endpoint =
        "http://localhost/MaPharmacie/backend/public/livreur/updateLivreur";
      axios.post(endpoint, payload).then((res) => {
        if (res.status !== 200) {
          this.message = "Api connection failed";
        } else {
          commit("deleteLivreur", payload);
        }
      });
    },
    getClientInfo: async function ({ commit }, id) {
      if (id) {
        const endpoint = `http://localhost/MaPharmacie/backend/public/client/getClientInfo`;
        axios.post(endpoint, id).then((res) => {
            commit("setClientInfo", res.data);
        });}
    },
    checkout: async function ({ commit }, payload) {
      const endpoint =
        "http://localhost/MaPharmacie/backend/public/client/updateInfo";
      axios.post(endpoint, payload).then((res) => {
        if (res.status !== 200) {
          this.message = "Api connection failed";
        } else {
          axios.post("http://localhost/MaPharmacie/backend/public/order/add", payload).then((res) => {
            if (res.status !== 200) {
              this.message = "Api connection failed";
            } else {
              this.state.cartItems.forEach((item) => {
                axios.post("http://localhost/MaPharmacie/backend/public/datail/add", {
                  order_id: JSON.parse(res.data).id,
                  product_id: item.id,
                  quantity: item.quantity,
                }).then((res) => {
                  if (res.status !== 200) {
                    this.message = "Api connection failed";
                  }
                });
              });
            }
          });
        }
      });
    },
    getValidOrders: async function ({commit}){
      const endpoint = "http://localhost/MaPharmacie/backend/public/orders/valid"
      axios.post(endpoint,{status:'Valid'}).then((res)=>{
          commit('setValidOrders',res.data);
      });
    },
    getInvalidOrders: async function ({commit}){
      const endpoint = "http://localhost/MaPharmacie/backend/public/orders/invalid"
      axios.post(endpoint,{status:'Valid'}).then((res)=>{
        commit('setInvalidOrders',res.data);
      });
    },
    setOrderLivreur: async function ({commit},payload){
      const endpoint = "http://localhost/MaPharmacie/backend/public/order/update"
      axios.post(endpoint,payload).then((res)=>{
        if (res.data){
          swal("Success", "Delivery staff is set", "success");
        } else {
          swal("Oops", "something is wrong", "error");
        }
      })
    },
    fetchOrderDetail: async function ({commit},payload){
      const endpoint = "http://localhost/MaPharmacie/backend/public/details"
      axios.post(endpoint,payload).then((res)=>{
        if (res.data){
          commit('setCurrentDetail',res.data);
        } else {
          swal("Oops", "something is wrong", "error");
        }
      })
    },
    updateOrderStatus: async function ({commit},payload){
      const endpoint = "http://localhost/MaPharmacie/backend/public/order/status"
      axios.post(endpoint,payload).then((res)=>{
        if (res.data){
          swal("Great", "Status updated", "success");
        } else {
          swal("Oops", "something is wrong", "error");
        }
      })
    },
    getCurrentLivreur: async function ({commit},payload){
      const endpoint = "http://localhost/MaPharmacie/backend/public/livreur/currentLivreur"
      axios.post(endpoint,payload).then((res)=>{
        if (res.data){
          commit('setCurrentLivreur',res.data);
        } else {
          swal("Oops", "something is wrong", "error");
        }
      });
    }
  },
});
