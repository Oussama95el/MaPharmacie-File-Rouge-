<template>
  <nav
      class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
  >
    <div
        class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
    >
      <!-- Toggler -->
      <button
          class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
          type="button"
          v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
      >
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"></path>
        </svg>
      </button>
      <!-- Brand -->
      <router-link
          class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
          to="/admin"
      >
        <div class="flex items-center text-center md:w-[30px]-[30px]">
          <img src="/assets/images/Logo.png" alt="logo image"/>
          <span class="hidden sm:block text-primary ml-2 text-p">
                            MaPharmacie
                        </span>
        </div>
      </router-link>
      <!-- User -->
      <ul class="md:hidden items-center flex flex-wrap list-none">
        <li class="inline-block relative items-center justify-center flex">
            <router-link to="/">
              <span class="text-sm">Logout</span>
            </router-link>
        </li>
      </ul>
      <!-- Collapse -->
      <div
          class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
          v-bind:class="collapseShow"
      >
        <!-- Collapse header -->
        <div
            class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
        >
          <div class="flex flex-wrap">
            <div class="w-6/12">
              <router-link
                  class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                  to="/"
              >
                Admin Dashboard
              </router-link>
            </div>
            <div class="w-6/12 flex justify-end">
              <button
                  type="button"
                  class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                  v-on:click="toggleCollapseShow('hidden')"
              >
                <span class="font-extrabold text-2xl">&times;</span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-6 mb-4 md:hidden">
          <div class="mb-3 pt-0 relative">
            <input
                type="text"
                placeholder="Search"
                class="border-0 px-3 py-2 h-12 border border-solid border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
            />
            <img src="/assets/images/SearchVector.png"
                 class="absolute top-[15px] right-[20px] w-[20px] -[20px]"
                 alt="search icon" />
          </div>
        </form>

        <!-- Divider -->
        <hr class="my-4 md:min-w-full" />
        <!-- Heading -->
        <h6
            class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
        >
          Admin Menu
        </h6>
        <!-- Navigation -->

        <ul class="md:flex-col md:min-w-full flex flex-col list-none">
          <li class="items-center">
              <router-link
                  to="/admin/products"
                  class="text-xs uppercase py-3 font-bold block"
              >
                Products
            </router-link>
          </li>

          <li class="items-center">
              <router-link
                  to="/admin/category"
                  class="text-xs uppercase py-3 font-bold block"
              >
                Categories
            </router-link>
          </li>

          <li class="items-center">

              <router-link
                  to="/admin/deliveryStaff"
                  class="text-xs uppercase py-3 font-bold block"
              >
                Delivery Staff
              </router-link>
          </li>

          <li class="items-center">
              <router-link
                  to="/admin/delivery"
                  class="text-xs uppercase py-3 font-bold block"
              >
                Delivery
            </router-link>
          </li>
        </ul>

        <!-- Divider -->
        <hr class="my-4 md:min-w-full" />
        <!-- Heading -->
        <h6
            class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
        >
          Manage Orders
        </h6>
        <!-- Navigation -->

        <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
          <li class="items-center">
            <router-link
                class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"
                to="#"
            >
              Valid Orders
            </router-link>
          </li>

          <li class="items-center">
            <router-link
                class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"
                to="#"
            >
              Unvalid Orders
            </router-link>
          </li>
        </ul>

        <!-- Divider -->
        <hr class="my-4 md:min-w-full" />
        <!-- Heading -->

        <!-- Navigation -->

        <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
          <li class="items-center">
            <router-link
                class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"
                to="/login"
            >
              Logout
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Sidebar",
  data() {
    return {
      collapseShow: "hidden",
      isActive: true,
    };
  },
  methods: {
    toggleCollapseShow: function (classes) {
      this.collapseShow = classes;
    },
  },
  components: {
    // NotificationDropdown,
    // UserDropdown,
  },
}
</script>

<style scoped>

</style>