<template>
  <div>
    <Section class="flex justify-center items-center flex-wrap py-10">
      <!--      register-->
      <div
        class="w-fit max-w-md bg-secondary md:w-[28rem] h-[480px] md:rounded-l-md p-10 border-solid border-[0.5px] border-black"
      >
        <h5 class="mb-3 text-center uppercase text-base font-medium heading">
          I don't have an account
        </h5>
        <p class="mb-5 text-center text-sm font-medium">
          Commander au tant que Client au moin de 30 s
        </p>
        <form @submit.prevent="register">
          <div class="mb-6">
            <label
              for="email"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
              >Your email</label
            >
            <input
              v-model="client.email"
              type="email"
              id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="example@example.com"
              required
            />
          </div>
          <div class="mb-6">
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
              >Your password</label
            >
            <input
              v-model="client.password"
              type="password"
              placeholder="Password"
              id="password"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required
            />
          </div>
          <div class="mb-6">
            <label
              for="fullName"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
              >Your full name</label
            >
            <input
              v-model="client.fullName"
              type="text"
              id="fullName"
              placeholder="Full name"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required
            />
          </div>
          <div class="flex justify-center items-center">
            <input
              type="submit"
              class="text-white bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              value="Creat account"
            />
          </div>
        </form>
      </div>
      <!--      login-->
      <div
        class="w-fit max-w-md md:h-[480px] md:w-[28rem] md:rounded-r-md p-10 border-solid border-[0.5px] border-black"
      >
        <h5 class="mb-3 text-center uppercase text-base font-medium heading">
          i already have an account
        </h5>
        <p class="mb-5 text-center text-sm font-medium">
          Select the login type
        </p>

        <!--        Select login option-->
        <select
          id="countries"
          v-model="loginType"
          v-if="
            loginType != '' ? (this.style = 'block') : (this.style = 'hidden')
          "
          @change="loginTypeChange"
          class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
          <option selected="" disabled>Choose login option</option>
          <option value="client">Client</option>
          <option value="admin">Admin</option>
          <option value="livreure">Livreure</option>
        </select>

        <!--        hidden form-->
        <form :class="style" @submit.prevent="login">
          <div class="mb-6">
            <label
              for="loginEmail"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
              >Your email</label
            >
            <input
              v-model="credentials.email"
              type="email"
              id="loginEmail"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="example@example.com"
              autocomplete="false"
              required
            />
          </div>
          <div class="mb-1">
            <label
              for="loginPassword"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
              >Your password</label
            >
            <input
              v-model="credentials.password"
              type="password"
              id="loginPassword"
              placeholder="Password"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              required
            />
          </div>
          <div class="mb-3">
            <a
              href="#"
              class="underline text-xs text-red-700 hover:text-primary"
              >Forgot password !</a
            >
          </div>
          <div class="flex justify-center items-center">
            <input
              type="submit"
              class="text-white bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              value="login"
            />
          </div>
        </form>
      </div>
    </Section>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      style: "hidden",
      loginType: "",
      credentials: {
        email: "",
        password: "",
      },
      client: {
        email: "",
        password: "",
        fullName: "",
      },
    };
  },
  computed: {},
  mounted() {},
  methods: {
    login() {
      if (this.loginType == "client") {
        this.$store.state.loggedIn = false;
        this.$store.dispatch("loginClient", this.credentials);
      }
      if (this.loginType == "admin") {
        this.$store.dispatch("loginAdmin", this.credentials);
      }
      if (this.loginType == "livreure") {
        this.$store.dispatch("loginLivreur", this.credentials);
      }
    },
    register() {
      this.$store.dispatch("register", this.client);
    },
  },
};
</script>

<style lang="scss" scoped>
.heading::before {
  content: "";
  border-radius: 1rem;
  margin-right: 10px;
  background-color: #07beb8;
  width: 5px;
  height: 25px;
  display: inline-block;
}
</style>
