<template>
    <div>
        <nav class="bg-white">
            <div class="flex flex-col mx-2 py-2 md:px-4">
                <div class="bg-red w-100 flex justify-between">
                    <div class="flex items-center text-center md:w-[30px]-[30px]">
                        <img src="/assets/images/Logo.png"
                             alt="logo image of site"
                             class="" />
                        <span class="hidden sm:block text-primary ml-2 text-p">
                            MaPharmacie
                        </span>
                    </div>

                    <div class="search-input relative md:w-[380px] w-[250px] mt-3">
                        <input type="text"
                               id="email-address-icon"
                               class="block text-p p-2 pl-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-sm focus:ring-blue-500 focus:border-blue-500"
                               placeholder="search ..."
                        />
                        <img src="/assets/images/SearchVector.png"
                             class="absolute top-2 right-2 w-[20px] -[20px]"
                             alt="search icon"
                        />
                    </div>
                </div>

                <div class="flex justify-between mt-3">
                    <button data-collapse-toggle="mobile-menu-3" type="button"
                            class="inline-flex items-center h-fit w-fit p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none"
                            aria-controls="mobile-menu-3"
                            aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor"
                             viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="flex items-center">
                        <div class="hidden w-full md:block md:w-auto" id="mobile-menu-3">
                            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                                <li>
                                    <span class="flex gap-2">
                                        <svg class="hidden md:block" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512" width="20px">
                                            <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                                            <path
                                                d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z" />
                                        </svg>

                                        <router-link to="/"
                                            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-primary md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                            aria-current="page">Home</router-link>
                                    </span>
                                </li>
                                <li>
                                    <router-link to="/about"
                                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-primary md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                      About</router-link>
                                </li>
                                <li>
                                    <router-link to="/contact"
                                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-primary md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                      Contact</router-link>
                                </li>
                                <li>
                                    <router-link to="/"
                                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-primary md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                      Para-pharmacie</router-link>
                                </li>
                              <li>
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium z-90 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-primary md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                  Products
                                    <svg class="w-4 h-4 ml-1"
                                       fill="currentColor"
                                       viewBox="0 0 20 20"
                                       xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"
                                    >
                                    </path>
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar"
                                     class="z-50 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                  <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                      aria-labelledby="dropdownLargeButton">
                                    <li v-for="item in categories">
                                      <span   @click="getProducts"
                                              role="button"
                                              id="dropdownRightButton"
                                              data-dropdown-toggle="dropdownRight"
                                              data-dropdown-placement="right"
                                              class="w-full mb-3 md:mb-0 bg-transparent hover:bg-secondary  focus:outline-none focus:ring-blue-300 font-medium text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"
                                      >
                                        {{item.nom}}
                                      </span>
                                      <!-- Dropdown menu -->
                                      <div id="dropdownRight"
                                           class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44"
                                      >
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownRightButton">
                                          <li>
                                            <router-link to="#"
                                                         class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                            >
                                              Flu-like symptoms
                                            </router-link>
                                          </li>
                                          <li>
                                            <router-link to="#"
                                                         class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                            >
                                              Headache
                                            </router-link>
                                          </li>
                                        </ul>
                                      </div>
                                    </li>


                                  </ul>
                                </div>
                              </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex">
                        <button class="w-full md:block md:w-auto mx-4 text-left ">
                            <router-link to="/login">
                                <img class="w-6 ml-1 md:w-8" src="/assets/images/carbon_user-avatar.svg" alt="cart image" />
                                <span>Login</span>
                            </router-link>
                        </button>
                        <button class="w-full md:block md:w-auto mt-1 mx-4 text-left relative">
                          <span v-if="display" class="bg-primary px-0.5 w-fit h-fit rounded text-white absolute -right-3 top-1">
                            {{count}}
                          </span>
                            <router-link to="/cart">
                                <img class="w-6 md:w-8" src="/assets/images/Vector.svg" alt="cart image" />
                                <span>Cart</span>
                            </router-link>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "HeaderNav",
    data(){
      return{
        categories:[],
        display:false,
        count:0,
      }
    },
  computed:{
    cartCount(){
      if (this.cartCount !== 0){
        this.display = true
      }
    }
  },
  mounted() {
    const endpoint = "http://localhost/MaPharmacie/backend/public/categories"
    axios.get(endpoint).then(res =>{
      if (res.status !== 200){
        this.message = 'Api connection failed'
      }else {
        this.categories = res.data
      }
    })
  },
  methods:{
      getProducts(){
        this.$router.push('/')
      }
  }

};
</script>

<style lang="scss">
@media (max-width: 480px) {
    .text-p {
        font-size: 12px;
    }
}
</style>
