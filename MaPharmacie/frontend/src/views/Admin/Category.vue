<template>
  <div class="flex flex-wrap justify-center items-center mt-4">
    <div class="w-full mb-12 px-4">
      <TableCategoryCard/>
    </div>
    <div class="w-full mb-12 px-4">
      <CategoryForm/>
    </div>
  </div>
</template>

<script>
import TableCategoryCard from "../../components/cards/TableCategoryCard.vue";
import axios from "axios";
import {computed} from "vue";
import CategoryForm from "../../components/forms/CategoryForm.vue";
const endpoint = "http://localhost/MaPharmacie/backend/public/categories"

export default {
  name: "Category",
  components:{
    TableCategoryCard,
    CategoryForm
  },
  provide(){
    return{
      categories:computed(() => this.categories),
      removeCategory:this.removeCategory,
      addCategory:this.addCategory,
      startUpdate:this.startUpdate,
      getCategories:computed(() => this.fetchCategory),
    }
  },
  data(){
    return{
      message: undefined,
      categories: [],

    }
  },
  mounted() {
    this.fetchCategory();
  },
  methods:{
    fetchCategory(){
      axios.get(endpoint).then(res =>{
        if (res.status !== 200){
          this.message = 'Api connection failed'
        }else {
          this.categories = res.data
        }
      })
    },
    removeCategory(id){
      axios.delete(`http://localhost/MaPharmacie/backend/public/category/delete/${id}`).then(res => {
        this.categories = this.categories.filter(e => e.id != id)
      })
    },
    addCategory(nom){
      const endpoint = "http://localhost/MaPharmacie/backend/public/category/add";
      axios.post(endpoint, {nom}).then(res => {
        console.log(res.status)
        this.fetchCategory()
      })
    },
    startUpdate(newData){
      const endpoint = "http://localhost/MaPharmacie/backend/public/category/update"
      axios.post(endpoint,newData).then(res => {
        console.log(res.data);
        this.fetchCategory()
      })
    },
  }
}
</script>

<style scoped>

</style>