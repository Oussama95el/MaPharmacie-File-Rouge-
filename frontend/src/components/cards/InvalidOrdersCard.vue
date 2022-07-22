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
            Delivery staff
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
            Action
          </th>
        </tr>
        </thead>
        <!--        loop for each Invalid or pending orders in the database  -->
        <tbody v-for="item in this.orders">
        <tr>
          <td
              class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
          >
            <button class="w-full p-1.5 text-center text-white bg-primary" @click="displayOrderDetail(item)">
              {{item.ref}}
            </button>
          </td>
          <th
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
          >
            <span class="ml-3 whitespace-pre-wrap">
                <select class="w-fit text-sm font-medium focus:outline-none border-0 p-1.5 text-start" v-model="staff" @change="setStaff(item.id)">
                  <option v-for="item in this.livreurs" :value="item.id"
                          class="text-sm" :key="item.id">
                    {{item.fname}}
                  </option>

                </select>
            </span>
          </th>
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
          <td
              class="border-t-0 px-3 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
          >
            <button class="w-1/2 mr-2 p-1.5 text-center text-white bg-primary" @click="updateOrderStatus(item.id,this.valid)">
              Valid
            </button>
            <button class="w-1/2 p-1.5 text-center text-white bg-red-500" @click="updateOrderStatus(item.id,this.invalid)">
              Invalid
            </button>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default  {
  name: "InvalidOrdersCard",
  data(){
    return{
      staff:'',
      valid:'Valid',
      invalid:'Invalid',
    }
  },
  computed:{
    orders(){
      return  this.$store.state.invalidOrders;
    },
    livreurs(){
      return this.$store.state.livreurs;
    },
    currentLivreur(item){
      this.staff = item.livreur_fname;
    }
  },
  mounted() {
    this.fetchInvalidOrders();
    this.fetchLivreurs();
    console.log(this.orders);
  },
  methods:{
    fetchInvalidOrders(){
      this.$store.dispatch('getInvalidOrders');
    },
    fetchLivreurs(){
      this.$store.dispatch("fetchLivreur");
    },
    setStaff(id){
      if (confirm(`Are you sure you want to assign this order to this staff`) == true){
        let data = {
          livereur: this.staff,
          orderID: id
        }
        this.$store.dispatch('setOrderLivreur',data);
      }
    },
    displayOrderDetail(item){
      this.$store.commit('displayDetailCard');
      this.$store.commit('setCurrentOrder',item.ref);
      this.$store.dispatch('fetchOrderDetail',item);
    },
    updateOrderStatus(id,status){
      if (confirm('Are you sure you want to set this Action') == true){
        let data = {
          id: id,
          status: status
        }
        console.log(data)
        this.$store.dispatch('updateOrderStatus',data);
      }
    }
  }
}
</script>

<style scoped>

</style>