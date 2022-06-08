<template>
    <div>
      <div id="default-carousel" class="relative" data-carousel="slide">
        <div
            class="overflow-hidden relative h-56 sm:h-64 xl:h-80 2xl:h-96"
        >
          <div
              class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10"
              data-carousel-item="active"
          >
            <img
                src="/assets/images/Group%204.png"
                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                alt="..."
            />
          </div>

          <div
              class="duration-700 ease-in-out absolute inset-0 transition-all transform -translate-x-full z-10"
              data-carousel-item=""
          >
            <img
                src="/assets/images/garantie.png"
                class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                alt="..."
            />
          </div>
        </div>

        <div
            class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2"
        >
          <button
              type="button"
              class="w-3 h-3 rounded-full bg-white dark:bg-gray-800"
              aria-current="true"
              aria-label="Slide 1"
              data-carousel-slide-to="0"
          ></button>
          <button
              type="button"
              class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800"
              aria-current="false"
              aria-label="Slide 2"
              data-carousel-slide-to="1"
          ></button>
        </div>

      </div>
      <!--    Publicity-->
      <div class="hidden md:block">
        <div class="flex items-center justify-center md:mt-10 md:p-4 w-full md:grid-cols-3 md:gap-20">
          <div class="w-[240px] h-[164px]" data-aos="flip-left">
            <img src="/assets/images/anaca3-complement-alimentaire-300-125.jpg">
          </div>
          <div class="w-[240px] h-[164px]" data-aos="flip-left">
            <img src="/assets/images/avis-client-pharmarket-300-125.jpg">
          </div>
          <div class="w-[240px] h-[164px]" data-aos="flip-left">
            <img src="/assets/images/cotopads-velpeau-300-125.jpg">
          </div>
        </div>
      </div>
      <!--    Product divider-->
      <div class="flex flex-col mb-3">
        <h2 class="ml-10 text-2xl font-semibold ">Nouveauté</h2>
        <span class="bg-gray-700 ml-10 mr-10  w-90% h-[1px]"></span>
      </div>
      <!--    Card carousel-->
      <section class="flex flex-wrap grid-cols-1 sm:grid-cols-2 gap-8 md:grid-cols-4 md:gap-8 p-5 justify-center">
        <!--      item1-->
<!--        <ProductCard v-for="item in cardLimit" :key="item"/>-->
<!--          {{item}}-->
      </section>
      <div class="flex flex-col mb-3">
        <h2 class="ml-10 text-2xl font-semibold ">Promotion</h2>
        <span class="bg-gray-700 ml-10 mr-10  w-11/12 h-[1px]"></span>
      </div>
      <section class="flex flex-wrap grid-cols-1 sm:grid-cols-2 gap-8 md:grid-cols-4 md:gap-8 p-5 justify-center">
<!--        <ProductCard v-for="item in cardLimit" :key="item"/>-->
<!--        {{item}}-->
      </section>
    </div>
</template>
<script>
import ProductCard from "../components/cards/ProductCard.vue";
export default {
  components:{
    ProductCard,
  },
  data(){
    return{
      cardLimit:4,

    }
  }
};
</script>
<style lang=""></style>
