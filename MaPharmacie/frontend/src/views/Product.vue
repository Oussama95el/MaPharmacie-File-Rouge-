<template>
  <div>
    <section class="flex justify-center items-center m-auto">
      <div class="grid-cols-3 p-4 w-full md:w-11/12 flex-col md:flex md:flex-row justify-center items-center">
        <div class="w-full h-fit md:w-1/3 md:h-[375px]">
          <img src="/assets/images/santis-lab-aromasanti.png"
               alt="product"
               class="w-full h-fit">
        </div>
        <div class="col-end-1 w-full h-fit md:w-2/3 md:h-[375px] p-5 md:p-10 md:shadow-inner ">
          <h4 class="text-center mb-10 md:mb-20">Aromasantis ARG 30 Capsules</h4>
          <p class="text-justify text-sm mb-2">Description :</p>
          <p class="md:text-justify text-sm flex-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisi, lorem
            dolor ut interdum varius cursus nec hac. Lacus nibh nec scelerisque laoreet. Ornare suscipit nam tincidunt
            in. Donec scelerisque nec euismod posuere egestas suspendisse.</p>
        </div>
        <div class="w-full h-full md:w-1/4 md:h-[375px] grid-cols-2 md:grid-rows-3">
          <div class="block bg-secondary h-1/3 flex flex-col items-center justify-center">
            <h5 class="text-center mb-2">A partie de</h5>
            <span class=" block text-center">434.43 DHs</span>
          </div>
          <form action="">
            <div class="block h-1/3 p-6 flex flex-row items-center justify-center">
              <input type="number"
                     id="quantity"
                     class="bg-white w-[50px] border border-gray-100 shadow-inner text-sm  block w-full p-2.5"
                     value="1"
                     min="1" required>
              <label for="quantity" class="ml-5 block text-sm flex-1 w-full">Ajouter la quantité desirer</label>

            </div>
            <div class="block flex justify-center items-center relative">
              <input type="submit"
                     class="text-white h-[4rem] bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm w-full  px-5 py-2.5 text-center"
                     value="Add to Cart">
              <img src="/assets/images/bi_cart-check-fill.svg"
                   alt=""
                   class="absolute w-15 h-15 left-5 bottom-30">
            </div>
          </form>
        </div>
      </div>
    </section>
    <div class="flex flex-col mb-3">
      <h2 class="ml-10 text-2xl font-semibold ">Promotion</h2>
      <span class="bg-gray-700 ml-10 mr-10  w-11/12 h-[1px]"></span>
    </div>
    <section class="flex flex-wrap grid-cols-1 sm:grid-cols-2 gap-8 md:grid-cols-4 md:gap-8 p-5 justify-center">
<!--      <ProductCard v-for="item in limitCard" :key="item"/>-->
<!--      {{item}}-->
      {{currentProd}}
    </section>
  </div>
</template>

<script>
import ProductCard from "../components/cards/ProductCard.vue";
export default {
  name: "Product",
  inject:["currentProd"],
  components:{
    ProductCard,
  },
  data(){
    return{
      limitCard: 4,

    }
  },
  mounted() {
    console.log(this.currentProd);
  }

}
</script>

<style scoped>

</style>