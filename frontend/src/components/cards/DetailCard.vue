<template>
  <div class="mb-[6rem]">
    <div class="rounded-t mb-0 px-4 py-3 border-0 bg-primary flex justify-between items-center">
      <div>

        <h3 class="text-teal-50 font-bold uppercase text-center">REFERENCE : {{currentOrder}}</h3>
      </div>
      <div class="flex">
        <button
            type="button"
            class="cursor-pointer text-white px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
            @click="this.closeDetail"
        >
          <span class="font-extrabold text-2xl">&times;</span>
        </button>
      </div>
    </div>
    <!-- component -->
    <div class="flex flex-col mb-5">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            <table class="min-w-full text-center">
              <thead class="border-b">
              <tr>
                <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4">
                  Product Ref
                </th>
                <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4">
                  Product Name
                </th>
                <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4">
                  Quantity
                </th>
                <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4">
                  Price
                </th>
                <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4">
                  Total
                </th>
              </tr>
              </thead>
              <tbody v-for="item in this.currentDetail">
              <tr class="border-b">
                <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                  {{item.ref}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{item.name}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{item.quantity}}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                  {{item.prix_vente}}
                </td>
                <td class="text-sm text-gray-900 font-normal px-6 py-4 whitespace-nowrap">
                  {{item.prix_vente * item.quantity}} <span>MAD</span>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DetailCard",
  data(){
    return{
      total:undefined,
    }
  },
  computed:{
    currentOrder(){
      return this.$store.state.currentOrder;
    },
    currentDetail(){
      return this.$store.state.currentDetail;
    },

  },
  mounted() {},
  methods:{
    closeDetail(){
      this.$store.commit('closeDetailCard')
    },
  }

}
</script>

<style scoped>

</style>