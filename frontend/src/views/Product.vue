<template>
  <div>
    <section class="flex justify-center items-center m-auto">
      <div
        class="grid-cols-3 p-4 w-full md:w-11/12 flex-col md:flex md:flex-row justify-center items-center"
      >
        <div
          class="w-full h-fit md:w-1/3 md:h-[375px] items-center justify-center flex"
        >
          <img
            :src="'/assets/products/' + currentProduct.image"
            alt="product"
            class="h-15 w-15 bg-white object-center rounded-lg"
          />
        </div>
        <div
          class="col-end-1 w-full h-fit md:w-2/3 md:h-[375px] p-5 md:p-10 md:shadow-inner"
        >
          <h4 class="text-center mb-10 md:mb-20 font-bold uppercase">
            {{ currentProduct.name }}
          </h4>
          <p class="text-justify text-sm mb-2">Description :</p>
          <p class="md:text-justify text-sm flex-1">
            {{ currentProduct.description }}
          </p>
        </div>
        <div
          class="w-full h-full md:w-1/4 md:h-[375px] grid-cols-2 md:grid-rows-3"
        >
          <div
            class="block bg-secondary h-1/3 flex flex-col items-center justify-center"
          >
            <h5 class="text-center mb-2">A partie de</h5>
            <span class="block text-center font-bold"
              >{{ fixPrice(currentProduct.prix_vente * quantity) }} MAD</span
            >
          </div>
          <form>
            <div
              class="block h-1/3 p-6 flex flex-row items-center justify-center"
            >
              <input
                type="number"
                id="quantity"
                class="bg-white w-[50px] border border-gray-100 shadow-inner text-sm block w-full p-2.5"
                v-model="quantity"
                min="1"
                required
              />
              <label for="quantity" class="ml-5 block text-sm flex-1 w-full"
                >Ajouter la quantité desirer</label
              >
            </div>
            <div class="block flex justify-center items-center relative">
              <input
                type="submit"
                @click.prevent="addToCart"
                class="text-white h-[4rem] bg-primary cursor-pointer focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm w-full px-5 py-2.5 text-center"
                value="Add to Cart"
              />
              <img
                src="/assets/images/bi_cart-check-fill.svg"
                alt=""
                class="absolute w-15 h-15 left-5 bottom-30"
              />
            </div>
          </form>
        </div>
      </div>
    </section>
    <div class="flex flex-col mb-3">
      <h2 class="ml-10 text-base md:text-2xl font-semibold">
        Similar Products
      </h2>
      <span class="bg-gray-700 ml-10 mr-10 md:w-[90%] w-[80%] h-[1px]"></span>
    </div>
    <section
      class="flex flex-wrap grid-cols-1 sm:grid-cols-2 gap-8 md:grid-cols-4 md:gap-8 p-5 justify-center"
    >
      <ProductCard
        v-for="item in this.similarProducts"
        :key="item"
        :item="item"
      />
    </section>
  </div>
</template>

<script>
//

import ProductCard from "../components/cards/ProductCard.vue";
import swal from "sweetalert";
export default {
  name: "Product",
  components: {
    ProductCard,
  },
  data() {
    return {
      limitCard: 4,
      quantity: 1,
      similarProds: [],
    };
  },
  computed: {
    currentProduct() {
      return this.$store.state.currentProduct;
    },
    similarProducts() {
      return this.$store.state.similarProducts;
    },
  },
  mounted() {
    this.fetchSimilarProducts(this.currentProduct.categorie);
  },
  methods: {
    fixPrice(x) {
      return parseFloat(x).toFixed(2);
    },
    addToCart() {
      let product = this.currentProduct;
      let quantity = this.quantity;
      let cart = this.$store.state.cartItems;
      let productInCart = cart.find((item) => item.id === product.id);
      if (productInCart) {
        productInCart.quantity += quantity;
        swal({
          title: "Product added to cart",
          text: "check your cart!",
          icon: "success",
        });
      } else {
        cart.push({
          id: product.id,
          name: product.name,
          marque: product.marque,
          image: product.image,
          price: product.prix_vente,
          quantity: quantity,
        });
        swal({
          title: "Product added to cart",
          text: "check your cart!",
          icon: "success",
        });
      }
      this.$store.commit("setCart", cart);
      // this.$store.commit('setCartItems', this.$store.state.cartItems.reduce((acc, item) => acc + item.quantity, 0));
      // this.$store.commit('setCartTotal', this.$store.state.cartItems.reduce((acc, item) => acc + item.quantity * item.price, 0));
      // this.$store.commit('setCartTotalItems', this.$store.state.cartItems.reduce((acc, item) => acc + item.quantity, 0));
      // this.$store.commit('setCartTotalPrice', this.$store.state.cartItems.reduce((acc, item) => acc + item.quantity * item.price, 0));
      // this.$store.commit('setCartTotalPriceItems', this.$store.state.cartItems.reduce((acc, item) => acc + item.quantity * item.price, 0));
    },
    fetchSimilarProducts(category) {
      return this.$store.dispatch("fetchSimilarProducts", category);
    },
  },
};
</script>

<style scoped></style>
