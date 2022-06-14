<template>
  <div>
    <nav aria-label="Page navigation example">
      <ul class="inline-flex -space-x-px">
        <li>
          <a
            @click="changePage(currentPage - 1)"
            class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            >Previous</a
          >
        </li>

        <li>
          <a
            v-for="i in total"
            :class="currentPage == i ? 'isActive' : 'page'"
            @click="changePage(i)"
            >{{ i }}</a
          >
        </li>

        <li>
          <a
            @click="changePage(currentPage + 1)"
            class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            >Next</a
          >
        </li>
      </ul>
    </nav>
  </div>
</template>

<script setup>
import { computed, onMounted, ref } from "vue";
import { useStore } from "vuex";

let total = ref(0);
const currentPage = computed(() => store.state.currentPage);
const store = useStore();
const category = computed(() => store.state.currentCategory);
const changePage = (page) => {
  console.log(page);
  store.commit("changePage", page);
  store.dispatch("fetchProducts", category, page);
};
// const changePage = (page) => {
//   store.dispatch("fetchProducts", page);
// };
onMounted(() => {
  store.dispatch("fetchTotalPages").then((res) => (total.value = res));
});
</script>

<style lang="postcss" scoped>
.page {
  @apply py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white;
}
.isActive {
  @apply py-2 px-3 text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white;
}
</style>
