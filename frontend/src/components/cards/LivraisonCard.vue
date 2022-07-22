<template>
  <div
      class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded"
  >
    <div class="rounded-t mb-0 px-4 py-3 border-0 bg-primary">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
          <h3 class="font-semibold text-sm text-white">Valid Orders Tables</h3>
        </div>
        <div
            class="relative w-full pt-1 px-4 max-w-full flex-grow flex-1 flex gap-[1rem] justify-end"
        >
        </div>
      </div>
    </div>
    <div class="block w-full overflow-x-auto">
      <!-- Projects table -->
      <table class="items-center w-full bg-transparent border-collapse">
        <thead>
        <tr>
          <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
          >
            Ref
          </th>

          <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
          >
            Client
          </th>
          <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
          >
            Date de commande
          </th>
          <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
          >
            Status
          </th>
          <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
          >
            Actions
          </th>
        </tr>
        </thead>
        <!--        loop for each valid order in the database-->
        <tbody v-for="item in this.orders">
        <tr>
          <td
              class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
          >
            <button class="w-full p-1.5 text-center text-white bg-primary" @click="displayOrderDetail(item)">
              {{item.ref}}
            </button>
          </td>

          <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
          >
            <p class="description whitespace-pre-wrap font-medium">
              {{ item.fname }}
            </p>
          </td>
          <td
              class="border-t-0 px-6 align-middle border-l-0 font-medium border-r-0 text-xs whitespace-nowrap p-4"
          >
            {{item.date_de_commande}}
          </td>
          <td
              class="border-t-0 px-6 align-middle border-l-0 font-bold text-primary border-r-0 text-xs whitespace-nowrap p-4"
          >
            {{ item.status }}
          </td>
          <th
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
          >
            <button class="w-1/2 mr-2 p-1.5 text-center font-semibold text-black bg-secondary">
              Livré
            </button>
          </th>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  name: "LivraisonCard",
  data(){
    return{
      staff:'',
    }
  },
  computed:{
    orders(){
      return  this.$store.state.validOrders;
    },
    livreurs(){
      return this.$store.state.livreurs;
    }
  },
  mounted() {
    this.fetchValidOrders();
    this.fetchLivreurs();
  },
  methods:{
    fetchValidOrders(){
      this.$store.dispatch('getValidOrders');
    },
    fetchLivreurs(){
      this.$store.dispatch("fetchLivreur");
    },
    setStaff(id){
      let data = {
        livereur: this.staff,
        orderID: id
      }
      this.$store.dispatch('setOrderLivreur',data);
    },
    displayOrderDetail(item){
      this.$store.commit('displayDetailCard');
      this.$store.commit('setCurrentOrder',item.ref);
      this.$store.dispatch('fetchOrderDetail',item);
    }
  }
}
</script>

<style scoped>

</style>