<template>
    <div class="p-5 flex flex-col items-center justify-center w-full">
      <div class="flex flex-col mb-3 w-full">
        <h2 class="ml-10 text-2xl font-semibold ">Nouveauté</h2>
        <span class="bg-gray-700 ml-10 mr-10  w-90% h-[1px]"></span>
      </div>
      <div class="flex w-full gap-12">
      <ProductCard v-for="item in products"
                   :key="item"
                   :item="item"

      />

      </div>
    </div>
</template>

<script>
import ProductCard from "../components/cards/ProductCard.vue";
import axios from "axios";
export default {
  name: "Store",
  components: {ProductCard},
  data(){
    return{
      products:[],
    }
  },
  mounted() {
    this.getProducts(15)
  },
  methods: {
    getProducts(id){
      const endpoint = `http://localhost/MaPharmacie/backend/public/products/${id}`
      axios.get(endpoint).then(res => {
        this.products = res.data
        console.log(this.products)
      })
    }
  }

}
</script>

<style scoped>

</style>