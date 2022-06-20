<template>
  <div>
    <div class="h-full bg-secondary my-10">
      <div class="">
        <div class="max-w-full mx-auto bg-secondary rounded-lg md:max-w-full">
          <div class="md:flex">
            <div class="w-full p-4 px-5 py-5">
              <div class="md:grid md:grid-cols-3 gap-2">
                <div class="col-span-2 p-5">
                  <div class="flex md:justify-between items-center">
                    <h1 class="text-xl font-medium">Shopping Cart</h1>
                    <button
                      @click="clearCart"
                      class="bg-primary hover:bg-primary text-white font-bold py-2 px-4 rounded-lg"
                    >
                      Clear Cart
                    </button>
                  </div>
                  <!--                  item example-->
                  <h3 class="font-semibold text-red-700 text-base">
                    {{ this.message }}
                  </h3>
                  <div
                    class="flex gap-12 flex-wrap md:justify-between items-center mt-6 pt-6"
                    v-for="item in this.cartItems"
                  >
                    <div class="flex items-center">
                      <span
                        class="w-30 h-full flex justify-center items-center"
                      >
                        <img
                          :src="'/assets/products/' + item.image"
                          alt="Product image medicine"
                          class="h-14 w-15 bg-white object-contain rounded-full border"
                        />
                      </span>

                      <div class="flex flex-col ml-3">
                        <span class="md:text-md font-medium">{{
                          item.name
                        }}</span>
                        <span class="text-xs font-light text-gray-400"
                          >#{{ item.marque }}</span
                        >
                      </div>
                    </div>

                    <div class="flex justify-center items-center">
                      <div class="mr-8 flex">
                        <span
                          role="button"
                          @click="decrement(item)"
                          class="font-semibold flex items-center justify-center"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="15"
                            height="15"
                            viewBox="0 0 448 512"
                          >
                            <path
                              d="M400 288h-352c-17.69 0-32-14.32-32-32.01s14.31-31.99 32-31.99h352c17.69 0 32 14.3 32 31.99S417.7 288 400 288z"
                            />
                          </svg>
                        </span>
                        <input
                          class="focus:outline-none bg-gray-100 border h-6 w-10 rounded text-sm px-2 mx-2"
                          type="tel"
                          :value="item.quantity"
                          name="cart[3791842][qty]"
                          size="1"
                          min="1"
                          max="1000"
                          data-msg-max=""
                        />
                        <span
                          role="button"
                          @click="increment(item)"
                          class="font-semibold flex justify-center items-center"
                        >
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="15"
                            height="15"
                            viewBox="0 0 448 512"
                          >
                            <path
                              d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"
                            />
                          </svg>
                        </span>
                      </div>

                      <div class="pr-8">
                        <span class="text-xs font-medium">{{
                          fixPrice(item.price * item.quantity)
                        }}</span>
                      </div>
                      <div class="cursor-pointer" @click="removeItem(item.id)">
                        <svg
                          width="20"
                          height="20"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 448 512"
                        >
                          <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                          <path
                            d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"
                          />
                        </svg>
                      </div>
                    </div>
                  </div>

                  <div
                    class="flex justify-between items-center mt-6 pt-6 border-t"
                  >
                    <div class="flex items-center">
                      <router-link to="/store">
                        <span class="text-md font-medium text-blue-500"
                          >Continue Shopping</span
                        >
                      </router-link>
                    </div>

                    <div class="flex justify-center items-center">
                      <span class="text-sm font-medium text-gray-400 mr-2"
                        >Subtotal:</span
                      >
                      <span class="text-lg font-bold text-gray-800">
                        {{ this.subtotal }} MAD</span
                      >
                    </div>
                  </div>
                </div>
                <!--                 card details for checkout-->
                <div
                  class="p-5 bg-gray-800 rounded overflow-visible flex flex-col items-center justify-center"
                >
                  <span class="text-xl font-medium text-gray-100 block pb-3"
                    >Payment Details</span
                  >
                  <span class="text-xs text-gray-400"
                    >Complete your informations to checkout</span
                  >
                  <form class="w-full">
                    <div class="flex justify-center flex-col pt-3">
                      <label class="text-xs text-gray-400">Adress 1</label>
                      <input
                        type="text"
                        class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"
                        placeholder="15 Rue de la République, Example"
                        required
                      />
                    </div>
                    <div class="flex justify-center flex-col pt-3">
                      <label class="text-xs text-gray-400">Adress 2</label>
                      <input
                        type="text"
                        class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"
                        placeholder="35 Rue de la République, Example"
                        required
                      />
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                      <div class="flex justify-center flex-col pt-3">
                        <label class="text-xs text-gray-400">Zip Code</label>
                        <input
                          type="text"
                          class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"
                          placeholder="00000"
                          required
                        />
                      </div>
                      <div class="flex justify-center flex-col pt-3">
                        <label class="text-xs text-gray-400">City</label>
                        <input
                          type="text"
                          class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"
                          placeholder="City"
                          required
                        />
                      </div>
                    </div>
                    <div class="flex justify-center flex-col pt-3">
                      <input
                        type="submit"
                        class="cursor-pointer focus:outline-none w-full h-8 p-2 bg-primary flex justify-center items-center text-white text-center placeholder-gray-300 text-sm border-b border-blue-500"
                        value="Confirm"
                      />
                    </div>
                    <!--                  <div class="flex justify-center flex-col pt-3">-->
                    <!--                    <label class="text-xs text-gray-400">Card Number</label>-->
                    <!--                    <input-->
                    <!--                      type="text"-->
                    <!--                      class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"-->
                    <!--                      placeholder="****     ****      ****      ****"-->
                    <!--                    />-->
                    <!--                  </div>-->

                    <!--                  <div class="grid grid-cols-3 gap-2 pt-2 mb-3">-->
                    <!--                    <div class="col-span-2">-->
                    <!--                      <label class="text-xs text-gray-400"-->
                    <!--                        >Expiration Date</label-->
                    <!--                      >-->
                    <!--                      <div class="grid grid-cols-2 gap-2">-->
                    <!--                        <input-->
                    <!--                          type="text"-->
                    <!--                          class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"-->
                    <!--                          placeholder="mm"-->
                    <!--                        />-->
                    <!--                        <input-->
                    <!--                          type="text"-->
                    <!--                          class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"-->
                    <!--                          placeholder="yyyy"-->
                    <!--                        />-->
                    <!--                      </div>-->
                    <!--                    </div>-->

                    <!--                    <div class="">-->
                    <!--                      <label class="text-xs text-gray-400">CVV</label>-->
                    <!--                      <input-->
                    <!--                        type="text"-->
                    <!--                        class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4"-->
                    <!--                        placeholder="XXX"-->
                    <!--                      />-->
                    <!--                    </div>-->
                    <!--                  </div>-->
                    <!--                  <button-->
                    <!--                    class="h-12 w-full bg-blue-500 rounded focus:outline-none text-white hover:bg-blue-600"-->
                    <!--                  >-->
                    <!--                    Check Out-->
                    <!--                  </button>-->
                    <div class="flex justify-center flex-col pt-3">
                      <h3 class="text-white text-center">
                        Choose payment method
                      </h3>
                      <Paypal class="flex items-center justify-center" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Paypal from "../components/buttons/Paypal.vue";
