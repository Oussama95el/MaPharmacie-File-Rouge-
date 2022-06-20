<template>
  <div
    class="overflow-y-auto top-1/2 right-1/2 left-1/2 z-50 w-full md:inset-0 h-modal md:h-full"
  >
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div
          class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600"
        >
          <h3 class="text-xl font-medium text-gray-900 dark:text-white">
            Add Staff
          </h3>
          <button
            @click="toggleModal"
            type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
          >
            <svg
              class="w-5 h-5"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
        </div>
        <form @submit.prevent="addStaff">
          <!-- Modal body -->
          <div class="p-6 space-y-6">
            <div class="col-span-6 sm:col-span-3">
              <label
                for="full_name"
                class="block text-sm font-medium text-gray-700"
                >Full Name</label
              >
              <input
                required
                placeholder="full name"
                type="text"
                v-model="fname"
                name="full_name"
                id="full_name"
                autocomplete="given-name"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              />
            </div>
            <div class="col-span-6 sm:col-span-3">
              <label for="email" class="block text-sm font-medium text-gray-700"
                >Email</label
              >
              <input
                required
                placeholder="email@example.com"
                type="text"
                v-model="email"
                name="email"
                id="email"
                autocomplete="on"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              />
            </div>
            <div class="col-span-6 sm:col-span-3">
              <label
                for="password"
                class="block text-sm font-medium text-gray-700"
                >Password</label
              >
              <input
                required
                type="password"
                placeholder="**********"
                v-model="Password"
                name="password"
                id="password"
                autocomplete="on"
                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              />
            </div>
          </div>
          <!-- Modal footer -->
          <div
            class="flex justify-between items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600"
          >
            <input
              type="submit"
              class="text-white uppercase bg-primary hover:opacity-80 cursor-pointer focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
              value="Add"
            />
            <button
              @click="toggleModal"
              type="button"
              class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10"
            >
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "StaffForm",
  data() {
    return {
      fname: "",
      email: "",
      Password: "",
    };
  },
  computed: {},
  methods: {
    addStaff() {
      this.$store.dispatch("addStaff", {
        fname: this.fname,
        email: this.email,
        Password: this.Password,
      });
      this.toggleModal();
    },
    toggleModal() {
      this.$store.commit("toggleModal");
    },
  },
};
</script>

<style scoped></style>
