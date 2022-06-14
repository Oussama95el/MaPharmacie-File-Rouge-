<template>
  <div class="flex flex-col justify-between">
    <div class="flex justify-between items-start p-2">
      <div class="hidden md:block w-1/3 h-fit p-3 bg-red-50 shadow-inner">
        <h3 class="font-semibold">Filter your products</h3>
        <p class="text-sm whitespace-nowrap p-2">Select products by category</p>
        <span>
          <input
            type="radio"
            v-model="allProducts"
            id="default-radio-btn"
            name="default-radio-btn"
            class="radio fill-primary"
          />
          <label for="default-radio-btn" class="font-medium ml-6"
            >All Categories</label
          >
        </span>
        <span
          class="flex justify-start items-center gap-6"
          v-for="item in $store.state.categories"
        >
          <input
            @change="getFilteredProducts(item)"
            type="radio"
            id="radio-btn"
            name="radio-btn"
            class="radio radio-accent"
          />
          <label for="radio-btn" class="font-medium"> {{ item.nom }} </label>
        </span>
      </div>
      <div
        class="flex bg-secondary md:flex-wrap justify-center items-center flex-col md:grid-cols-4 w-full h-fit gap-12 p-5"
      >
        <div class="flex flex-col mb-3 w-full">
          <h2 class="ml-10 text-2xl font-semibold">Products</h2>
          <span class="bg-gray-700 ml-6 mr-10 w-90% h-[1px]"></span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 md:grid-rows-3 gap-6">
          <ProductCard
            class=""
            v-for="item in $store.state.products"
            :key="item"
            :item="item"
          />
        </div>
        <div>
          <Pagination />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ProductCard from "../components/cards/ProductCard.vue";
import Pagination from "../components/pagination/Pagination.vue";
export default {
  name: "Store",
  components: { ProductCard, Pagination },
  data() {
    return {};
  },
  computed: {
    currentCategory() {
      return this.$store.state.currentCategory;
    },
  },
  mounted() {
    this.getProducts();
    this.$store.dispatch("fetchCategories");
  },
  methods: {
    getProducts() {
      this.$store.dispatch("fetchProducts");
    },
    getFilteredProducts(item) {
      this.$store.dispatch("fetchProducts", item.id);
    },
  },
};
</script>

<style scoped></style>
