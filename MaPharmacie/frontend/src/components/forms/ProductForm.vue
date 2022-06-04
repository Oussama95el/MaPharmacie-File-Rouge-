<template>
    <div class="md:p-10">
      <div class="mt-10 sm:mt-0" id="product_form">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">{{action}} Product</h3>
              <p class="mt-1 text-sm text-gray-600">
                all the fields are required.
              </p>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="submitData" method="POST">
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="product_name" class="block text-sm font-medium text-gray-700">Name</label>
                      <input required type="text" v-model="defaultForm.name" name="product_name" id="product_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                      <input required type="text" v-model="defaultForm.marque" name="brand" id="brand" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <label for="product_image" class="block text-sm font-medium text-gray-700">Product image</label>
                      <input required type="file" @change="previewFiles" name="product_image" id="product_image" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                      <select id="category"  v-model="defaultForm.categorie" name="category" autocomplete="category" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option v-for="option in categories" v-bind:value="option.id">{{option.nom}}</option>
                      </select>
                    </div>

                    <div class="col-span-6">
                      <label for="product_description" class="block text-sm font-medium text-gray-700">Description</label>
                      <input required type="text" v-model="defaultForm.description" name="product_description" id="product_description" autocomplete="product_description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                      <label for="buying_price" class="block text-sm font-medium text-gray-700">Buying price</label>
                      <input required type="number" step="0.01" v-model="defaultForm.prix_achat" name="buying_price" id="buying_price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                      <label for="selling_price" class="block text-sm font-medium text-gray-700">Selling price</label>
                      <input required type="number" step="0.01" v-model="defaultForm.prix_vente" name="selling_price" id="selling_price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex justify-between">
                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                  </button>
                  <button @click="toggleForm(false)" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                  </button>
                </div>
              </div>
            </form>
          </div>
<!--          sweet alert-->

        </div>
      </div>
    </div>
</template>

<script>
import axios from "axios";
import swal from 'sweetalert';

const endpointAdd = "http://localhost/MaPharmacie/backend/public/product/add"
const endpointUpdate = "http://localhost/MaPharmacie/backend/public/product/update";

const initialFormState = {
  name:"",
  marque:"",
  image:"",
  categorie:"",
  description:"",
  prix_achat:"",
  prix_vente:"",
}
export default {
  name: "ProductForm",

  inject : ["currentProduct", "fetchProducts","toggleForm", "updateProduct"],
  data(){
    return{
      initialFormState,
      defaultForm:initialFormState,
      action: "Add" ,
      current: this.currentProduct,
      categories:[],
    }
  },
  // watch:{
  //   current(newP,oldP){
  //     this.defaultForm = newP ?? this.initialFormState
  //
  //   }
  // },
  mounted() {
    if(this.currentProduct.value){
      this.defaultForm = this.currentProduct
      this.action = "Update"
    }
      const endpoint = "http://localhost/MaPharmacie/backend/public/categories";
      axios.get(endpoint).then(res => {
        this.categories = res.data
        console.log(res.data)
      })
  },
  methods:{
    submitData(){
      const isUpdate = !!this.currentProduct.value;
      const endpoint = isUpdate ? endpointUpdate : endpointAdd;

      axios.post(endpoint,this.defaultForm)
          .then(res =>{
        if (res.status = 200){
        swal({
          title: "Good job!",
          text: "You clicked the button!",
          icon: "success",
        })
          this.fetchProducts();
          this.toggleForm(false);
          if(isUpdate){
            this.updateProduct(this.currentProduct.id, this.defaultForm)
          }
        }
      })
    },
    previewFiles(event) {
      this.defaultForm.image = event.target.files[0].name
      console.log(event.target.files)
    },
  },
  computed:{
    // updateForm(){
    //   console.log(this.currentProduct)
    //   this.defaultForm = this.currentProduct.value ? this.currentProduct : initialFormState
    // }
  }
}
</script>

<style scoped>

</style>