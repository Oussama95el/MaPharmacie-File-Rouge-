<template>
    <div >
      <div class="max-w-[250px] h-full max-h-[28rem] flex flex-col justify-evenly items-center bg-white shadow-md dark:bg-gray-800 dark:border-gray-700">
<!--           data-aos="fade-up"-->
<!--           data-aos-offset="200"-->
<!--           data-aos-delay="50"-->
<!--           data-aos-duration="500"-->
<!--           data-aos-easing="ease-in-out"-->
<!--           data-aos-mirror="true"-->
<!--           data-aos-once="false"-->
<!--           data-aos-anchor-placement="top-center">-->

          <div class="w-fit h-full cursor-pointer" @click="getCurrentProduct(item)">
            <img class="h-14 w-14 object-contain bg-white rounded-full border" :src="'/assets/products/'+ item.image" alt="product image">
          </div>
        <div class="px-5 pb-5">
          <a href="#" class="text-center">
            <h5 class="text-base font-semibold tracking-tight text-gray-900">{{ item.marque }}</h5>
          </a>
          <p class="text-xs text-[706F6F] text-center">
            {{ item.name }}
          </p>
          <div class="mt-6">
            <!--          Description-->
            <h5 class="text-base font-semibold tracking-tight text-gray-900 dark:text-white">Description :</h5>
            <p class="text-xs text-[706F6F] maxLines">
              {{ item.description }}
            </p>
          </div>
          <div class="flex items-center mt-2.5 mb-5">
            <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
              <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
              <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
              <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
              <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
              <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <span
                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-base font-bold text-gray-900 dark:text-white">{{item.prix_vente}}MAD</span>
            <button
               class="text-white
                      bg-primary
                      focus:ring-4 focus:outline-none focus:ring-blue-300
                      font-medium rounded-lg
                      text-sm px-5 py-2.5 text-center
                      hover:bg-opacity-90">
              Add to cart
            </button>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import {computed} from "vue";

export default {
  name: "ProductCard",
  props:{
    item:Object,
  },

  provide(){
    return{
      currentProd:computed(() => this.currentProduct)
    }
  },
  data(){
    return{
      currentProduct:[],
    }
  },
  methods:{
    getCurrentProduct(product){
      this.currentProduct = product
      console.log(this.currentProduct);
      // this.$router.push("/product")
    }
  }

}

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
.maxLines{
  @include maxLines(3)
}
</style>