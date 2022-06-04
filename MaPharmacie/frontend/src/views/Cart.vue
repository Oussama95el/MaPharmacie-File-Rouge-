<template>
    <div>

      <h2 class="ml-10 text-2xl font-semibold ">Shopping cart</h2>
        <hr>
      <section class="grid-cols-2 p-10 flex-wrap">
        <p class="md:hidden">
          You have no product(s) in your shopping cart yet.
        </p>
        <div class="md:w-full md:min-h-[25rem]  md:flex">
          <table class="m-0 md:w-full">
          <tbody class="border-0 w-full h-[5rem]">
              <tr class="cs-cart-item w-fit h-fit border-b-2">
                <td class="flex text-center items-center justify-center">
<!--   table 1st child   -->
                  <div class="flex">
                    <router-link to="#" class="cs-cart-item__image">
                        <span class="product-image-container">
                          <span class="product-image-wrapper">
                              <img src="/assets/images/santis-lab-aromasanti.png"
                                   alt=""
                                   class="product-image-photo">
                          </span>
                        </span>
                    </router-link>
                    <div class="cs-cart-item__details product-item-details text-center">
                      <strong class="cs-cart-item__name text-center pt-4 text-base font-medium md:font-bold">
                        <router-link to="#">
                          Santis Lab
                        </router-link>
                      </strong>
                    </div>
                  </div>
                </td>
                <!--   table 2ed child   -->
                <td class="flex justify-center items-center">
                  <div class="cs-cart-item__qty-input">
                      <div class="cs-qty-increment items-center justify-center py-10">
                        <input type="tel" :value="this.qty" name="cart[3791842][qty]" size="1" class="cs-qty-increment__input " min="1" data-validate="{required:true,'validate-greater-than-zero':true}" id="cart-3791842-qty" data-cart-item-id="3478641-0" data-role="cart-item-qty" max="1000" data-msg-max="">
                        <span role="button"
                              @click="decrement"
                              tabindex="0"
                              class="cs-qty-increment__button cs-qty-increment__button--decrement"
                              aria-pressed="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512">
                            <path d="M400 288h-352c-17.69 0-32-14.32-32-32.01s14.31-31.99 32-31.99h352c17.69 0 32 14.3 32 31.99S417.7 288 400 288z"/>
                          </svg>
                        </span>
                        <span role="button"
                              @click="increment"
                              tabindex="0"
                              class="cs-qty-increment__button cs-qty-increment__button--increment"
                              aria-pressed="false">
                          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512">
                            <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"/>
                          </svg>
                        </span>
                      </div>
                  </div>
                  </td>
                <!--                    table 3th child-->
                  <td class="w-fit h-fit">
                    <div class="text-center p-5 flex flex-col gap-6">
                      <span>
                        <s>134.34 DHs</s>
                      </span>
                      <span>
                        <strong class="text-red-700">
                          99.99 DHs
                        </strong>
                      </span>
                    </div>
                  </td>
<!--                table 4th child-->
                <td class=" max-w-[9rem] md:w-[9rem] flex items-center justify-center">
                  <div class="w-fit">
                    <button>
                    <span class="flex justify-center items-center m-0">
                      <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/></svg>
                    </span>
                    </button>
                  </div>
                </td>
              </tr>
          </tbody>
          </table>
          <div class="bg-secondary rounded w-full h-fit mt-5 md:mt-0 p-5 md:p-10 md:w-2/4 md:h-fit ml-2">
              <div class="grid-flow-row-dense flex flex-col">
                <strong class="mb-6">Summary</strong>
                <div class="inline-block w-full flex justify-between mb-3">
                <span class="col-span-2 text-sm">
                  subtotal
                </span>
                  <span class="col-span-2 text-sm">
                  99.99 DHs
                </span>
                </div>
                <hr>
                <div class="inline-block w-full flex justify-between my-3">
                <span class="col-span-2 text-sm">
                 <strong> subtotal </strong>
                </span>
                  <span class="col-span-2 text-sm">
                 <strong> 99.99 DHs </strong>
                </span>
                </div>
                <div class="w-full p-2">
                  <input type="submit"
                         value="Order Now"
                         class="text-white
                         h-[4rem] bg-primary
                         focus:ring-4 hover:cursor-pointer
                         focus:outline-none focus:ring-blue-300
                         font-medium  text-sm text-center
                         w-full  px-5 py-2.5
                         hover:bg-opacity-90">
                </div>
              </div>
          </div>
         </div>
      </section>

    </div>
</template>

<script>
export default {
  name: "Cart",
  data() {
    return {
      qty: 1,
    }
  },
  methods: {
    decrement() {
      if (this.qty > 1){
        this.qty--;
      }

    },
    increment() {
      this.qty++
    }
  }
}
</script>

<style lang="scss" scoped>
  .cs-cart-item{
    position: relative;
    width: 100%;
    padding-bottom: 0;
    display: flex;
    flex-wrap: wrap;
  }
  .cs-cart-item__image{
    width: 10rem;
    flex-shrink: 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .product-image-container{
    display: inline-block;
    max-width: 100%;
    width: 120px;
  }
  .product-image-wrapper{
    display: block;
    height: 0;
    overflow: hidden;
    position: relative;
    z-index: 1;
    padding-bottom: 100%!important;
  }
  .product-image-photo{
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
    transition: border-color .5s;
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
  .cs-qty-increment__button {
    transition: background-color .5s,border-color .5s,fill .5s;
    will-change: transform,background-color,border-color,fill;
    flex: 0 0 auto;
    position: relative;
    padding-left: 1.6rem;
    padding-right: 1.6rem;
    border-radius: 0.4rem;
  }
  .cs-qty-increment__icon cs-qty-increment__icon--decrement{
    fill: #2e4c72;
    color: #2e4c72;
  }
  .cs-qty-increment__icon cs-qty-increment__icon--increment{
    fill: #2e4c72;
    color: #2e4c72;
  }
  @media (max-width: 480px) {
    
  }
</style>