<template>
  <div class="flex justify-center items-center">
    <div
      class="max-w-[250px] w-[250px] p-4 h-full max-h-[28rem] h-[26rem] flex flex-col justify-evenly items-center bg-white shadow-md dark:bg-gray-800 dark:border-gray-700"
    >
      <!--           data-aos="fade-up"-->
      <!--           data-aos-offset="200"-->
      <!--           data-aos-delay="50"-->
      <!--           data-aos-duration="500"-->
      <!--           data-aos-easing="ease-in-out"-->
      <!--           data-aos-mirror="true"-->
      <!--           data-aos-once="false"-->
      <!--           data-aos-anchor-placement="top-center">-->

      <div
        class="rounded-lg cursor-pointer p-5 w-full h-full flex items-center justify-center bg-transparent"
        @click="getCurrentProduct(item)"
      >
        <img
          class="h-[8rem] w-[6rem] bg-transparent object-contain rounded-full"
          :src="'/assets/products/' + item.image"
          alt="product image"
        />
      </div>
      <div class="px-2 flex justify-evenly flex-col gap-1 w-full">
        <a href="#" class="text-center">
          <h5 class="text-base font-semibold tracking-tight text-gray-900">
            {{ item.marque }}
          </h5>
        </a>
        <p class="text-xs text-[706F6F] text-center">
          {{ item.name }}
        </p>
        <div class="mt-6">
          <!--          Description-->
          <h5
            class="text-base font-semibold tracking-tight text-gray-900 dark:text-white"
          >
            Description :
          </h5>
          <p class="text-xs text-[706F6F] maxLines">
            {{ item.description }}
          </p>
        </div>
        <div class="flex justify-between items-center my-3">
          <span class="text-base block font-bold text-gray-900 dark:text-white"
            >{{ item.prix_vente }} <strong>MAD</strong></span
          >
          <button
            @click.prevent="addToCart(item)"
            class="text-white bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-sm p-2 flex items-center justify-center hover:bg-opacity-90"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 576 512"
              class="w-5 h-5 fill-white"
            >
              <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
              <path
                d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM272 180H316V224C316 235 324.1 244 336 244C347 244 356 235 356 224V180H400C411 180 420 171 420 160C420 148.1 411 140 400 140H356V96C356 84.95 347 76 336 76C324.1 76 316 84.95 316 96V140H272C260.1 140 252 148.1 252 160C252 171 260.1 180 272 180zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"
              />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed } from "vue";
import swal from "sweetalert";

export default {
  name: "ProductCard",
  props: {
    item: Object,
  },
  data() {
    return {};
  },
  mounted() {},
  computed: {},
  methods: {
    getCurrentProduct(product) {
      this.$router.push("/product");
      return this.$store.commit("setCurrentProduct", product);
    },
    addToCart(item) {
      let product = item;
      let quantity = 1;
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
  },
};
</script>

<style lang="scss" scoped>
@mixin maxLines($max: 2) {
  display: -webkit-box;
  display: -moz-box;
  -moz-box-orient: vertical;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: $max;
  overflow: hidden;
}
.maxLines {
  @include maxLines(3);
}
</style>
