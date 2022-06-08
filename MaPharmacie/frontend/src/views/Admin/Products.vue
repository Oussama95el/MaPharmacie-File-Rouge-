<template>
  <div class="flex flex-wrap justify-center items-center mt-4">
    <div class="w-full mb-12 px-4">
      <TableCard :products="products" />
    </div>
    <div class="w-full mb-12 px-4">
      <ProductForm v-if="showForm" />
    </div>
  </div>
</template>

<script>
import TableCard from "../../components/cards/TableProductsCard.vue";
import ProductForm from "../../components/forms/ProductForm.vue";
import axios from "axios";
import {computed} from "vue";
const endpoint = "http://localhost/MaPharmacie/backend/public/products"
export default {
  name: "Products",
  provide(){
    return {
      fetchProducts:this.fetchProducts,
      removeProduct:this.removeProduct,
      addProduct:this.addProduct,
      updateProduct:this.updateProduct,
      startUpdate:this.startUpdate,
      products: computed(() => this.products),
      currentProduct : computed(() => this.currentProduct),
      toggleForm: this.toggleForm
    }
  },
  components: {
    TableCard,
    ProductForm
  },
  data(){
    return {
      products : [],
      message: "",
      currentProduct:undefined,
      showForm:false
    }
  },
  mounted() {
    this.fetchProducts()
  },
  methods:{
    fetchProducts(){
      axios.get(endpoint).then(res =>{
        if (res.status !== 200){
          this.message = 'Api connection failed'
        }else {
          this.products = res.data
        }
      })
    },
    removeProduct(id){
      this.products = this.products.filter(e => e.id != id)
    },
    startUpdate(currentData = {}){
      this.showForm = true;
      this.currentProduct = currentData
    },
    addProduct(){
      this.showForm = true;
      this.currentProduct = undefined;
    },
    updateProduct(id, updates){
      this.products = this.products.map(p => {
        if(p.id === id){
          return {...p, ...updates}
        }
        return p;
      })
    },
    toggleForm(state){
      this.showForm = state;
    }
  }
}
</script>

<style>

</style>