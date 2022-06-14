<template>
  <div>
    <div id="default-carousel" class="relative" data-carousel="slide">
      <div class="overflow-hidden relative h-56 sm:h-64 xl:h-80 2xl:h-96">
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
      <div
        class="flex items-center justify-center md:mt-10 md:p-4 w-full md:grid-cols-3 md:gap-20"
      >
        <div class="w-[240px] h-[164px]" data-aos="flip-left">
          <img src="/assets/images/anaca3-complement-alimentaire-300-125.jpg" />
        </div>
        <div class="w-[240px] h-[164px]" data-aos="flip-left">
          <img src="/assets/images/avis-client-pharmarket-300-125.jpg" />
        </div>
        <div class="w-[240px] h-[164px]" data-aos="flip-left">
          <img src="/assets/images/cotopads-velpeau-300-125.jpg" />
        </div>
      </div>
    </div>
    <!--    Product divider-->
    <div class="flex flex-col mb-3">
      <h2 class="ml-10 text-2xl font-semibold">Nouveauté</h2>
      <span class="bg-gray-700 ml-10 w-[80%] md:w-[90%] h-[1px]"></span>
    </div>
    <!--    Card carousel-->
    <section
      class="flex flex-wrap grid sm:grid-cols-2 gap-8 md:grid-cols-4 md:gap-8 p-5 justify-center"
    >
      <!--      item1-->
      <ProductCard v-for="item in promotions" :key="item" :item="item" />

      <!--          {{item}}-->
    </section>
    <div class="flex flex-col mb-3">
      <h2 class="ml-10 text-2xl font-semibold">Promotion</h2>
      <span class="bg-gray-700 ml-10 w-[80%] md:w-[90%] h-[1px]"></span>
    </div>
    <section
      class="flex grid sm:grid-cols-2 gap-8 md:grid-cols-4 md:gap-8 p-5 items-center justify-center"
    >
      <ProductCard v-for="item in nouveaute" :key="item" :item="item" />
      <!--        {{item}}-->
    </section>
  </div>
</template>
<script>
import ProductCard from "../components/cards/ProductCard.vue";
import axios from "axios";
export default {
  components: {
    ProductCard,
  },
  data() {
    return {
      cardLimit: 4,
      promotions: [],
      nouveaute: [],
    };
  },
  mounted() {
    this.fetchPromotions();
    this.fetchNouveaute();
  },
  methods: {
    fetchPromotions() {
      let category = 23;
      const endpoint = `http://localhost/MaPharmacie/backend/public/products/similarProd/${category}`;
      axios.get(endpoint).then((res) => {
        console.log(res.data);
        this.promotions = res.data;
      });
    },
    fetchNouveaute() {
      let category = 22;
      const endpoint = `http://localhost/MaPharmacie/backend/public/products/similarProd/${category}`;
      axios.get(endpoint).then((res) => {
        console.log(res.data);
        this.nouveaute = res.data;
      });
    },
  },
};
</script>
<style lang=""></style>