export default {
  name: "Cart",
  components: {
    Paypal,
  },
  data() {
    return {
      message: "",
      cart: undefined,
    };
  },
  computed: {
    cartItems() {
      this.cart = this.$store.state.cartItems.length;
      return this.$store.state.cartItems;
    },
    subtotal() {
      this.$store.commit(
        "setTotal",
        this.$store.state.cartItems.reduce(
          (acc, item) => acc + item.quantity * item.price,
          0
        )
      );
      return this.$store.state.cartTotal.toFixed(2);
    },
  },
  mounted() {
    if (this.cart == 0) {
      this.message = "Your cart is empty";
    }
  },
  methods: {
    decrement(item) {
      if (item.quantity > 1) {
        item.quantity--;
      }
    },
    increment(item) {
      item.quantity++;
    },
    fixPrice(x) {
      return parseFloat(x).toFixed(2);
    },
    removeItem(id) {
      this.$store.commit("removeCartItem", id);
    },
    clearCart() {
      this.$store.commit("clearCart");
    },
    checkout() {
      this.$store.commit("checkout");
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
  @include maxLines();
}

.cs-cart-item {
  position: relative;
  width: 100%;
  padding-bottom: 0;
  display: flex;
  flex-wrap: wrap;
}

.cs-cart-item__image {
  width: 10rem;
  flex-shrink: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.product-image-container {
  display: inline-block;
  max-width: 100%;
  width: 120px;
}

.product-image-wrapper {
  display: block;
  height: 0;
  overflow: hidden;
  position: relative;
  z-index: 1;
  padding-bottom: 100% !important;
}

.product-image-photo {
  bottom: 0;
  display: block;
  height: auto;
  left: 0;
  margin: auto;
  max-width: 100%;
  position: absolute;
  right: 0;
  top: 0;
}

.cs-cart-item__details {
  padding: 0 1rem 1rem 2rem;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  align-content: center;
}

.cs-cart-item__name {
  width: 100%;
  font-weight: 700;
  color: #2e4c72;
  margin: 0 0 1.2rem;
}

.cs-cart-item__qty-input {
  margin: 0;
  width: 12rem;
}

.cs-qty-increment {
  position: relative;
  display: flex;
  flex-wrap: wrap;
}

.cs-qty-increment__button--decrement {
  order: 1;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.cs-qty-increment__button--increment {
  order: 2;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.cs-qty-increment__input {
  line-height: 1.275em;
  color: #333;
  background: #fff;
  border-radius: 4px;
  border: 1px solid #dedede;
  box-shadow: none;
  transition: border-color 0.5s;
  width: 100%;
  background-clip: padding-box;
  font-family: inherit;
  font-size: inherit;
  text-align: center;
  margin: 0;
  padding: 1.2rem 0.5em;
  border-radius: 0;
  width: 0;
  min-width: 2ch;
  flex: 1 1;
  order: 2;
}

@media (max-width: 480px) {
}
</style>
