<template>
  <div>
    <Sidebar />
    <div class="relative md:ml-64 bg-blueGray-100">
      <div class="hidden md:block w-100 md:flex md:items-center md:justify-between p-5">
        <div class="flex items-center text-center md:w-[30px]-[30px]">
            <h2 class="ml-10 text-2xl font-semibold ">Dashboard</h2>
        </div>

        <div class="search-input relative md:w-[380px] w-[250px] mt2">
          <input type="text" id="email-address-icon"
                 class="block text-p p-2 pl-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                 placeholder="search ..." />
          <img src="/assets/images/SearchVector.png" class="absolute top-2 right-2 w-[20px] -[20px]"
               alt="search icon"/>
        </div>
      </div>

      <div class="px-4 mt-10 md:px-10 mx-auto w-full -m-24">
        <router-view />

      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from "../components/Sidebar/Sidebar.vue";
export default {
  name: "admin-layout",
  components: {
    Sidebar,

  },
}
</script>

<style scoped>

</style>